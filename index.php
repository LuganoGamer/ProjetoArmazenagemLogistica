<?php
session_start();
$conn = new mysqli("localhost:3306", "root", "", "estoqueapp");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["usuario"] = $email;
        header("Location: produc.php");
        exit;
    } else {
        echo "<p style='color:red;'>Login inválido!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link rel="stylesheet" href="css/stilo.css">
</head>

<body>
    <div class="login-container">
        <h1> Login </h1>
        <p> Confirme as Informações </p>
        <form method="post">
            <label for="email"> EMAIL</label>
            <input type="email" id="email" name="email" placeholder="hello@reallygreatsite.com" required>

            <label for="senha"> PASSWORD </label>
            <input type="password" id="senha" name="senha" placeholder="******" required>

            <button> Login </button>
        </form>
    </div>
</body>

</html>