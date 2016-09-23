<?php
include 'parseCSV.class.php';

$main = new ParseCSV("DecorDoc-2016-08-30.csv");
var_dump($main->getContent());