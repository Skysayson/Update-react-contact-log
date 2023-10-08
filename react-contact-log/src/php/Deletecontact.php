<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");

    include 'DBconnect.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $lastName = $_POST['deleteLast'];

        $deletedb = "DELETE FROM `contact` WHERE lastName = ?";
        $prepDel = $dbcon->prepare($deletedb);
        $prepDel->bind_param("s", $lastName);

        if($prepDel->execute()) {
            echo "Successfully Deleted";
        }

        $prepDel->close();
        $dbcon->close();
    }