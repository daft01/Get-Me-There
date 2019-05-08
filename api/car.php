<?php

    include 'dbConnection.php';
    
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM `cars`";
    // $sql = "UPDATE `cars` SET `email`='hello123@gmail.com',`model`='". $_POST['model']. "', `year`=". $_POST['year'] . " ,`highway`=" . $_POST['highway'] . ",`city`=" . $_POST['city'] . ",`made`='" . $_POST['make'] "'  WHERE 1";
    $stmt = $conn->prepare($sql);
    if($stmt == false)
    {
        $sql = "INSERT INTO `cars`(`email`, `model`, `year`, `highway`, `city`, `made`) VALUES ('hello123@gmail.com', '". $_POST['model'] . "', " . $_POST['year'] . ", " . $_POST['highway'] . ", " . $_POST['city'] . " , '" . $_POST['make'] . "')";
        
    }
    else
    {
        $sql = "UPDATE `cars` SET `email`='hello123@gmail.com',`model`='". $_POST['model']. "', `year`=". $_POST['year'] . " ,`highway`=" . $_POST['highway'] . ",`city`=" . $_POST['city'] . ",`made`='" . $_POST['make'] "'  WHERE 1";
        
    }
    $stmt = $conn->prepare($sql);
    
    $stmt->execute();
?>