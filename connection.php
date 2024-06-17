<?php
$severname ="localhost";
$username="root";
$password ="root";
$db_name="database1";
$conn=new mysqli($severname, $username,$password,$db_name );
if ($conn->connrct_error){
 die(" connection failed".$conn->connect_error);
}
echo"";
?>