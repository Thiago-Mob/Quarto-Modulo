<?php

require_once "../conexao.php";

$cnpj = $_GET['cnpj'];
$tipo = $_GET['tipo'];
$abertura = date("Y-m-d", strtotime($_GET['abertura']));
$nome = $_GET['nome'];
$fantasia = $_GET['fantasia'];
$cep = $_GET['cep'];
$rua = $_GET['rua'];
$complemento = $_GET['complemento'];
$bairro = $_GET['bairro'];
$cidade = $_GET['cidade'];
$estado = $_GET['estado'];
    
    $query="";
    
    // SÓ A STRING DO COMANDO INSERT
    // $query = "INSERT INTO tb_pessoa_fisica VALUES (NULL, '$nome', '$sobrenome', '$nascimento', '$telefone', '$cep', '$rua', '$complemento', '$bairro', '$cidade', '$estado');";

    $query = "INSERT INTO tb_juridica VALUES (NULL, '$cnpj', '$tipo', '$abertura', '$nome', '$fantasia', '$cep', '$rua', '$complemento', '$bairro', '$cidade', '$estado');";

    $word="inseridos";

    // EXECUÇÃO DA QUERY CONSTRUÍDA ANTERIORMENTE
    $resultado_inserir = $con->query($query);

    if ($resultado_inserir) {
        echo "<div class='alert alert-success' role='alert'>";
        echo "Dados $word com sucesso!";
        echo "</div>";

        // DESTRÓI O CONTEÚDO DOS INPUTS
        unset($nome);
        unset($sobrenome);
        unset($nascimento);
        unset($telefone);
        unset($cep);
        unset($rua);
        unset($complemento);
        unset($bairro);
        unset($cidade);
        unset($estado);


    } else {
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Erro na tentativa de enviar dados ao banco: "; //. $con->connect_error;
        echo "</div>";
    }
    // TERMINA A CONEXÃO
    $con->close();
    Header('Location: ../../tipos/fisica.php');
    
// }


?>