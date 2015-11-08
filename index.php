<?php
	require_once("ReverseFano.php");
	echo "TestGround<hr>";
	/*
	$codeArray=array();
	array_push($codeArray,array("A"=>"1102"));
	array_push($codeArray,array("B"=>"10"));
	array_push($codeArray,array("C"=>"01"));
	array_push($codeArray,array("D"=>"100"));
	print_r($codeArray);
	echo "<hr>";

	//---------------------------------------
	$algFano=new ReverseFano();
	$result=$algFano->checkArray($codeArray);
	if ($result){
		print_r($result);
	}
	*/
	require_once("CodeGenerator.php");
	$cd=new CodeGenerator();
	$cd->addSymbol('A');
$cd->addSymbol('B');
$cd->addSymbol('A');
print_r($cd);
?>