<?php


#estabelecemos conexão com o banco de dados
mysql_connect('127.0.0.1','root','') or die(mysql_error());
#seleciona o banco de dados
mysql_select_db('fcursos') or die(mysql_error());

?>