<?php
session_start();

include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO userlogin (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) 
    {
        header('Location: index_login.php');
    } 
    else 
    {
        echo "Registration failed";
    }
}
?>