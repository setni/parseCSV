<?php

class ParseCSV
{
    private $file;
    
    public function setFile($file)
    {
        $this->file = $file;
    }
    
    public function __construct($file = '')
    {
        $this->setFile($file);
        $this->actionFile();
    }
    
    public function getContent()
    {
        
        $row = 1;
        $arrayData = [];
        $colName;
        
        if (($handle = fopen($this->file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $num = count($data);
                $col = [];
                if($row === 1) {
                    $colName = $data;
                }
                for ($c=0; $c < $num; $c++) {
                    $col[$colName[$c]] = $this->_actionFile['testEmpty']($data[$c]);
                }
                $arrayData["Row $row: $num champs"] = $col;
                $row++;
            }
            fclose($handle);
        }
        return $arrayData;
    }
    
    private function actionFile () 
    {
        $this->_actionFile = [
            'testEmpty' => function($val) {
                return (empty($val)) ? "empty" : $val;
            },
            'testInt' => function($val) {
                //some code
            }
        ];
    }
}

