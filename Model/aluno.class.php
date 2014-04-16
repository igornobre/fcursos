<?php

/**
 * Description of aluno
 *
 * @author igornobre
 */
class aluno {

    private $nome;
    private $nomeTratamento;
    private $cpf;
    private $email;
    private $senha;

    public function cadastrar($nome, $nomeTratamento, $cpf, $email, $senha) {
        require_once '../Model/conexao.class.php';
        
        $usua = new conexao();        
        $pdo = new PDO($usua->host, $usua->user, $usua->pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // executa a instrução SQL
        $consulta = "SELECT * FROM alunos where cpf_alunos = ? or email_alunos = ?";
        $q = $pdo->prepare($consulta);
        $q->execute(array($cpf, $email));
        $q->setFetchMode(PDO::FETCH_BOTH);
        while ($r = $q->fetch()){

            $cpf_alunos =  $r['cpf_alunos'];
            $email_alunos= $r['email_alunos'];
            
            if (($email_alunos == $email) || ($cpf_alunos == $cpf)) {
                $retorno = 1;
                return "E-mail: ".$email_alunos." ou CPF: ".$cpf_alunos." cadastrado em outra conta!";
            }
                      
        }
        
        if($retorno != 1){
           $data = date('d/m/Y'); 
           try{
                $stmte = $pdo->prepare("INSERT INTO alunos (nome_alunos, apelido_alunos, cpf_alunos, email_alunos, data_cadastro, data_alteracao) "
                        . "VALUES (?, ?, ?, ?, ?, ?)");
                $stmte->bindParam(1, $nome , PDO::PARAM_INT);
                $stmte->bindParam(2, $nomeTratamento , PDO::PARAM_STR);
                $stmte->bindParam(3, $cpf , PDO::PARAM_STR);
                $stmte->bindParam(4, $email , PDO::PARAM_STR);
                $stmte->bindParam(5, $data , PDO::PARAM_STR);
                $stmte->bindParam(6, $data , PDO::PARAM_STR);
                $stmte->execute();
                $idAluno = $pdo->lastInsertId();
                
                $nivel = 3;
                $status = 1;
                $pd = new PDO($usua->host, $usua->user, $usua->pass);
                $stmt = $pd->prepare("INSERT INTO `fcursos`.`usuarios` (`login_usuarios`, `senhas_usuarios`, `alunos_idalunos`, 
                    `data_cadastro`, `data_alteracao`, `nivel`, `status`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bindParam(1, $email , PDO::PARAM_INT);
                $stmt->bindParam(2, $senha , PDO::PARAM_STR);
                $stmt->bindParam(3, $idAluno , PDO::PARAM_STR);
                $stmt->bindParam(4, $data , PDO::PARAM_STR);
                $stmt->bindParam(5, $data , PDO::PARAM_STR);
                $stmt->bindParam(6, $nivel , PDO::PARAM_STR);
                $stmt->bindParam(7, $status , PDO::PARAM_STR);
                $stmt->execute();
                echo "Cadastro de Aluno realizado com sucesso!";
                
                
            }
            catch(PDOException $e){
               echo $e->getMessage();
            }


            
        }
        else {
            echo "Erro ao cadastrar pois E-mail ou CPF já está cadastrado!";
        }
        
        
        
    }
    
}

?>