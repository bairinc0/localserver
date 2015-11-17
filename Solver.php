<?php
	//Тестер
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
	header('Content-Type: text/html; charset=utf-8');
	require_once("Task1.php");
	$task1=new Task1();
	//Задаём варианты задачи
	// 1-st set
	$codeArray=array();
	array_push($codeArray,array("А"=>"0"));
	array_push($codeArray,array("Б"=>"10"));
	array_push($codeArray,array("В"=>"110"));
	array_push($codeArray,array("Г"=>"111"));
	$task1->setData($codeArray);
	// 2-nd set
	$codeArray=array();
	array_push($codeArray,array("А"=>"0"));
	array_push($codeArray,array("Б"=>"10"));
	array_push($codeArray,array("В"=>"01"));
	array_push($codeArray,array("Г"=>"11"));
	$task1->setData($codeArray);
	// 3-rd set
	$codeArray=array();
	array_push($codeArray,array("А"=>"1"));
	array_push($codeArray,array("Б"=>"01"));
	array_push($codeArray,array("В"=>"011"));
	array_push($codeArray,array("Г"=>"001"));
	$task1->setData($codeArray);
	//4-th set
	$codeArray=array();
	array_push($codeArray,array("А"=>"00"));
	array_push($codeArray,array("Б"=>"01"));
	array_push($codeArray,array("В"=>"10"));
	array_push($codeArray,array("Г"=>"11"));
	$task1->setData($codeArray);
	//Задаём условия
	$codeArray=array("А"=>16,"Б"=>8,"Г"=>4,"В"=>4);
	$task1->setLetters($codeArray);
	//Вывод
	require_once("Task1Printer.php");
	require_once("EchoDisplay.php");
    $printer=new Task1Printer($task1,new EchoDisplay());
	//Выводим условие
	$printer->showConditions();
	//Выводим ответ
	$printer->showAnswer();
