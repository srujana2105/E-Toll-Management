<?php

$conn=oci_connect('scott','2105','localhost/orcl');
if(!$conn)
    echo "database connection failed";
?>