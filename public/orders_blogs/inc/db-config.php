<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=tailwabs;", "root", "", [
        PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
    ]);
} catch (Exception $e) {
    var_dump("Database error" . $e->getMessage());
}

return $pdo;
