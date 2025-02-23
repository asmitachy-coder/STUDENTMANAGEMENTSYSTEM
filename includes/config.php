<?php
$host="localhost";
$username="root";
$password="";
$db_name="sms";
$port=3306;
$conn=mysqli_connect($host,$username,$password,$db_name,$port);
if($conn){
    echo "connection established";
}
else{
    echo "connection failed";
}
?>