<?php
ini_set('display_errors', '1');
include('config.php');

$studentId=$_GET['student'];
?>
<!DOCTYPE html>
<html>
<head>
<script src="node_modules/jquery/dist/jquery.min.js"></script>

<title>test student</title>
</head>

<body>
<div id="studentInfo"></div>
<div id="csmInfo"></div>
<div id="csmmInfo"></div>
<div id="avg"></div>
</body>

</html>
<script>
$( document ).ready(function() {
    getStudentInfo();
});
function getStudentInfo(){
    var student='<?php echo $_GET['student']; ?>';
    console.log(student);
    var data={};
	data.event="get_student_info";
    data.id=student;
    var url='student_ajax.php';
      	
	ajaxRequest(url, data, function(response){
        console.log(response);
        var obj = $.parseJSON(response);
        console.log(obj);
        id=obj['info']['id'];
        art=obj['info']['list_grades'];
        var obj2 = $.parseJSON(obj['info']['list_grades']);
        var art=obj2['art'];
        var science=obj2['science'];
        var mathematics=obj2['mathematics'];
        var sum=(parseInt(art)+parseInt(science)+parseInt(mathematics))/3;
        console.log(sum);
        console.log(Math.max(art, science, mathematics));
        if(sum >=7){
            $("#studentInfo").html(response);
            $("#csmInfo").html("CSM pass");
            $("#avg").html(sum);
        }else{
            $("#studentInfo").html(response);
            $("#csmInfo").html("CSM not pass");
            $("#avg").html(sum);
        }
        if(Math.max(art, science, mathematics)>8){
            $("#studentInfo").html(response);
            $("#csmmInfo").html("CSMB pass");
        }
        else{
            $("#studentInfo").html(response);
            $("#csmmInfo").html("CSMB not pass");
        }
        
    });
}

function ajaxRequest(url,data,successFunction){
    var request=$.ajax({
        url: url,
        type: "POST",
        data: data,
    });
    request.done(function(data, textStatus, jqXHR){
        successFunction(jqXHR.responseText);
    });
    request.fail(function (jqXHR, textStatus, errorThrown){
        // alert(errorThrown);
    });	
}
</script>