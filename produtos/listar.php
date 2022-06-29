<?php
use CrudPoo\Produto;
require_once "../vendor/autoload.php";
$produto = new Produto;
$listaDeProdutos = $produto->lerProdutos();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Lista</title>
</head>
<body>
    <div class="container">
        <h1>Produtos | SELECT - <a href="../index.php">Home</a></h1>
        <hr>
        <h2>Lendo e carregando todos os produtos</h2>
        <p><a href="inserir.php">Inserir um novo produto</a></p> 

        <div class="produtos">
        <?php foreach($listaDeProdutos as $produto){ ?>    
            <article>
                <h3> <?=$produto['produto']?> </h3>
                <p>Preço: R$
                <?=number_format($produto['preco'], 2, ",", ".")?>
                </p>
                <p>Quantidade: <?=$produto['quantidade']?></p>
                <p><?=$produto['descricao']?></p>
                <p>Fabricante: <?=$produto['fabricante']?></p>
                <p>
                    <a href="atualizar.php?id=<?=$produto['id']?>">Atualizar</a> - 
                    <a class="excluir" href="excluir.php?id=<?=$produto['id']?>">Excluir</a>
                </p>
            </article>            
        <?php } ?>
        </div>

    </div>
    <script src="../js/confirm.js"></script>
</body>
</html>