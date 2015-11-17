<?php

/**
 * Created by PhpStorm.
 * User: madcow
 * Date: 17.11.15
 * Time: 15:03
 */
require_once("Display.php");
class EchoDisplay extends Display
{
    public function showLine($line){
        echo $line."<br>";
    }
    public function stringDelimiter(){
        echo "<hr>";
    }
}