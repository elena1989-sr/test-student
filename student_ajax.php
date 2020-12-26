<?php 
require_once("config.php");

if($_GET['event'] !='' || $_GET['event'] !=NULL){
    $event = $_GET['event'];
}else{
    $event = $_POST['event'];
}
if($event == 'get_student_info'){
    require_once("student_class.php");
    $student_obj = new Student_Class();
    echo json_encode(array('info'=>$student_obj->get_student($_POST['id'])),JSON_UNESCAPED_UNICODE);
}