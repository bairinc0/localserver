<?php

/**
 * Created by PhpStorm.
 * User: madcow
 * Date: 17.11.15
 * Time: 14:21
 */
require_once("Printer.php");
require_once("Task1.php");
class Task1Printer extends Printer
{
    public function performConditions(){
        $information=array();
        $information[0]="По каналу связи передаются сообщения, каждое из которых содержит ";
        $letters=$this->task->getLetters();
        foreach (array_keys($letters) as $key){
            $information[0].=$letters[$key]." букв ".$key.", ";
        }
        $information[0].="других букв в сообщениях нет.";
        $information[1]="Каждую букву кодируют двоичной последовательностью. При выборе кода учитывались два требования:";
        if ($this->task->method=="DirectFano"){
            $information[2]="а) ни одно кодовое слово не является началом другого (это нужно, чтобы код допускал однозначное декодирование);";
        }
        else{
            $information[2]="а) ни одно кодовое слово не является концом другого (это нужно, чтобы код допускал однозначное декодирование);";
        }
        $information[3]="б) общая длина закодированного сообщения должна быть как можно меньше.";
        $information[4]="Какой код из приведённых ниже следует выбрать для кодирования букв ";
        $i=1;
        foreach (array_keys($letters) as $key){
            $information[4].=$key;
            if ($i<count($letters)){
                $information[4].=", ";
            }
            else{
                $information[4].="?";
            }
            $i++;
        }
        $k=5;
        foreach ($this->task->getData() as $data){
            $i=1;
            $information[$k]=($k-4).") ";
            foreach ($data as $item){
                $information[$k].=key($item).":".$item[key($item)];
                if ($i<count($data)){
                    $information[$k].=", ";
                }
                $i++;
            }
            $k++;
        }
        return $information;
    }
    public function performAnswer(){
        $result_task=$this->task->solve();
        $information[0]="";
        if (count($result_task)==0){
            $information[0].="Ни один вариант не подходит";
        }
        else{
            $information[0].="Ответ:";
            $information[1]="";
            $i=1;
            foreach ($result_task as $result){
                $information[1].=key($result).":".$result[key($result)];
                if ($i<count($result_task)){
                    $information[1].=",";
                }
                $i++;
            }
        }
        return $information;
    }
}