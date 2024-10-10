<?php
// config.php
$host = 'localhost';
$db = 'Login_site';
$user = 'root'; // Substitua pelo seu usuário do banco
$pass = '';   // Substitua pela sua senha do banco

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Connection failed: ' . $e->getMessage()]);
    exit;
}
?>
