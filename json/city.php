<?php

$jsonFile="interview.json";
$jsondata = file_get_contents($jsonFile);
$data = json_decode($jsondata, true);

$array_data = $data['Report'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jsondb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

foreach ($array_data as $row) {
    $sql = "INSERT INTO clientreport (ticketID, clientName, mobileNo, contactType, callType, sourceName, storeName, questionType, dateCreated, questionSubType, dispositionName) VALUES ('" . $row["ticketID"] . "', '" . $row["clientName"] . "', '" . $row["mobileNo"] . "','" . $row["contactType"] ."', '" . $row["callType"] ."', '" . $row["sourceName"] . "', '"  . $row["storeName"] ."', '" . $row["questionType"] . "', '" . $row["dateCreated"] ."', '" . $row["questionSubType"] ."', '" . $row["dispositionName"] ."')";
    $conn->query($sql);
}

$conn->close();
?>