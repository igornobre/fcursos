<?php

        
/**
 * Description of categoria
 *
 * @author igornobre
 */
class curso {
    
    
    public function cadastrar($curso, $descricao, $categoria, $grade) {
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
        $consulta = "SELECT * FROM curso where nome = ?";
        $q = $pdo->prepare($consulta);
        $q->execute(array($curso));
        $q->setFetchMode(PDO::FETCH_BOTH);
        while ($r = $q->fetch()){
        $idcurso = $r['idcurso'];
        $descricaoC = $r['descricao'];
        $retorno = 1;        
        }
        
        if($retorno != 1){
        
                $stmte = $pdo->prepare("INSERT INTO curso (nome, descricao, data_cadastro, "
                        . "hora_cadastro, id_cadastro, categoriaCurso_idcategoriaCurso, grade_idgrade) "
                        . "VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmte->bindParam(1, $curso , PDO::PARAM_STR);
                $stmte->bindParam(2, $descricao , PDO::PARAM_STR);
                $stmte->bindParam(3, $data , PDO::PARAM_STR);
                $stmte->bindParam(4, $hora , PDO::PARAM_STR);
                $stmte->bindParam(5, $alunos_idalunos , PDO::PARAM_STR);
                $stmte->bindParam(6, $categoria , PDO::PARAM_STR);
                $stmte->bindParam(7, $grade , PDO::PARAM_STR);
                $stmte->execute();
                mkdir('../cursos/'.$curso, 0777);

                echo "Cadastrado com Sucesso!";
           
   
        }
        else{
            echo "Cadastro de Curso já existe!";
        }
        
    }
    
    
    public function alterar($idCurso, $curso, $descricao, $categoria, $grade) {
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
        $consulta = "SELECT * FROM curso where idcurso <> ? and nome = ?";
        $q = $pdo->prepare($consulta);
        $q->execute(array($idCurso, $curso));
        $q->setFetchMode(PDO::FETCH_BOTH);
        while ($r = $q->fetch()){
        $idcurso   = $r['idcurso'];
        $nome = $r['nome'];
        $retorno = 1;        
        }
        
        $consulta2 = "SELECT * FROM curso where idcurso = ?";
        $q2 = $pdo->prepare($consulta2);
        $q2->execute(array($idCurso));
        $q->setFetchMode(PDO::FETCH_BOTH);
        while ($r2 = $q2->fetch()){
        $idcurso2   = $r2['idcurso'];
        $nome2 = $r2['nome'];
        $diretorio = '../cursos/'.$nome2;
               
        }
        
        if($retorno != 1){
            
            $stmt = $pdo->prepare('UPDATE curso SET nome = :nome, descricao = :descricao, data_alteracao = :data_alteracao, '
                    . 'hora_alteracao = :hora_alteracao, id_alteracao = :id_alteracao, '
                    . 'categoriaCurso_idcategoriaCurso = :categoriaCurso_idcategoriaCurso, '
                    . 'grade_idgrade = :grade_idgrade WHERE idcurso = :idcurso'); 
            $stmt->execute(array( ':idcurso' => $idCurso, ':nome' => $curso,':descricao' => $descricao, ':data_alteracao' => $data, 
                ':hora_alteracao' => $hora, ':id_alteracao' => $alunos_idalunos,
                ':categoriaCurso_idcategoriaCurso' => $categoria, ':grade_idgrade' => $grade)); 
            $stmt->rowCount();
            rename($diretorio, '../cursos/'.$curso);
            return "Atualizado com Sucesso!";

        }
        else{
            echo "Cadastro existe em outro registro!";
        }
        
        
    }
    
}
