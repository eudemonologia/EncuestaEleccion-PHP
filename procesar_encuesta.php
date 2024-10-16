<?php
include 'db.php';

$nombre = $_POST['nombre'];
$dni = $_POST['dni'];
$pregunta1 = $_POST['pregunta1'];
$candidato = $_POST['candidato'];

echo $nombre . "<br>";
echo $dni . "<br>";
echo $pregunta1 . "<br>";
echo $candidato . "<br>";

$query = "INSERT INTO encuesta (pregunta1, candidato) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $pregunta1, $candidato);
$stmt->execute();

$query_user = "INSERT INTO usuarios (nombre, dni) VALUES (?, ?)";
$stmt_user = $conn->prepare($query_user);
$stmt_user->bind_param("ss", $nombre, $dni);
$stmt_user->execute();

header("Location: gracias.php");
exit();
