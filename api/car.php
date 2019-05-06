<?php

    include '../dbConnection.php';
    
    $conn = getDatabaseConnection("car");
    
    $sql = "INSERT INTO `car_info`(`make`, `model`, `year`, `highway`, `city`) VALUES ('". $_POST['make'] . "', '" . $_POST['model'] . "', " . $_POST['year'] . ", " . $_POST['highway'] . ", " . $_POST['city'] . ")";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
?>