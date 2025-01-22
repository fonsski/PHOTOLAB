<?php
class VisitCounter
{
    private $logFile;
    private $ipLogFile;

    public function __construct()
    {
        // Получаем путь к корню проекта (на один уровень выше vendor)
        $rootPath = dirname(dirname(__DIR__));

        $this->logFile = $rootPath . "/logs/visits.json";
        $this->ipLogFile = $rootPath . "/logs/ip_logs.json";

        // Создаем директорию для логов, если её нет
        if (!file_exists($rootPath . "/logs")) {
            mkdir($rootPath . "/logs", 0777, true);
        }

        // Создаем файлы, если их нет
        if (!file_exists($this->logFile)) {
            file_put_contents($this->logFile, json_encode([]));
        }
        if (!file_exists($this->ipLogFile)) {
            file_put_contents($this->ipLogFile, json_encode([]));
        }
    }

    
    public function countVisit()
    {
        $ip = $_SERVER["REMOTE_ADDR"];
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
