<?php
    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("get_me_there");
    
    $sql = "SELECT * FROM users NATURAL JOIN cars WHERE email = '" . $_GET["email"] . "'";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($records);
    
?>