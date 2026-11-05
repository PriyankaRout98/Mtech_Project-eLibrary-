<?php
header('Content-Type: application/json;');

$raw =file_get_contents("php://input");
$in = json_decode($raw,true);

$email = $in['username'];
$password = $in['password'];



$dbFile = __DIR__ . DIRECTORY_SEPARATOR.'userInformation.db';

try {
    $pdo = new PDO("sqlite:" . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="INSERT INTO userInformation (username, password) VALUES (':username', ':password')";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    $stmt->execute();

} catch (\PDOException $e) {
    $payload =[
    "username" => "Username = ".$in['username'],
    "password" => "Password = ".$in['password'],
    "error" => $e,
];
}

echo json_encode($payload);

?>

