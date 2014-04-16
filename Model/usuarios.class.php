<?php
//session_start(); // Inicia a sessão
/**
 * Description of usuarios
 *
 * @author igornobre
 */

//$us = new usuarios();
//$us->logar("igf", "1234");

class usuarios {
    
    private $user;
    private $pass;
    
    public function logar($user, $pass) {
    require_once '../Model/conexao.class.php';
    
        $usua = new conexao();        
        $pdo = new PDO($usua->host, $usua->user, $usua->pass);
        // define para que o PDO lance exceções caso ocorra erros
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // executa a instrução SQL
        $consulta = "SELECT * FROM usuarios where login_usuarios = ? and senhas_usuarios = ?";
        $q = $pdo->prepare($consulta);
        $q->execute(array($user, $pass));
        $q->setFetchMode(PDO::FETCH_BOTH);
        while ($r = $q->fetch()){
//            print_r($r);
            $id_usua =  $r['id_usuarios'];
            $usuario =  $r['login_usuarios'];   
            $alun_id =  $r['alunos_idalunos'];
            $nivel_a =  $r['nivel'];
            $statusa =  $r['status'];
            $retorno = 1;
        }
        
        if($retorno == 1){
            
            $_SESSION['id_usuarios'] = $id_usua;
            $_SESSION['login_usuarios'] = $usuario;
            $_SESSION['alunos_idalunos'] = $alun_id;
            $_SESSION['nivel'] = $nivel_a;
            $_SESSION['status'] = $statusa;
            
            echo "Login efetuado com sucesso!";
        }
        else{
            echo "E-mail o Senha errado!";
        }
        $pdo = null;
        
    }
    
    
}
?>