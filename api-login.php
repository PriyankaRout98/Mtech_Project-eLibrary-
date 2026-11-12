<?php
header('Content-Type: application/json;');

$raw = file_get_contents("php://input");
$in = json_decode($raw, true);

$username = $in['username'] ?? '';
$password = $in['password'] ?? '';


$dbFile = __DIR__ . DIRECTORY_SEPARATOR . 'userInformation.db';
$payload = [];

if (empty($username) || empty($password)) {
    echo json_encode([
        "status" => "error",
        "message" => "Please enter both username and password."
    ]);
    exit();
}

try {
    $pdo = new PDO("sqlite:" . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM userInformation WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password === $user['password']) {
        $payload = [
            "status" => "success",
            "message" => "Login successful!",
            "user" => [
                "username" => $user['username'],
                "email" => $user['email']
            ]
        ];
    } else {
        $payload = [
            "status" => "error",
            "message" => "Invalid username or password."
        ];
    }

} catch (\PDOException $e) {
    $payload = [
        "status" => "error",
        "message" => "Database error occurred.",
        "error" => $e->getMessage()
    ];
}

echo json_encode($payload);
?>
