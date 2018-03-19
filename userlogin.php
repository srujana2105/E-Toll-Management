<?php
include 'connection.php';
$v=$_POST['vehicleno'];
$p=$_POST['userpassword'];
if($v=='' || $p=='')
    echo "<p>enter details<p>";
else
{
    $query="SELECT VID,PASSWORD FROM VEHICLE WHERE VID='".$v."'";
    $res=oci_parse($conn,$query);
    oci_execute($res);
    $array=oci_fetch_array($res,OCI_BOTH);
    echo $array['VID']." ".$array['PASSWORD'];
    if($array['VID']==$v && $array['PASSWORD']==md5($p))
        header("Location: user.php?vid=".$v);
    else
    {
        echo "invalid details";
    }
}
oci_close($conn);

?>