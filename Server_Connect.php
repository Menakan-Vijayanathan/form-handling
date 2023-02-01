<?php
$host = "Localhost";
$username = "root";
$password = "";

$conn = new mysqli($host,$username,$password);

if($conn->connect_error){
	die("server not conenct".$conn->connect_error);
	echo"</b>";
}
else{
	echo"server connect";
	echo"</br>";
}

$sql = "CREATE DATABASE test12";	

if($conn->query($sql) === True){
	echo"Database Created";
	echo"</br>";
}
else{
	echo"Database not created".$conn->error;
}
$sql3 = "USE test12";

if($conn->query($sql3) === True){
	echo"USE Database";
	echo"</br>";
}
else{
	echo"Not Selected".$conn->error;
}

$sql1 = "CREATE TABLE form(First_name varchar(50),Last_name varchar(50),Password varchar(8))";

if($conn->query($sql1) === True){
	echo"Table Created";
	echo"</br>";
}
else{
	echo"Table not created".$conn->error;
}

$sql2 = $conn->prepare("INSERT INTO form(First_name,Last_name,Password) Values(?,?,?)");
$sql2 = bind_param($Fname,$Lname,$Pwd);

$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$Pwd = $_POST['Pword'];
$sql2->execute();

if($conn->query($sql2) === True){
	echo"Table Upadted";
}
else{
	echo"Table not Upadted".$conn->error;
}
?>