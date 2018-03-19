<?php

include 'connection.php';
$v=$_GET['vid'];
$v2='ap234';
$query1="select VTYPE,WALLET from vehicle where VID='".$v."'";
$res1=oci_parse($conn,$query1);
oci_execute($res1);
$vt=oci_fetch_array($res1,OCI_BOTH);
$vtype=$vt[0];
$w=(int)$vt[1]; 
$m='';
if(isset($_POST['mp']))
{
    $query1="select WALLET from vehicle where VID='".$v."'";
    $res1=oci_parse($conn,$query1);
    oci_execute($res1);
    $vt=oci_fetch_array($res1,OCI_BOTH);
    $w=$vt['WALLET'];
    $add=$_POST['addamount1'];
    $add=(int)$add;
    $w+=$add;
    $query="UPDATE VEHICLE SET WALLET='".$w."' WHERE VID='".$v."'";
    $result=oci_parse($conn,$query);
    $exec=oci_execute($result);
    oci_commit($conn);
    if($exec)
        $m="Payment successful";
}

 
    ?>
<div style="text-align:center" >
    <br />
<?php
    echo "vehicleno:".$v;
echo "<br />";
echo "vt=".$vtype;
echo "<br />";
echo "balance=".$w;
    ?>
    <br />
</div>

  <head>
    <title>vehicle user!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="styling.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
    
<div>  
  <div id=wallet-pass>
   <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="wallet-tab" data-toggle="tab" href="#wallet-cont" role="tab" aria-controls="wallet-cont" aria-selected="true">add money to wallet</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pass-tab" data-toggle="tab" href="#pass-cont" role="tab" aria-controls="pass-cont" aria-selected="false">take a pass</a>
  </li>
        <li class="nav-item">
    <a class="nav-link" id="curr-tab" data-toggle="tab" href="#curr-cont" role="tab" aria-controls="curr-cont" aria-selected="false">current passes</a>
  </li>
  
  </ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="wallet-cont" role="tabpanel" aria-labelledby="home-tab">
      <form method="post" action="">
      <br />
          <?php echo $m; ?>
      <label for="add-amount1">enter amount:</label>
      <input type=text placeholder="amount for wallet" name="addamount1" id="add-amount1">
      <br/>
      <input type="submit" value="make payment" name="mp">
      
      </form></div>
  <div class="tab-pane fade" id="pass-cont" role="tabpanel" aria-labelledby="pass-tab">
  <?php 
     
  echo "<iframe src='amount.php?vid=$v' height='290px' width='500px'' align='center'' frameBorder=0 scrolling='auto''></iframe>";
      ?>
  </div>
    <div class="tab-pane fade" id="curr-cont" role="tabpanel" aria-labelledby="curr-tab">
    <?php 
     
  echo "<iframe src='currentpasses.php?vid=$v2' width='500px'' align='center'' frameBorder=0 scrolling='auto''></iframe>";
      ?>
    </div>
  </div>
</div>      
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      <script src="tollgate.js"></script> 
      
    <?php
          oci_close($conn);
      ?>