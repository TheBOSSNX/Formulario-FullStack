<?php
include "config.php";

function obterDadosFormulario($post)
{
    $dadosFormulario = array(
        "nome" => isset($post["nome"]) ? $post["nome"] : "",
        "data" => isset($post["data"]) ? $post["data"] : "",
        "cpf_cnpj" => isset($post["cpf_cnpj"]) ? $post["cpf_cnpj"] : "",
        "endereco" => isset($post["endereco"]) ? $post["endereco"] : "",
        "municipio" => isset($post["municipio"]) ? $post["municipio"] : "",
        "uf" => isset($post["uf"]) ? $post["uf"] : "",
        "area_empreendimento" => isset($post["area_empreendimento"]) ? $post["area_empreendimento"] : "",
        "horario" => isset($post["horario"]) ? $post["horario"] : "",
        "latitude" => isset($post["latitude"]) ? $post["latitude"] : "",
        "longitude" => isset($post["longitude"]) ? $post["longitude"] : "",
        "cep" => isset($post["cep"]) ? $post["cep"] : "",
        "uf_2" => isset($post["uf_2"]) ? $post["uf_2"] : "",
        "descricao_ocorrencia" => isset($post["descricao_ocorrencia"]) ? $post["descricao_ocorrencia"] : "",
        "dispositivos_legais" => isset($post["dispositivos_legais"]) ? $post["dispositivos_legais"] : "",
        "descricao_multa" => isset($post["descricao_multa"]) ? $post["descricao_multa"] : "",
        "cpf_autuado" => isset($post["cpf_autuado"]) ? $post["cpf_autuado"] : "",
        "data_assinatura" => isset($post["data_assinatura"]) ? $post["data_assinatura"] : "",
        "cpf_testemunha_1" => isset($post["cpf_testemunha_1"]) ? $post["cpf_testemunha_1"] : "",
        "cpf_testemunha_2" => isset($post["cpf_testemunha_2"]) ? $post["cpf_testemunha_2"] : "",
        "nome_testemunha_1" => isset($post["nome_testemunha_1"]) ? $post["nome_testemunha_1"] : "",
        "nome_testemunha_2" => isset($post["nome_testemunha_2"]) ? $post["nome_testemunha_2"] : ""
    );

    return $dadosFormulario;
}

function adicionarFormulario($dadosFormulario)
{
    global $pdo;

    $stmt = $pdo->prepare("INSERT INTO formularios (nome, data, cpf_cnpj, endereco, municipio, uf, area_empreendimento, horario, latitude, longitude, cep, uf_2, descricao_ocorrencia, dispositivos_legais, descricao_multa, cpf_autuado, data_assinatura, cpf_testemunha_1, cpf_testemunha_2, nome_testemunha_1, nome_testemunha_2) VALUES (:nome, :data, :cpf_cnpj, :endereco, :municipio, :uf, :area_empreendimento, :horario, :latitude, :longitude, :cep, :uf_2, :descricao_ocorrencia, :dispositivos_legais, :descricao_multa, :cpf_autuado, :data_assinatura, :cpf_testemunha_1, :cpf_testemunha_2, :nome_testemunha_1, :nome_testemunha_2)");

    $stmt->bindParam(':nome', $dadosFormulario["nome"]);
    $stmt->bindParam(':data', $dadosFormulario["data"]);
    $stmt->bindParam(':cpf_cnpj', $dadosFormulario["cpf_cnpj"]);
    $stmt->bindParam(':endereco', $dadosFormulario["endereco"]);
    $stmt->bindParam(':municipio', $dadosFormulario["municipio"]);
    $stmt->bindParam(':uf', $dadosFormulario["uf"]);
    $stmt->bindParam(':area_empreendimento', $dadosFormulario["area_empreendimento"]);
    $stmt->bindParam(':horario', $dadosFormulario["horario"]);
    $stmt->bindParam(':latitude', $dadosFormulario["latitude"]);
    $stmt->bindParam(':longitude', $dadosFormulario["longitude"]);
    $stmt->bindParam(':cep', $dadosFormulario["cep"]);
    $stmt->bindParam(':uf_2', $dadosFormulario["uf_2"]);
    $stmt->bindParam(':descricao_ocorrencia', $dadosFormulario["descricao_ocorrencia"]);
    $stmt->bindParam(':dispositivos_legais', $dadosFormulario["dispositivos_legais"]);
    $stmt->bindParam(':descricao_multa', $dadosFormulario["descricao_multa"]);
    $stmt->bindParam(':cpf_autuado', $dadosFormulario["cpf_autuado"]);
    $stmt->bindParam(':data_assinatura', $dadosFormulario["data_assinatura"]);
    $stmt->bindParam(':cpf_testemunha_1', $dadosFormulario["cpf_testemunha_1"]);
    $stmt->bindParam(':cpf_testemunha_2', $dadosFormulario["cpf_testemunha_2"]);
    $stmt->bindParam(':nome_testemunha_1', $dadosFormulario["nome_testemunha_1"]);
    $stmt->bindParam(':nome_testemunha_2', $dadosFormulario["nome_testemunha_2"]);

    $stmt->execute();
}




function obterFormularios()
{
    global $pdo;

    $stmt = $pdo->query("SELECT * FROM formularios");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obterFormularioPorId($id)
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM formularios WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function atualizarFormulario($dadosFormulario, $id)
{
    global $pdo;

    $stmt = $pdo->prepare("UPDATE formularios SET nome = ?, data = ?, cpf_cnpj = ?, endereco = ?, municipio = ?, uf = ?, area_empreendimento = ?, horario = ?, latitude = ?, longitude = ?, cep = ?, uf_2 = ?, descricao_ocorrencia = ?, dispositivos_legais = ?, descricao_multa = ?, cpf_autuado = ?, data_assinatura = ?, cpf_testemunha_1 = ?, cpf_testemunha_2 = ?, nome_testemunha_1 = ?, nome_testemunha_2 = ? WHERE id = ?");

    $stmt->execute([
        $dadosFormulario["nome"],
        $dadosFormulario["data"],
        $dadosFormulario["cpf_cnpj"],
        $dadosFormulario["endereco"],
        $dadosFormulario["municipio"],
        $dadosFormulario["uf"],
        $dadosFormulario["area_empreendimento"],
        $dadosFormulario["horario"],
        $dadosFormulario["latitude"],
        $dadosFormulario["longitude"],
        $dadosFormulario["cep"],
        $dadosFormulario["uf_2"],
        $dadosFormulario["descricao_ocorrencia"],
        $dadosFormulario["dispositivos_legais"],
        $dadosFormulario["descricao_multa"],
        $dadosFormulario["cpf_autuado"],
        $dadosFormulario["data_assinatura"],
        $dadosFormulario["cpf_testemunha_1"],
        $dadosFormulario["cpf_testemunha_2"],
        $dadosFormulario["nome_testemunha_1"],
        $dadosFormulario["nome_testemunha_2"],
        $id
    ]);
}

function excluirFormulario($id)
{
    global $pdo;

    $stmt = $pdo->prepare("DELETE FROM formularios WHERE id = ?");
    $stmt->execute([$id]);
}

