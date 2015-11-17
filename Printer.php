<?php

/**
 * Created by PhpStorm.
 * User: madcow
 * Date: 17.11.15
 * Time: 13:59
 */
abstract class Printer
{
    protected $task;
    protected $display;
    public function Printer(Task $task,Display $display){
        $this->task=$task;
        $this->display=$display;
    }
    public abstract function performConditions();
    public abstract function performAnswer();
    public function showConditions(){
        $this->display->showInfo($this->performConditions());
        $this->display->stringDelimiter();
    }
    public function showAnswer(){
        $this->display->showInfo($this->performAnswer());
    }
}