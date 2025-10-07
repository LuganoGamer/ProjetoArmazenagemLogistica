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
    <title> Estoque </title>
    <link rel="stylesheet" href="css/stiloProduc.css">
</head>
<body>
    <a href="logout.php"><button class="sair"> Sair </button></a>
    
    <div class="estoque">
        <div class="item">
            <div class="info">
                <span> Parafusos </span>
                <span> 1000 </span>
            </div>

            <?php while($row = $result->fetch_assoc()){?>
                <tr>
                    <td><?php echo $row["nome"];?></td>
                    <td><?php echo $row["quantidade"];?></td>
                    <td><a href="produto_parafuso.php?id=<?php echo $row["id"]; ?>"><button class="btn"> Ver </button></a></td>
                </tr>
            <?php } ?>
        </div>

        <div class="item">
            <div class="info">
                <span> Prego </span>
                <span> 1000 </span>
            </div>

            <?php while($row = $result->fetch_assoc()){?>
                <tr>
                    <td><?php echo $row["nome"];?></td>
                    <td><?php echo $row["quantidade"];?></td>
                    <td><a href="produto_prego.php?id=<?php echo $row["id"]; ?>"><button class="btn"> Ver </button></a></td>
                </tr>
            <?php } ?>
        </div>

        <div class="item">
            <div class="info">
                <span> Arga Massa </span>
                <span> 500 </span>
            </div>

            <?php while($row = $result->fetch_assoc()){?>
                <tr>
                    <td><?php echo $row["nome"];?></td>
                    <td><?php echo $row["quantidade"];?></td>
                    <td><a href="produto_argamassa.php?id=<?php echo $row["id"]; ?>"><button class="btn"> Ver </button></a></td>
                </tr>
            <?php } ?>
        </div>

        <div class="item">
            <div class="info">
                <span> Buchas </span>
                <span> 2000 </span>
            </div>

            <?php while($row = $result->fetch_assoc()){?>
                <tr>
                    <td><?php echo $row["nome"];?></td>
                    <td><?php echo $row["quantidade"];?></td>
                    <td><a href="produto_bucha.php?id=<?php echo $row["id"]; ?>"><button class="btn"> Ver </button></a></td>
                </tr>
            <?php } ?>
        </div>

        <div class="item">
            <div class="info">
                <span> Tijolo </span>
                <span> 5000 </span>
            </div>

            <?php while($row = $result->fetch_assoc()){?>
                <tr>
                    <td><?php echo $row["nome"];?></td>
                    <td><?php echo $row["quantidade"];?></td>
                    <td><a href="produto_tijolo.php?id=<?php echo $row["id"]; ?>"><button class="btn"> Ver </button></a></td>
                </tr>
            <?php } ?>
        </div>

    </div>
    
</body>
</html>