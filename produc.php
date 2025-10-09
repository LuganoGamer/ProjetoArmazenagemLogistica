<?php
session_start();
if(!isset($_SESSION["usuario"])){
    header("Location: index.php");
    exit;
}

$conn = new mysqli("localhost","root","","estoqueApp");
$result = $conn->query("SELECT * FROM produtos");
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Lista de Produtos </title>
    <link rel="stylesheet" href="css/stiloProduc.css">
</head>
<body>

    <h2> Lista de Produtos </h2>
    <a href="logout.php"><button class="sair"> Sair </button></a>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th> Produto </th>
            <th> Quantidade </th>
            <th> Ação </th>
        </tr>
        <?php while($row = $result->fetch_assoc()){?>
            <tr>
                <td><?php echo $row["nome"]; ?></td>
                <td><?php echo $row["quantidade"]; ?></td>
                <td><a href="produto.php?id=<?php echo $row["id"]; ?>"><button> Ver </button></a></td>
            </tr>    
        <?php } ?>
    </table>
</body>
</html>