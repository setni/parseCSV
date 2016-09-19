<?php
include 'parseCSV.class.php';

$main = new ParseCSV("test.csv");
var_dump($main->getContent()->test());