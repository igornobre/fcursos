<?php
session_start(); // Inicia a sessão
$usuarioHome = $_SESSION['login_usuarios'];
$nivel = $_SESSION['nivel'];
$id_user = $_SESSION['alunos_idalunos'];
?>
<?php
    if((!empty($usuarioHome))){
?>

<?php
if($nivel == 1){

?>
<script src="View/script/grade.js"></script>


<div class="barra_descricao">Cadastro de Grade de Curso</div>
<div class="barra_pesquisa"><input placeholder="Pesquisa" type="text" id="txtBusca" /></div>

<div class="alunos">
    
    <div class="alunosTotal">
        <div class="alunosTitulo" name="0"><a>Nova Grade de Curso</a></div>
        <div class="alunosConteudo" id="0">
            <p class="campo100">
                <label class="label">Descriçao da Grade</label>
                <input type="text" name="grade" id="grade" />
            </p>
            <p class="campo100">
                <button class="cadastrar">Cadastrar</button>
            </p>
        </div>
    </div

    <?php
    require_once '../Model/conexaoSimples.php';
    
    //consulta sql
        $query = mysql_query("SELECT * FROM grade ORDER BY descricaoGrade") or die(mysql_error());

        //faz um looping e cria um array com os campos da consulta
        while($array = mysql_fetch_array($query))
        {
            $idgrade =  $array['idgrade'];
            $grade   =  $array['descricaoGrade'];   
            $retorno = 1;             
    ?>  
    
 <div class="alunos">  
     
    <div class="alunosTotal">
        <div class="alunosTitulo" name="<?php echo $idgrade; ?>"><a><?php echo $grade; ?></a></div>
        <div class="alunosConteudo" id="<?php echo $idgrade; ?>">
            <p class="campo100">
                <label class="label">Descriçao da Grade</label>
                <input type="text" name="grade" id="grade<?php echo $idgrade; ?>" value="<?php echo $grade; ?>" />
            </p>
            <p class="campo100">
                <button class="alterar" id="alterar<?php echo $idgrade; ?>" name="<?php echo $idgrade; ?>">Alterar</button>
            </p>
        </div>
    </div   

    <?php
        }
    ?>    
    
    
</div>
<?php
}
?>

<?php } ?>
