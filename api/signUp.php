<?php

    include '../dbConnection.php';
    
    $conn = getDatabaseConnection("get_me_there");
    
    $options = [
        'cost' => 11,
        ];
        
    $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
    
    $sql = "INSERT INTO user (name, birthday, username, email, password, mpg)" . 
           "VALUES (:name, :birthday, :username, :email, :hashedPassword, :mpg)";
           
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>