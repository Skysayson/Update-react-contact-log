<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'DBconnect.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $lastName = $_POST['last_name'];
    $firstName = $_POST['first_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact_num'];

    $insertdb = "INSERT INTO `contact`(lastName,  firstName, email, contact)
    VALUES(?,?,?,?)";
    $prepInsert = $dbcon->prepare($insertdb);
    $prepInsert->bind_param("ssss",$lastName,$firstName,$email,$contact);
    
    if($prepInsert->execute()) {
        echo "Insert success";
    } else {
        echo "Insert fail";
    }

    $prepInsert->close();
    $dbcon->close();
}

