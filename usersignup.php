<?php
include 'connection.php';
$vname = $_POST['vehicle'];
$vtype = $_POST['vtype'];
$pass = $_POST['password3'];
if(!$vname || !$vtype || !$pass){
    header("Location: index.html");
    echo '<script>';
        echo 'window.alert("enter all details")';
        echo 'document.getElementById("usersignup").style.display ="block"';
        echo '</script>';
        
}else {
    $pass=md5($pass);
    $query="insert into vehicle(vid,vtype,password) values('${vname}','${vtype}','${pass}')";
    //$query="insert into vehicle values('123','car',0,'gsvdhgdv')";
    $result = oci_parse($conn,$query);
    $exec = oci_execute($result);
    if($exec){
    header("Location: user.php?vid='".$vname."'");
}}
oci_close($conn);

?>