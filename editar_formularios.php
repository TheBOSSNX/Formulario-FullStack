<?php
include "functions.php";

if (isset($_GET['id'])) {
    $idParaEditar = $_GET['id'];
    $formularioParaEditar = obterFormularioPorId($idParaEditar);

    if (!$formularioParaEditar) {
        header("Location: listar_formularios.php");
        exit();
    }
} else {
    header("Location: listar_formularios.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dadosFormulario = obterDadosFormulario($_POST);

    if (!empty(array_filter($dadosFormulario))) {
        atualizarFormulario($dadosFormulario, $idParaEditar);
        header("Location: listar_formularios.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets-meu/css/style.css">
    <title>Editar Formulário</title>
</head>

<body>
    <h1>Editar Formulário</h1>

    <!-- Formulário de Edição -->
    <form method="post" action="editar_formularios.php?id=<?php echo $idParaEditar; ?>">
        <h3>Dados do Empreendimento</h3>
        <div class="form-section">
            <label for="nome">Nome/Razão Social:</label>
            <input type="text" name="nome" value="<?php echo $formularioParaEditar['nome']; ?>" required>

            <label for="data">Data:</label>
            <input type="date" name="data" value="<?php echo $formularioParaEditar['data']; ?>" required>

            <label for="cpf_cnpj">CPF/CNPJ:</label>
            <input type="text" name="cpf_cnpj" value="<?php echo $formularioParaEditar['cpf_cnpj']; ?>" required>
        </div>

        <h3>Dados da Localização</h3>
        <div class="form-section">
            <label for="endereco">Endereço do Empreendimento:</label>
            <input type="text" name="endereco" value="<?php echo $formularioParaEditar['endereco']; ?>" required>

            <label for="municipio">Município:</label>
            <input type="text" name="municipio" value="<?php echo $formularioParaEditar['municipio']; ?>" required>

            <label for="uf">UF:</label>
            <input type="text" name="uf" value="<?php echo $formularioParaEditar['uf']; ?>" required>

            <label for="area_empreendimento">Área do Empreendimento:</label>
            <input type="text" name="area_empreendimento" value="<?php echo $formularioParaEditar['area_empreendimento']; ?>" required>

            <label for="horario">Horário:</label>
            <input type="time" name="horario" value="<?php echo $formularioParaEditar['horario']; ?>" required>

            <label for="cep">CEP:</label>
            <input type="text" name="cep" value="<?php echo $formularioParaEditar['cep']; ?>" required>

            <h3>Coordenadas Geográficas</h3>
            <div class="form-section">
                <label for="latitude">Latitude:</label>
                <input type="text" name="latitude" value="<?php echo $formularioParaEditar['latitude']; ?>" required>

                <label for="longitude">Longitude:</label>
                <input type="text" name="longitude" value="<?php echo $formularioParaEditar['longitude']; ?>" required>
            </div>
        </div>

        <h3>Dados da Ocorrência</h3>
        <div class="form-section">
            <label for="uf_2">UF:</label>
            <input type="text" name="uf_2" value="<?php echo $formularioParaEditar['uf_2']; ?>" required>

            <label for="descricao_ocorrencia">Descrição da Ocorrência:</label>
            <textarea name="descricao_ocorrencia" required><?php echo $formularioParaEditar['descricao_ocorrencia']; ?></textarea>

            <label for="dispositivos_legais">Dispositivos Legais Infringidos:</label>
            <textarea name="dispositivos_legais" required><?php echo $formularioParaEditar['dispositivos_legais']; ?></textarea>

            <label for="descricao_multa">Descrição do Valor da Multa:</label>
            <textarea name="descricao_multa" required><?php echo $formularioParaEditar['descricao_multa']; ?></textarea>

            <label for="cpf_autuado">CPF do Autuado ou Representante:</label>
            <input type="text" name="cpf_autuado" value="<?php echo $formularioParaEditar['cpf_autuado']; ?>" required>

            <label for="data_assinatura">Data da Assinatura:</label>
            <input type="date" name="data_assinatura" value="<?php echo $formularioParaEditar['data_assinatura']; ?>" required>

            <label for="cpf_testemunha_1">CPF da Testemunha 1:</label>
            <input type="text" name="cpf_testemunha_1" value="<?php echo $formularioParaEditar['cpf_testemunha_1']; ?>" required>

            <label for="cpf_testemunha_2">CPF da Testemunha 2:</label>
            <input type="text" name="cpf_testemunha_2" value="<?php echo $formularioParaEditar['cpf_testemunha_2']; ?>" required>

            <label for="nome_testemunha_1">Nome da Testemunha 1:</label>
            <input type="text" name="nome_testemunha_1" value="<?php echo $formularioParaEditar['nome_testemunha_1']; ?>" required>

            <label for="nome_testemunha_2">Nome da Testemunha 2:</label>
            <input type="text" name="nome_testemunha_2" value="<?php echo $formularioParaEditar['nome_testemunha_2']; ?>" required>
        </div>

        <div class="buttonContainer">
            <button type="submit">Atualizar</button>
            <a href="listar_formularios.php" class="btn-voltar">Cancelar</a>
        </div>
    </form>
</body>

</html>
