<?php 

class WorkExp{
    private $id;
    private $date;
    private $workExp;
    
    function __construct($id, $date, $workExp) {
        $this->id = $id;
        $this->date = $date;
        $this->workExp = $workExp;
    }

    
    public function getId() {return $this->id;}

    public function getDate() {return $this->date;}

    public function getWorkExp() {return $this->workExp;}
    
}
?>

