<?php
class DrugItem
{
    private $id = "";
    private $ItemName = "";


    public function __construct($InputId, $NameParam)
    {
        $this->id = $InputId;
        $this->ItemName = $NameParam;
    }


    public function __destruct()
    {
        echo "<hr>";
    }


    public function SetID($InputId)
    {
        $this->id = $InputId;
    }


    public function SetName($NameParam)
    {
        $this->ItemName = $NameParam;
    }


    public function DisplayData()
    {
        echo "ID: ".$this->id."<br>";
        echo "Name: ".$this->ItemName."<br>";
    }
}
?>