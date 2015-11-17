<?php

/**
 * Created by PhpStorm.
 * User: madcow
 * Date: 17.11.15
 * Time: 15:01
 */
abstract class Display
{
    abstract function showLine($line);
    abstract function stringDelimiter();
    public function showInfo($info){
        foreach($info as $item){
            $this->showLine($item);
        }
    }
}