<?php
    
    include 'dbConnection.php';
    session_start();
    
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM `cars`";
    // $sql = "UPDATE `cars` SET `email`='hello123@gmail.com',`model`='". $_POST['model']. "', `year`=". $_POST['year'] . " ,`highway`=" . $_POST['highway'] . ",`city`=" . $_POST['city'] . ",`made`='" . $_POST['make'] ."'  WHERE 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if($records == false)
    {
        $sql = "INSERT INTO `cars`(`email`, `model`, `year`, `highway`, `city`, `made`) VALUES ('" . $_POST['email'] . "', '". $_POST['model'] . "', " . $_POST['year'] . ", " . $_POST['highway'] . ", " . $_POST['city'] . " , '" . $_POST['make'] . "')";
        echo $sql;
    }
    else
    {
        $sql = "UPDATE `cars` SET `email`='" . $_POST['email'] . "',`model`='" . $_POST['model'] . "', `year`=". $_POST['year'] . " ,`highway`=" . $_POST['highway'] . ",`city`=" . $_POST['city'] . ",`made`='" . $_POST['make'] ."' WHERE 1";
        echo $sql;
    }
    $stmt = $conn->prepare($sql);
    
    $stmt->execute();
?>