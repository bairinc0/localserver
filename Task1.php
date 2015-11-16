<?php
/*
По каналу связи передаются сообщения, каждое из которых содержит 16 букв А, 8 букв Б, 4 буквы В и 4 буквы Г (других букв в сообщениях нет). Каждую букву кодируют двоичной последовательностью. При выборе кода учитывались два требования: 
а) ни одно кодовое слово не является началом другого (это нужно, чтобы код допускал однозначное декодирование);
б) общая длина закодированного сообщения должна быть как можно меньше.
Какой код из приведённых ниже следует выбрать для кодирования букв А, Б, В и Г?
1) А:0, Б:10, В:110, Г:111
2) А:0, Б:10, В:01, Г:11
3) А:1, Б:01, В:011, Г:001
4) А:00, Б:01, В:10, Г:11
*/
require_once("Task.php");
require_once("ReverseFano.php");
require_once("DirectFano.php");
class Task1 extends Task{
	private $checkFano;
	public function Task1(Fano $checkFano){
		$this->checkFano=$checkFano;
	}
	private $variants=array();// массив вариантов
	public function setData($variants){
		array_push($this->variants, $variants);
	}
	public function getData(){
		return $this->variants;
	}
	public function solve(){        
        $result=array();
        foreach ($this->variants as $codeArray){
            $checkFano=$this->checkFano->checkArray($codeArray);            
            if (!$checkFano){
                array_push($result,$codeArray);
            }
        }
        return $result;
    }
}

	
