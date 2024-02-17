<?php
include "functions.php";

// Obter a lista de formulários 
$formularios = obterFormularios();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets-meu/css/styleTables.css">
    <title>Lista de Formulários</title>
</head>

<body>
    <h1><a href="index.php"><-</a> Lista de Formulários</h1>

    <table class="containerTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Dados</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formularios as $formulario) : ?>
                <tr>
                    <td><?= $formulario['id'] ?></td>
                    <td><?= $formulario['nome'] ?></td>
                    <td><?= $formulario['data'] ?></td>
                    <td>
                        <a href="editar_formularios.php?id=<?= $formulario['id'] ?>">Editar</a>
                        <a href="index.php?excluir=<?= $formulario['id'] ?>" onclick="return confirm('Deseja realmente excluir este formulário?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
</body>

</html>
