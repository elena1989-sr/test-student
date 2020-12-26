<?php 
// ini_set("display_errors",1);

class Student_Class{

	function __construct() {
        
    }
    public function get_student($studentId){
        global $mysqliObj;
        $command = "SELECT * FROM student where id='".$studentId."'";
        $QueryObj = $mysqliObj->query($command, MYSQLI_USE_RESULT);
        while($row = $QueryObj->fetch_assoc()){
           return $row;
        }
      
    }
}