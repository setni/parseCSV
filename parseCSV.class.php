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
    }
    
    public function getContent()
    {
        $this->test = function () {
            return 'salut';
        };
        $file = $this->file;
        $row = 1;
        $array = [];
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $col = [];
                for ($c=0; $c < $num; $c++) {
                   $col[] = $data[$c];
                }
                $array["Row $row: $num champs"] = $col;
                $row++;
            }
            fclose($handle);
        }
        //return $array;
    }
}

