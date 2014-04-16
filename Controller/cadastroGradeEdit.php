<?php
require_once '../Model/grade.class.php';
    $idNameE = $_POST['idNameE'];
    $gradeE  = $_POST['gradeE'];
    
    if( (!empty($gradeE)) ){
 
        $cadastra = new categoria();
        echo $cadastra->alterar($idNameE, $gradeE);
    }
    else{
        echo "Campos não preenchidos!";
    }

?>

