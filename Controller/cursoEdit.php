<?php
session_start(); // Inicia a sessão

require_once '../Model/curso.class.php';

    $idCurso = $_POST['idCurso'];
    $curso = $_POST['cursoA'];
    $descricao = $_POST['descricaoA'];
    $categoria = $_POST['categoriaA'];
    $grade = $_POST['gradeA'];
    
    if((!empty($idCurso)) && (!empty($curso)) && (!empty($descricao))&&(!empty($categoria)) && (!empty($grade))){
        $cadCurso = new curso();
        $cadCurso->alterar($idCurso, $curso, $descricao, $categoria, $grade);
        
    }
    else{
        echo "Campos não preenchidos!";
    }

?>