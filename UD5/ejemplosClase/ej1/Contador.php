<?php

class Contador{
    
    private $count;
    private static $instance;
    public function __construct($count = 0){
        $this->count = $count;
        self::$instance++;
    }

    public function count(){
        $this->count++;
        return $this->count;
    }

    public static function countInstance(){
        return self::$instance;
    }
}