<?php

/**
 * Created by PhpStorm.
 * User: madcow
 * Date: 05.11.15
 * Time: 12:29
 * Проверка выборки из задачи на валидность по обратному условию Фано
 */
require_once("Fano.php");
class ReverseFano extends Fano
{
    public function cmpElement($firstElem,$secondElem){
        return $firstElem[key($firstElem)]>$secondElem[key($secondElem)];
    }
    public function cmpStrings($hayStack,$needle){
        if (((strpos($hayStack,$needle)===0&&(strlen($hayStack)==strlen($needle))))||(strpos($hayStack,$needle)===(strlen($hayStack)-strlen($needle)))){
            return true;
        }
        else{
            return false;
        }
    }
}