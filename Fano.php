<?php

/**
 * Created by PhpStorm.
 * User: madcow
 * Date: 05.11.15
 * Time: 12:07
 */

abstract class Fano 
{
    private $codeArray=array();   
    public function checkArray($codeArray){
        /*
         * функция проверяет массив кодов на соответствие условию Фано
         * возвращает false - если условие Фано выполняется
         * возвращает ассоциативный массив с элементами, в которых нарушено условие Фано
        */
        //1. Сортируем массив по значению, применяем функцию сортировки ассоциативных массивов с компаратором
        usort($codeArray,array(get_class($this), "cmpElement"));
        $flag=false;
        //2. Проверяем выполнение правила Фано
        for($i=0;($i<count($codeArray)-1)&&!$flag;$i++){
            for ($j=$i+1;($j<count($codeArray))&&!$flag;$j++){
                if ($this->cmpStrings($codeArray[$j][key($codeArray[$j])],$codeArray[$i][key($codeArray[$i])])){
                    $flag=true;
                    $equals=array("first_arr"=>$codeArray[$i],"second_arr"=>$codeArray[$j]);
                }
            }
        }
        if ($flag) {
            return $equals;
        }
        else{
            return false;
        }
    }
    abstract function cmpElement($firstElement,$secondElement);//компаратор для элементов массива
    abstract function cmpStrings($hayStack,$needle);//"Сравнение" строк - проверяет вхождение подстроки $needle в строку $haystack, при этом важна позиция
}