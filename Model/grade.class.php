<?php

        
/**
 * Description of categoria
 *
 * @author igornobre
 */
class categoria {
    private $grade;
    
    public function cadastrar($grade) {
    require_once '../Model/conexao.class.php';
    session_start();
    $usuarioHome = $_SESSION['login_usuarios'];
    $nivel = $_SESSION['nivel'];
    $alunos_idalunos = $_SESSION['alunos_idalunos'];
  
        $data = date("d/m/Y");
        $hora = date("H:i");
    
        $usua = new conexao();        
        $pdo = new PDO($usua->host, $usua->user, $usua->pass);
        // define para que o PDO lance exceções caso ocorra erros
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // executa a instrução SQL
        $consulta = "SELECT * FROM grade where descricaoGrade = ?";
        $q = $pdo->prepare($consulta);
        $q->execute(array($grade));
        $q->setFetchMode(PDO::FETCH_BOTH);
        while ($r = $q->fetch()){
        $idgrade        = $r['idgrade'];
        $descricaoGrade = $r['descricaoGrade'];
        $retorno = 1;        
        }
        
        if($retorno != 1){
        
                $stmte = $pdo->prepare("INSERT INTO grade (descricaoGrade, data_cadastro, "
                        . "data_alteracao, hora_cadastro, hora_alteracao, id_cadastro, id_alteracao) "
                        . "VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmte->bindParam(1, $grade , PDO::PARAM_STR);
                $stmte->bindParam(2, $data , PDO::PARAM_STR);
                $stmte->bindParam(3, $data , PDO::PARAM_STR);
                $stmte->bindParam(4, $hora , PDO::PARAM_STR);
                $stmte->bindParam(5, $hora , PDO::PARAM_STR);
                $stmte->bindParam(6, $alunos_idalunos , PDO::PARAM_STR);
                $stmte->bindParam(7, $alunos_idalunos , PDO::PARAM_STR);
                $stmte->execute();

                return "Cadastro de Grade realizado com Sucesso!";
           
   
        }
        else{
            echo "Cadastro de Grade já existe!";
        }
        
    }
    
    
    public function alterar($idNameE, $gradeE) {
    require_once '../Model/conexao.class.php';
    session_start();
    $usuarioHome = $_SESSION['login_usuarios'];
    $nivel = $_SESSION['nivel'];
    $alunos_idalunos = $_SESSION['alunos_idalunos'];
  
        $data = date("d/m/Y");
        $hora = date("H:i");
    
        $usua = new conexao();        
        $pdo = new PDO($usua->host, $usua->user, $usua->pass);
        // define para que o PDO lance exceções caso ocorra erros
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // executa a instrução SQL
        $consulta = "SELECT * FROM grade where idgrade <> ? and descricaoGrade = ?";
        $q = $pdo->prepare($consulta);
        $q->execute(array($idNameE, $gradeE));
        $q->setFetchMode(PDO::FETCH_BOTH);
        while ($r = $q->fetch()){
        $idgrade   = $r['idgrade'];
        $descricaoGrade = $r['descricaoGrade'];
        $retorno = 1;        
        }
        
        if($retorno != 1){
            
            $stmt = $pdo->prepare('UPDATE grade SET descricaoGrade = :descricaoGrade, data_alteracao = :data_alteracao, hora_alteracao = :hora_alteracao, id_alteracao = :id_alteracao WHERE idgrade = :idgrade'); 
            $stmt->execute(array( ':idgrade' => $idNameE, ':descricaoGrade' => $gradeE, ':data_alteracao' => $data, ':hora_alteracao' => $hora, ':id_alteracao' => $alunos_idalunos)); 
            $stmt->rowCount();
            return "Atualizado com Sucesso!";

        }
        else{
            echo "Cadastro existe em outro registro!";
        }
        
        
    }
    
}
