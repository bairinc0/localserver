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
require_once("EvaluateCodeLength.php");
class Task1 extends Task{
	private $checkFano;//Алгоритм проверки - прямой/обратный
	private $variants=array();// массив вариантов кодировок
	private $letterCount=array();//массив количества букв
	public $method="DirectFano";
	public function Task1($method="DirectFano"){
		if ($method=="DirectFano"){
			$this->checkFano=new DirectFano();
		}
		else{
			$this->method="ReverseFano";
			$this->checkFano=new ReverseFano();
		}
	}
	public function setData($variants){
		array_push($this->variants, $variants);
	}
	public function setLetters($letterCount){
		$this->letterCount=$letterCount;
	}
	public function getLetters(){
		return $this->letterCount;
	}
	public function getData(){
		return $this->variants;
	}
	public function solve(){        
        $result=$this->findAllVariants();
		if(count($result)==0){
			return false;
		}
		else if (count($result)==1){
			return $result;
		}
		else{
			$estimator=new EvaluateCodeLength();
			$minSum=$estimator->evaluate($result[0],$this->letterCount);
			$resultMin=$result[0];
			for($i=1;$i<count($result);$i++){
				$currSum=$estimator->evaluate($result[$i],$this->letterCount);
				if ($minSum>$currSum){
					$resultMin=$result[$i];
					$minSum=$currSum;
				}
			}
			return $resultMin;
		}
    }
	public function findAllVariants(){
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

	
