<?php
session_start();
if(!isset($_SESSION["usuario"])){
    header("Location: index.php");
    exit;
}

$conn = new mysqli("localhost","root","","estoqueApp");
$id = $_GET["id"];
$sql = "SELECT * FROM produtos WHERE id=$id";
$result = $conn->query($sql);
$produto = $result->fetch_assoc();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $qtd = (int)$_POST["quantidade"];
    if($qtd > 0 && $qtd <= $produto["quantidade"]){
        $novoEstoque = $produto["quantidade"] - $qtd;
        $conn->query("UPDATE produtos SET quantidade=$novoEstoque WHERE id=$id");
        $conn->query("INSERT INTO movimentacoes (produto_id, quantidade, tipo) VALUES ($id, $qtd, 'saida')");
        header("Location: produc.php");
        exit;
    } else{
        echo "<p style='color:red;'>Quantidade inválida!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $produto["nome"]; ?>  </title>
    <link rel="stylesheet" href="css/stiloProcArgamassa.css">
</head>
<body>
    <img src="argamassa.png" alt="Argamassa">
    <h2><?php echo $produto["nome"]; ?></h2>
    <p> Quantidade em estoque: <?php echo $produto["quantidade"]; ?></p>

    <form method="POST">
        <input type="number" name="quantidade" placeholder="Quantidade" min="1" required>
        <button type="submit"> Adicionar ao Carrinho (Saída)</button>
    </form>
    
    <a href="produc.php"><button class="btn"> Voltar </button></a>
</body>
</html>