<?php
$conn = new mysqli('localhost', 'cat2user', 'Cat2Pass#2026', 'CAT2');
if ($conn->connect_error) { die('DB connection failed: ' . $conn->connect_error); }
session_start();
