<?php
session_start(); // Inicia a sessão

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>fcursos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="View/style/style1.css" />
        <link rel="stylesheet" type="text/css" href="View/style/telaPrincipal.css" />
        <script src="View/script/jquery-1.9.1.min.js"></script>
        <script src="View/script/jquery.maskedinput.js"></script>
        <script src="View/script/responsivo.js"></script>
        <script src="View/script/script1.js"></script>
    </head>
    <body>
        
        <div class="topo">
            <div class="logoFcursos"></div>
            <div class="menuTopo">
                <a href="#"><div class="subMenuTopo login">Login</div></a>
                <a href="#"><div class="subMenuTopo subTopo">Contato</div></a>
                <a href="#"><div class="subMenuTopo subTopo" name="View/cadastre.php">Cadastre</div></a>
            </div>
            <div class="menuLogin">
                <div class="menuLogin2">
                    <label>E-mail<a>*Campo Obrigatório!</a></label>
                    <input placeholder="E-mail" type="email" name="email" id="emailLogin" />
                    <label>Senha<a>*Campo Obrigatório mínimo 8 caracteres!</a></label>
                    <input placeholder="Senha" type="password" name="senha" id="senhaLogin" />
                    <label class="esque"><a>Esqueceu a senha?</a></label>
                    <button>Acessar</button>
                </div>
            </div>
        </div>
        
        <div class="banner">
            
            <div class="textoBanner">                

                Crie, aprenda e simule no Fcursos.<br />

                Cursos online de tecnologia como você
                nunca viu antes.

            </div>
            <div class="botaoBanner">
                <div class="textoBotaoBanner">Acesso Grátis</div>
                <button class="buttonBotaoBanner">Assinar</button>
            </div>
            
        </div>
        
        <div class="carregar"></div>
        
        <div class="faixaMenuPrincipal">
            <div class="subFaixaMenuPrincipal">Todos</div>
            <div class="subFaixaMenuPrincipal">Java</div>
            <div class="subFaixaMenuPrincipal">ADVPL</div>
            <div class="subFaixaMenuPrincipal">PHP</div>
            <div class="subFaixaMenuPrincipal">Front-End</div>
            <div class="subFaixaMenuPrincipal">Mobile</div>
            <div class="subFaixaMenuPrincipal">.Net</div>
            <div class="subFaixaMenuPrincipal">Office</div>
            <div class="subFaixaMenuPrincipal">Cad</div>
            <div class="subFaixaMenuPrincipal">Outros</div>
        </div>
        
        <div class="iconesTodos">
            
            <div class="iconIconesTodos">
                <div class="texIconIconesTodos">Design Pattern para bons programadores</div>
                <div class="icoIconIconesTodos"><img src="View/img/icones/android.png" /></div>
            </div>
            
        </div>
        
        <div class="rodape">
            <div class="textoRodape">Aprenda na Fcursos!</div>
            
            <div class="iconIconesrodape">
                <div class="texIconIconesrodape">Muita prática nosso sistema simula um ambiente real.</div>
                <div class="icoIconIconesrodape"><img src="View/img/icones/pratica.png" /></div>
            </div>
            <div class="iconIconesrodape">
                <div class="texIconIconesrodape">Além da qualidade de ensino você sai com certificado.</div>
                <div class="icoIconIconesrodape"><img src="View/img/icones/certificado.png" /></div>
            </div>
            <div class="iconIconesrodape">
                <div class="texIconIconesrodape">Suas dúvidas são respondidas rapidamente.</div>
                <div class="icoIconIconesrodape"><img src="View/img/icones/duvidas.png" /></div>
            </div>
            <div class="iconIconesrodape">
                <div class="texIconIconesrodape">Ensino seguro pois somos parceiros da ABED.</div>
                <div class="icoIconIconesrodape"><img src="View/img/icones/abed2.png" /></div>
            </div>
            
        </div>
        
    </body>
</html>


