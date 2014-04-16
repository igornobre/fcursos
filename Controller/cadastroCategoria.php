<?php
require_once '../Model/categoria.class.php';
    $categoria = $_POST['categoria'];
    $descricaoCate = $_POST['descricaoCate'];
    
    if( (!empty($categoria)) && (!empty($descricaoCate)) ){
    
        $cadastra = new categoria();
        echo $cadastra->cadastrar($categoria, $descricaoCate);
    }
    else{
        echo "Campos não preenchidos!";
    }

?>

