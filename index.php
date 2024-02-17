<?php
include "functions.php";

// CREATE
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dadosFormulario = obterDadosFormulario($_POST);

    if (!empty(array_filter($dadosFormulario))) {
        adicionarFormulario($dadosFormulario);
        header("Location: index.php");
        exit();
    }
}

// READ
$formularios = obterFormularios();

// UPDATE
if (isset($_GET["editar"])) {
    $idParaEditar = $_GET["editar"];
    $formularioParaEditar = obterFormularioPorId($idParaEditar);
}

// DELETE
if (isset($_GET["excluir"])) {
    $idParaExcluir = $_GET["excluir"];
    excluirFormulario($idParaExcluir);
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets-meu/css/style.css">
    <title>CRUD com PHP e PostgreSQL</title>
</head>

<body>
    <h1>Formulário</h1>
    <!-- Formulário de Inserção -->
    <form method="post" action="index.php">
        <h3>Dados do Empreendimento</h3>
        <div class="form-section">

            <label for="nome">Nome/Razão Social:</label>
            <input type="text" name="nome" required maxlength="255">

            <label for="data">Data:</label>
            <input type="date" name="data" required>

            <label for="cpf_cnpj">CPF/CNPJ:</label>
            <input type="text" name="cpf_cnpj" required maxlength="20">
        </div>
        <h3>Dados da Localização</h3>
        <div class="form-section">
            <label for="endereco">Endereço do Empreendimento:</label>
            <input type="text" name="endereco" required maxlength="255">

            <label for="municipio">Município:</label>
            <input type="text" name="municipio" required maxlength="100">

            <label for="uf">UF:</label>
            <input type="text" name="uf" required maxlength="2">

            <label for="area_empreendimento">Área do Empreendimento:</label>
            <input type="text" name="area_empreendimento" required maxlength="50">

            <label for="horario">Horário:</label>
            <input type="time" name="horario" required>

            <label for="cep">CEP:</label>
            <input type="text" name="cep" required maxlength="10">

            <h3>Coordenadas Geográficas</h3>
            <div class="form-section">
                <label for="latitude">Latitude:</label>
                <input type="text" name="latitude" required maxlength="20">

                <label for="longitude">Longitude:</label>
                <input type="text" name="longitude" required maxlength="20">
            </div>
        </div>

        <h3>Dados da Ocorrência</h3>
        <div class="form-section">
            <label for="uf_2">UF:</label>
            <input type="text" name="uf_2" required>

            <label for="descricao_ocorrencia">Descrição da Ocorrência:</label>
            <textarea name="descricao_ocorrencia" required></textarea>

            <label for="dispositivos_legais">Dispositivos Legais Infringidos:</label>
            <textarea name="dispositivos_legais" required></textarea>

            <label for="descricao_multa">Descrição do Valor da Multa:</label>
            <textarea name="descricao_multa" required></textarea>

            <label for="cpf_autuado">CPF do Autuado ou Representante:</label>
            <input type="text" name="cpf_autuado" required maxlength="20"> 

            <label for="data_assinatura">Data da Assinatura:</label>
            <input type="date" name="data_assinatura" required>

            <label for="cpf_testemunha_1">CPF da Testemunha 1:</label>
            <input type="text" name="cpf_testemunha_1" required maxlength="20">

            <label for="cpf_testemunha_2">CPF da Testemunha 2:</label>
            <input type="text" name="cpf_testemunha_2" required maxlength="20">

            <label for="nome_testemunha_1">Nome da Testemunha 1:</label>
            <input type="text" name="nome_testemunha_1" required maxlength="255">

            <label for="nome_testemunha_2">Nome da Testemunha 2:</label>
            <input type="text" name="nome_testemunha_2" required maxlength="255">
        </div>

        <div class="buttonContainer">
            <button type="submit">Adicionar</button>
            <a href="listar_formularios.php" class="btn-listar">Listar Formulários</a>
        </div>
    </form>
</body>

</html>
