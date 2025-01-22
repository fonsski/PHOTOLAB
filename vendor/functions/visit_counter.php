<?php
class VisitCounter {
    private $logFile;
    private $ipLogFile;
    
    public function __construct() {
        $this->logFile = __DIR__ . '/logs/visits.json';
        $this->ipLogFile = __DIR__ . '/logs/ip_logs.json';
        
        // Создаем директорию для логов, если её нет
        if (!file_exists(__DIR__ . '/logs')) {
            mkdir(__DIR__ . '/logs', 0777, true);
        }
        
        // Создаем файлы, если их нет
        if (!file_exists($this->logFile)) {
            file_put_contents($this->logFile, json_encode([]));
        }
        if (!file_exists($this->ipLogFile)) {
            file_put_contents($this->ipLogFile, json_encode([]));
        }
    }
    
    public function countVisit() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $today = date('Y-m-d');
        
        // Загружаем текущие данные
        $visits = json_decode(file_get_contents($this->logFile), true);
        $ipLogs = json_decode(file_get_contents($this->ipLogFile), true);
        
        // Очищаем старые IP-логи (старше 24 часов)
        $ipLogs = array_filter($ipLogs, function($timestamp) {
            return $timestamp > (time() - 86400);
        });
        
        // Проверяем, посещал ли этот IP сегодня
        if (!isset($ipLogs[$ip]) || $ipLogs[$ip] < (time() - 3600)) { // Учитываем новое посещение раз в час
            // Добавляем или обновляем счетчик для текущего дня
            if (!isset($visits[$today])) {
                $visits[$today] = 1;
            } else {
                $visits[$today]++;
            }
            
            // Обновляем время последнего посещения для IP
            $ipLogs[$ip] = time();
            
            // Сохраняем данные
            file_put_contents($this->logFile, json_encode($visits));
            file_put_contents($this->ipLogFile, json_encode($ipLogs));
        }
    }
    
    public function getTotalVisits() {
        $visits = json_decode(file_get_contents($this->logFile), true);
        return array_sum($visits);
    }
    
    public function getVisitsData($days = 7) {
        $visits = json_decode(file_get_contents($this->logFile), true);
        $dates = [];
        $visitCounts = [];
        
        // Получаем данные за последние $days дней
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $dates[] = $date;
            $visitCounts[] = isset($visits[$date]) ? $visits[$date] : 0;
        }
        
        return [
            'dates' => $dates,
            'visits' => $visitCounts
        ];
    }
}