<?php
require_once '../Model/grade.class.php';
    $grade = $_POST['grade'];
    
    if( (!empty($grade)) ){
 
        $cadastra = new categoria();
        echo $cadastra->cadastrar($grade);
    }
    else{
        echo "Campos não preenchidos!";
    }

?>

