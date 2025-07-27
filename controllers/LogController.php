<?php
require_once 'models/Log.php';

class LogController {
    public function index() {
        $logs = Log::listar();
        require 'views/logs/log_lista.php';
    }
    
}
?>
