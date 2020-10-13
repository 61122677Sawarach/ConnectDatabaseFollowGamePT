<?php

include 'DBConfig.php';

$message = '';

$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 

$json = json_decode(file_get_contents('php://input'), true);

$query = "insert into patient_list(PName, PAge, PTelephone, PEmail) values ('$PName', '$PAge', '$PTelephone', '$PEmail')";

$result = $conn->query($query);

if ($result === true)
{
 $message = 'Success!';
}

else
{
 $message = 'Error! Try Again.';
}

echo json_encode($message);

$conn->close();