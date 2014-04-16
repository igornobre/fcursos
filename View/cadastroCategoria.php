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
<script src="View/script/categoria.js"></script>


<div class="barra_descricao">Cadastro de Categoria de Curso</div>
<div class="barra_pesquisa"><input placeholder="Pesquisa" type="text" id="txtBusca" /></div>

<div class="alunos">
    
    <div class="alunosTotal">
        <div class="alunosTitulo" name="0"><a>Nova Categoria de Curso</a></div>
        <div class="alunosConteudo" id="0">
            <p class="campo100">
                <label class="label">Categoria</label>
                <input type="text" name="categoria" id="categoria" />
            </p>
            <p class="campo50">
                <label class="label2">Descrição da Categoria</label>
                <input type="text" name="descricaoCate" id="descricaoCate" />
            </p>
            <p class="campo100">
                <button class="cadastrar">Cadastrar</button>
            </p>
        </div>
    </div>
     
    <?php
    require_once '../Model/conexaoSimples.php';
    
    //consulta sql
        $query = mysql_query("SELECT * FROM categoriaCurso ORDER BY nomeCategoria") or die(mysql_error());

        //faz um looping e cria um array com os campos da consulta
        while($array = mysql_fetch_array($query))
        {
            $idcategoriaCurso   =  $array['idcategoriaCurso'];
            $nomeCategoria      =  $array['nomeCategoria'];   
            $descricaoCategoria =  $array['descricaoCategoria'];
            $retorno = 1;
        
       
    ?>
    
    <div class="alunosTotal">
        <div class="alunosTitulo" name="<?php echo $idcategoriaCurso; ?>"><a><?php echo $nomeCategoria; ?></a></div>
        <div class="alunosConteudo" id="<?php echo $idcategoriaCurso; ?>">
            <p class="campo100">
                <label class="label">Categoria</label>
                <input type="text" name="categoria" id="categoria<?php echo $idcategoriaCurso; ?>" value="<?php echo $nomeCategoria; ?>" />
            </p>
            <p class="campo50">
                <label class="label2">Descrição da Categoria</label>
                <input type="text" name="descricaoCate" id="descricaoCate<?php echo $idcategoriaCurso; ?>" value="<?php echo $descricaoCategoria; ?>" />
            </p>
            <p class="campo100">
                <button class="alterar" id="alterar<?php echo $idcategoriaCurso; ?>" name="<?php echo $idcategoriaCurso; ?>">Alterar</button>
            </p>
        </div>
    </div>
    
    <?php
        }
    ?>    
    
    
</div>
<?php
}
?>

<?php } ?>
