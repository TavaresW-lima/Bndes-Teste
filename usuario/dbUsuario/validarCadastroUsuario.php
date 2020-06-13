<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "example";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$usuarioNome = filter_input(INPUT_POST, 'usuarioNome', FILTER_SANITIZE_STRING);
$usuarioSobre = filter_input(INPUT_POST, 'usuarioSobre', FILTER_SANITIZE_STRING);
$usuarioCpf = filter_input(INPUT_POST, 'usuarioCpf', FILTER_SANITIZE_STRING);
$usuarioCep = filter_input(INPUT_POST, 'usuarioCep', FILTER_SANITIZE_STRING);
$usuarioEmail = filter_input(INPUT_POST, 'usuarioEmail', FILTER_SANITIZE_STRING);
$usuarioSenha = filter_input(INPUT_POST, 'usuarioSenha', FILTER_SANITIZE_STRING);

$sql =  "INSERT INTO usuario (usuarioNome, usuarioSobre, usuarioCpf, usuarioCep, usuarioEmail, usuarioSenha)
                 VALUES ('$usuarioNome','$usuarioSobre','$usuarioCpf','$usuarioCep','$usuarioEmail','$usuarioSenha')";
echo "E-mail: $usuarioEmail <br>";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "E-mail: $usuarioEmail <br>";
    echo "Nome: $usuarioNome <br>";
    echo "usuarioSenha: $usuarioSenha <br>";

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  ?>
  