<?php

/**
 * Created by PhpStorm.
 * User: madcow
 * Date: 05.11.15
 * Time: 21:07
 */
class CodeGenerator
{
    private $codeSymbols=false;
    private $symbols=array();
    private $checker=false;
    //1. Работаем с кодировочными символами
    public function addCodeSymbol($from,$till){
        //функция добавляет символы в массив по коду
        for($i=$from;$i<=$till;$i++){
            $this->codeSymbols[$i]=chr($i);
        }
    }
    public function setBinaryCode(){
        $this->addCodeSymbol(48,49);
    }
    public function getCodeSymbols(){
        return $this->codeSymbols;
    }

    public function setChecker(Fano $fanoCondition){
        $this->checker=$fanoCondition;
    }
    //2. Задаём символы
    public function addSymbol($symbol){
        if (!in_array($symbol,$this->symbols)){
            $this->symbols[count($this->symbols)]=$symbol;
        }
    }
    //3. Генерируем код
    public function generate($count=0){
        //генерирует кодировку для символов, если параметр =0 (по умолчанию), то кодировка неравномерная, иначе равномерная
        //генерим равномерную кодировку ибо лень думать
        if (($this->checker!==false)&&($this->codeSymbols!==false)&&(count($this->symbols)>0)){
            if ($count==0){
                $count=count($this->symbols);
            }
            //2015.11.05 - закончил тут.
        }
        else{
            throw new Exception("Invalid action in CodeGenerator class - invalid checker or code Symbols");
        }
    }
}