<?php
include 'connection.php';
$toll=$_POST['tollgateno'];
$loc=$_POST['location'];
$query="INSERT INTO TOLLGATE VALUES('${toll}','${loc}')";
$res=oci_parse($conn,$query);
$exec=oci_execute($res);
if(!$exec)
    echo "Toll gate id already exists";
$c="car/van/jeep";
$t="truck/bus";
$l="LCV";
$s="upto 6 axles";
$sev="7 or more axles";
$cs=$_POST['cs'];
$cu=$_POST['cu'];
$cm=$_POST['cm'];
$ls=$_POST['ls'];
$lu=$_POST['lu'];
$lm=$_POST['lm'];
$ts=$_POST['ts'];
$tu=$_POST['tu'];
$tm=$_POST['tm'];
$ss=$_POST['ss'];
$su=$_POST['su'];
$sm=$_POST['sm'];
$sevs=$_POST['sevs'];
$sevu=$_POST['sevu'];
$sevm=$_POST['sevm'];
$query1="INSERT INTO CHARGE VALUES ('${toll}','${c}','${cs}','${cu}','${cm}')";
$query2="INSERT INTO CHARGE VALUES ('${toll}','${t}','${ts}','${tu}','${tm}')";
$query3="INSERT INTO CHARGE VALUES ('${toll}','${l}','${ls}','${lu}','${lm}')";
$query4="INSERT INTO CHARGE VALUES ('${toll}','${s}','${ss}','${su}','${sm}')";
$query5="INSERT INTO CHARGE VALUES ('${toll}','${sev}','${sevs}','${sevu}','${sevm}')";
$res1=oci_parse($conn,$query1);
$res2=oci_parse($conn,$query2);
$res3=oci_parse($conn,$query3);
$res4=oci_parse($conn,$query4);
$res5=oci_parse($conn,$query5);
oci_execute($res1);
oci_execute($res2);
oci_execute($res3);
oci_execute($res4);
oci_execute($res5);

oci_close($conn);

echo $toll."is successfully added at".$loc;
?>
