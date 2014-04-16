<?php
session_start(); // Inicia a sessão
$usuarioHome = $_SESSION['login_usuarios'];
$nivel = $_SESSION['nivel'];
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    if((!empty($usuarioHome))){
?>
<html>
    <head>
        <title>fcursos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="View/style/style2.css" />
        <link rel="stylesheet" type="text/css" href="View/style/style3.css" />
        <script src="View/script/jquery-1.9.1.min.js"></script>
        <script src="View/script/responsivo.js"></script>
        <script src="View/script/script2.js"></script>
    </head>
    <body>
        
        <div class="topoHome">
            <div class="logoHomeFcursos"></div>
        </div>
        
        <div class="carregar"></div>
        
        
        <?php
    }
    else {
        echo "<script>alert('Você não está logado');</script>";
        header('Location: index.php');
        exit;
    }
?>
        
    </body>
</html>