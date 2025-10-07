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
    <title><?php echo $produto["nome"]; ?></title>
    <link rel="stylesheet" href="css/stiloProcParafuso.css">
</head>
<body>
    <img src="parafuso.webp" alt="Parafuso">
    <h2><?php echo $produto["nome"]; ?></h2>
    <p> Quantidade: <?php echo $produto["quantidade"]; ?></p>

    <div>
        <input type="number" placeholder="Quantidade">
        <button class="btn"> Adicionar ao Carrinho </button>
        <button class="btn"> Comprar </button>
    </div>

    <a href="produc.php"><button class="btn"> Voltar </button></a>
</body>
</html>