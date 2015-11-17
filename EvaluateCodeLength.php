<?php

/**
 * Created by PhpStorm.
 * User: madcow
 * Date: 17.11.15
 * Time: 12:37
 * Оценкка длины кодировки
 */
require_once("Evaluation.php");
class EvaluateCodeLength implements Evaluation
{
    public function evaluate($array,$parameters=false){
        //1. Оцениваем длину кодировок в битах
        $estimatedArray=$array;
        $i=0;
        foreach ($estimatedArray as $item){
            $estimatedArray[$i][key($item)]=strlen($item[key($item)]);$i++;
        }
        $sum=0;
        if (is_array($parameters)&&(count($parameters)>0)){//задан массив для выяснения длины и он не пустой
            foreach ($estimatedArray as $item){
                $sum+=$item[key($item)]*$parameters[key($item)];
            }
        }
    }
}