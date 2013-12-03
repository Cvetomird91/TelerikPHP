<?php

class Types {
    public $type=array('1' => 'Храна', '2'=>'Транспорт', '3'=>'Офис Консумативи',
        '4'=>'Дрехи', '5'=>'Козметика',
        '6'=>'Медицина', '7'=>'Други');
    
    public $expence=array('0'=>'Всички', '1' => 'Храна', '2'=>'Транспорт', '3'=>'Офис Консумативи',
        '4'=>'Дрехи', '5'=>'Козметика',
        '6'=>'Медицина', '7'=>'Други');
    
    public function getType() {
       return $this->type;
    }
    
    public function getExpence () {
        return $this->expence;
    }
    
}


