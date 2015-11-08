<?php
/**
 * Created by PhpStorm.
 * User: madcow
 * Date: 04.11.15
 * Time: 10:42
 * Проверка выборки из задачи на валидность по прямому условию Фано
 */
require_once("Fano.php");
class DirectFano extends Fano
{
    public function cmpElement($firstElem,$secondElem){
        return $firstElem[key($firstElem)]>$secondElem[key($secondElem)];
    }
    public function cmpStrings($hayStack,$needle){
        if (strpos($hayStack,$needle)===0){
            return true;
        }
        else{
            return false;
        }
    }
}
