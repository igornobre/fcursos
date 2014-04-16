<?php

        
/**
 * Description of categoria
 *
 * @author igornobre
 */
class categoria {
    private $categoria;
    private $descricaoCate;
    
    public function cadastrar($categoria, $descricaoCate) {
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
        $consulta = "SELECT * FROM categoriaCurso where nomeCategoria = ?";
        $q = $pdo->prepare($consulta);
        $q->execute(array($categoria));
        $q->setFetchMode(PDO::FETCH_BOTH);
        while ($r = $q->fetch()){
        $idcategoriaCurso   = $r['idcategoriaCurso'];
        $nomeCategoria      = $r['nomeCategoria'];
        $descricaoCategoria = $r['descricaoCategoria'];
        $retorno = 1;        
        }
        
        if($retorno !== 1){
        
                $stmte = $pdo->prepare("INSERT INTO categoriaCurso (nomeCategoria, descricaoCategoria, "
                        . "data_cadastro, data_alteracao, hora_cadastro, hora_alteracao, id_cadastro, id_alteracao) "
                        . "VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmte->bindParam(1, $categoria , PDO::PARAM_STR);
                $stmte->bindParam(2, $descricaoCate , PDO::PARAM_STR);
                $stmte->bindParam(3, $data , PDO::PARAM_STR);
                $stmte->bindParam(4, $data , PDO::PARAM_STR);
                $stmte->bindParam(5, $hora , PDO::PARAM_STR);
                $stmte->bindParam(6, $hora , PDO::PARAM_STR);
                $stmte->bindParam(7, $alunos_idalunos , PDO::PARAM_STR);
                $stmte->bindParam(8, $alunos_idalunos , PDO::PARAM_STR);
                $stmte->execute();

                return "Cadastro de Categoria realizado com Sucesso!";
           
   
        }
        else{
            echo "Cadastro de Categoria já existe!";
        }
        
    }
    
    
    public function alterar($idName, $categoria, $descricaoCate) {
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
        $consulta = "SELECT * FROM categoriaCurso where idcategoriaCurso <> ? and nomeCategoria = ?";
        $q = $pdo->prepare($consulta);
        $q->execute(array($idName, $categoria));
        $q->setFetchMode(PDO::FETCH_BOTH);
        while ($r = $q->fetch()){
        $idcategoriaCurso   = $r['idcategoriaCurso'];
        $nomeCategoria      = $r['nomeCategoria'];
        $descricaoCategoria = $r['descricaoCategoria'];
        $retorno = 1;        
        }
        
        if($retorno !== 1){
            
            $stmt = $pdo->prepare('UPDATE categoriaCurso SET nomeCategoria = :nomeCategoria, descricaoCategoria = :descricaoCategoria, data_alteracao = :data_alteracao, hora_alteracao = :hora_alteracao, id_alteracao = :id_alteracao WHERE idcategoriaCurso = :idcategoriaCurso'); 
            $stmt->execute(array( ':idcategoriaCurso' => $idName, ':nomeCategoria' => $categoria, ':descricaoCategoria' => $descricaoCate, ':data_alteracao' => $data, ':hora_alteracao' => $hora, ':id_alteracao' => $alunos_idalunos)); 
            $stmt->rowCount();
            return "Atualizado com Sucesso!";

        }
        else{
            echo "Cadastro existe em outro registro!";
        }
        
        
    }
    
}
