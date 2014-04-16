<?php

require_once '../Model/categoria.class.php';

    $idName = $_POST['idNameE'];
    $categoria = $_POST['categoriaE'];
    $descricaoCate = $_POST['descricaoCateE'];
    
    if( (!empty($idName)) && (!empty($categoria)) && (!empty($descricaoCate)) ){
    
        $cadastra = new categoria();
        echo $cadastra->alterar($idName, $categoria, $descricaoCate);
    }
    else{
        echo "Campos não preenchidos!";
    }

?>

