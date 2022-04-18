<?php
    class dbconnect 
    {
        public $server; 
        public $port; 
        public $user; 
        public $mdp;
        public $database; 
        public $pdo;

        public function __construct($server , $port , $user , $mdp , $database)
        {
            $this->server = $server;
            $this->port = $port;
            $this->user = $user;
            $this->mdp = $mdp;
            $this->database = $database;
        }
        public function connect()
        {
            if($this->pdo===null)
            {
                $pdo = new pdo("mysql:host=".$this->server.";port=".$this->port.";dbname=".$this->database."; charset=utf8", $this->user , $this->mdp);
            }
            return $this->pdo = $pdo;
        }
    }