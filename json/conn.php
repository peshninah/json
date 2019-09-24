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

    $sql = "INSERT INTO client(ticketID, Name, mobileNo) VALUES ('" . $row["ticketID"] . "', '" . $row["clientName"] . "', '" . $row["mobileNo"] . "')";

    $sqli = "INSERT INTO contact1(contactType,ticketID) VALUES ('" . $row["contactType"] . "','" . $row["ticketID"] . "')";

    $conn->query($sql);
    $conn->query($sqli);
    
}

$conn->close();
?>