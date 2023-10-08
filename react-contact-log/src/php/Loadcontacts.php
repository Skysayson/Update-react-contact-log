<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include 'DBconnect.php';

if($_SERVER['REQUEST_METHOD'] === 'GET') 
{
    $query = "SELECT lastName, firstName, email, contact FROM `contact` ORDER BY lastName ASC";
    $result = $dbcon->query($query);

    if($result) {
        $contacts = [];
        while($row = $result->fetch_assoc()) {
            $contacts[] = $row;
        }

        $result->close();
        header('Content-Type: application/json');

        echo json_encode($contacts);
    } else {
        echo json_encode(['error'=> 'Failed to fetch contacts']);
    }
}