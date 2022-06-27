<?php
use CrudPoo\Fabricante;
require_once "../vendor/autoload.php"; 

$fabricante = new Fabricante;
$listaDeFabricantes = $fabricante->lerFabricantes();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Lista</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT - <a href="../index.php">Home</a></h1>
        <hr>
        <h2>Lendo e carregando todos os fabricantes</h2>

        <p>
            <a href="inserir.php">
                Inserir um novo fabricante
            </a>
        </p>

    
    <?php if(isset($_GET['status']) && $_GET['status'] == 'sucesso'){ ?>
        <p>Fabricante atualizado com sucesso!</p>
    <?php } ?>

        <table>
            <caption>Lista de Fabricantes</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th colspan="2">Operações</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($listaDeFabricantes as $fabricante) { ?>
    <tr>
        <td> <?=$fabricante["id"]?> </td>
        <td> <?=$fabricante["nome"]?> </td>
    <td> 
<a href="atualizar.php?id=<?=$fabricante['id']?>">
        Atualizar</a> </td>
<td> 

<!-- <a onclick="return confirm('Deseja realmente excluir?')" -->


<a class="excluir" href="excluir.php?id=<?=$fabricante['id']?>">Excluir</a> </td>
    </tr>
<?php
    }
?>

            </tbody>
        </table>

    </div>

<script src="../js/confirm.js"></script>



</body>
</html>