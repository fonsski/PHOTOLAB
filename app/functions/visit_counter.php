<?php
class VisitCounter
{
    private $logFile;
    private $ipLogFile;

    public function __construct()
    {
        $rootPath = dirname(dirname(__DIR__));

        $this->logFile = $rootPath . "/logs/visits.json";
        $this->ipLogFile = $rootPath . "/logs/ip_logs.json";

        if (!file_exists($rootPath . "/logs")) {
            mkdir($rootPath . "/logs", 0777, true);
        }

        if (!file_exists($this->logFile)) {
            file_put_contents($this->logFile, json_encode([]));
        }
        if (!file_exists($this->ipLogFile)) {
            file_put_contents($this->ipLogFile, json_encode([]));
        }
    }

    private function hashIP($ip) 
    {
        // Используем SHA-256 для хэширования IP с добавлением соли
        $salt = "beavers_rules_the_world";
        return hash('sha256', $ip . $salt);
    }
    
    public function countVisit()
    {
        $ip = $this->hashIP($_SERVER["REMOTE_ADDR"]); // Хэшируем IP
        $today = date("Y-m-d");

        $visits = json_decode(file_get_contents($this->logFile), true);
        $ipLogs = json_decode(file_get_contents($this->ipLogFile), true);

        $ipLogs = array_filter($ipLogs, function ($timestamp) {
            return $timestamp > time() - 86400;
        });

        if (!isset($ipLogs[$ip]) || $ipLogs[$ip] < time() - 3600) {
            if (!isset($visits[$today])) {
                $visits[$today] = 1;
            } else {
                $visits[$today]++;
            }

            $ipLogs[$ip] = time();

            file_put_contents($this->logFile, json_encode($visits));
            file_put_contents($this->ipLogFile, json_encode($ipLogs));
        }
    }

    public function getTotalVisits()
    {
        $visits = json_decode(file_get_contents($this->logFile), true);
        return array_sum($visits);
    }

    public function getVisitsData($days = 7)
    {
        $visits = json_decode(file_get_contents($this->logFile), true);
        $dates = [];
        $visitCounts = [];

        for ($i = $days - 1; $i >= 0; $i--) {
            $date = date("Y-m-d", strtotime("-$i days"));
            $dates[] = $date;
            $visitCounts[] = isset($visits[$date]) ? $visits[$date] : 0;
        }

        return [
            "dates" => $dates,
            "visits" => $visitCounts,
        ];
    }
}