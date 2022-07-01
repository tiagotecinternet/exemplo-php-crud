<?php
require_once '../vendor/autoload.php';

use CrudPoo\Fabricante;
use CrudPoo\Produto;

$fabricante = new Fabricante;
$produto = new Produto;

$listaDeFabricantes = $fabricante->lerFabricantes();

// Pegando o valor do id e sanitizando
$produto->setId($_GET['id']);

// Chamando a função e recebendo os dados do produto
$dadosProduto = $produto->lerUmProduto();

if(isset($_POST['atualizar'])){
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setQuantidade($_POST['quantidade']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setFabricanteId($_POST['fabricante']);

    $produto->atualizarProduto();
    header("location:listar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualizar</title>
</head>
<body>
    <div class="container">
        <h1>Produtos | SELECT/UPDATE</h1>
        <hr>

        <form action="" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input value="<?=$dadosProduto['nome']?>" type="text" name="nome" id="nome" required>
            </p>

            <p>
                <label for="preco">Preço:</label>
                <input value="<?=$dadosProduto['preco']?>"
                 type="number" name="preco" id="preco" 
                min="0" max="10000" step="0.01" required>
            </p>    

            <p>
                <label for="quantidade">Quantidade:</label>
                <input value="<?=$dadosProduto['quantidade']?>"
                 type="number" name="quantidade" id="quantidade" 
                min="0" max="100" required>
            </p>    
            <p>
                <label for="fabricante">Fabricante:</label>
        <select name="fabricante" id="fabricante" required>
            <option value=""></option>
            <?php foreach($listaDeFabricantes as $dadosFabricante) { ?>
                <option 
            <?php 
            if($dadosProduto['fabricante_id'] === $dadosFabricante['id']) echo " selected ";
            ?> 
                value="<?=$dadosFabricante['id']?>">
                    <?=$dadosFabricante['nome']?>
                </option>
            <?php } ?>
        </select>
            </p>
            <p>
                <label for="descricao">Descrição:</label> <br>
                <textarea required name="descricao" id="descricao" cols="30" rows="3"><?=$dadosProduto['descricao']?></textarea>
            </p>
            <button type="submit" name="atualizar">
                Atualizar produto</button>
        </form>

        <p><a href="listar.php">
        Voltar para lista de produtos</a></p>

        <p><a href="../index.php">Home</a></p>
    </div>
</body>
</html>