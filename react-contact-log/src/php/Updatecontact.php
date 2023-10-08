<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include 'DBconnect.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $upVal = $_POST['upVal'];
    $upUser = $_POST['upCon'];
    $choice = $_POST['upChoice'];

    $query = "SELECT * FROM `contact` WHERE lastName = ?";
    $prepQuery = $dbcon->prepare($query);
    $prepQuery->bind_param("s", $upUser);

    $prepQuery->execute();

    $result = $prepQuery->get_result();

    if($result->num_rows > 0) {
        switch($choice) {
            case 1:
                $updateLast = "UPDATE `contact` SET lastName = ?";
                $prepUp = $dbcon->prepare($updateLast);
                $prepUp->bind_param("s", $upVal);
        
                if($prepUp->execute()) {
                    echo "Successfully UPDATED Lastname";
                }
            break;

            case 2:
                $updateFirst = "UPDATE `contact` SET firstName = ?";
                $prepUp = $dbcon->prepare($updateFirst);
                $prepUp->bind_param("s", $upVal);
        
                if($prepUp->execute()) {
                    echo "Successfully UPDATED Firstname";
                }
            break;

            case 3:
                $updateEmail = "UPDATE `contact` SET email = ?";
                $prepUp = $dbcon->prepare($updateEmail);
                $prepUp->bind_param("s", $upVal);
        
                if($prepUp->execute()) {
                    echo "Successfully UPDATED Email";
                }
            break;

            case 4:
                $updateContact = "UPDATE `contact` SET contact = ?";
                $prepUp = $dbcon->prepare($updateContact);
                $prepUp->bind_param("s", $upVal);
        
                if($prepUp->execute()) {
                    echo "Successfully UPDATED Contact";
                }
            break;
        }
    }

    $prepUp->close();
    $dbcon->close();
}