<?php

function dump($arr){
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}

function dd($arr){
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
	die();
}