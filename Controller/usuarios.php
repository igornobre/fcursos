<?php
session_start(); // Inicia a sessão

require_once '../Model/usuarios.class.php';

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    if((!empty($user)) && (!empty($pass))){
        $usua = new usuarios();
        echo $usua->logar($user, $pass);
    }
    else{
        echo "Campo de E-mail ou Senha não preenchido!";
    }

?>