<?php
header('Content-Type: application/json;');

$raw =file_get_contents("php://input");
$in = json_decode($raw,true);

$firstname = $in['firstname'];
$lastname = $in['lastname'];
$username = $in['username'];
$phone = $in['phone'];
$email = $in['email'];
$password = $in['password'];


$dbFile = __DIR__ . DIRECTORY_SEPARATOR.'userInformation.db';

$payload = [];

try {
    $pdo = new PDO("sqlite:" . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $sql="INSERT INTO userInformation (firstname, lastname, username, phone, email, password) VALUES (:firstname, :lastname, :username, :phone, :email, :password)";

    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    $stmt->execute();

    $payload = [
        "status" => "success",
        "message" => "User registered successfully!"
    ];

} catch (\PDOException $e) {
    $payload =[
        "status" => "error",
        "firstname" => "First Name = ".$in['firstname'],
        "lastname" => "Last Name = ".$in['lastname'],
        "username" => "Username = ".$in['username'],
        "phone" => "Phone = ".$in['phone'],
        "email" => "Email = ".$in['email'],
        "password" => "Password = ".$in['password'],
        "error" => $e->getMessage()
];
}

echo json_encode($payload);

?>
