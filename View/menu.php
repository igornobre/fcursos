<?php
session_start(); // Inicia a sessão
$usuarioHome = $_SESSION['login_usuarios'];
$nivel = $_SESSION['nivel'];
?>

<?php
    if((!empty($usuarioHome))){
?>

<script>
    $(document).ready(function (){
        
    $(".iconIconesTodosH").click(function (){
        var name = $(this).attr("name");
        $(".carregar").load(name);
    });
        
});
</script>
<?php
if($nivel == 1){

?>
<div class="iconIconesTodosH" name="View/cadastroCurso.php">
    <div class="icoIconIconesTodosH"><img src="View/img/home/novoCurso.png" /></div>
    <div class="texIconIconesTodosH">CADASTRO DE CURSO</div>
</div>
<div class="iconIconesTodosH" name="View/cadastroGrade.php">
    <div class="icoIconIconesTodosH"><img src="View/img/home/grade.png" /></div>
    <div class="texIconIconesTodosH">CADASTRO DE GRADE</div>
</div>
<div class="iconIconesTodosH" name="View/cadastroCategoria.php">
    <div class="icoIconIconesTodosH"><img src="View/img/home/categoria.png" /></div>
    <div class="texIconIconesTodosH">CATEGORIA DE CURSO</div>
</div>
<div class="iconIconesTodosH" name="View/cadastroAula.php">
    <div class="icoIconIconesTodosH"><img src="View/img/home/aula.png" /></div>
    <div class="texIconIconesTodosH">CADASTRO DE AULA</div>
</div>
<div class="iconIconesTodosH" name="View/cadastroExercicio.php">
    <div class="icoIconIconesTodosH"><img src="View/img/home/exercicio.png" /></div>
    <div class="texIconIconesTodosH">CADASTRO DE EXERCÍCIOS</div>
</div>
<?php
}
?>

<div class="iconIconesTodosH" name="View/painel.php">
    <div class="icoIconIconesTodosH"><img src="View/img/home/aluno.png" /></div>
    <div class="texIconIconesTodosH">PAINEL DO ALUNO</div>
</div>

<div class="iconIconesTodosH" name="View/cursos.php">
    <div class="icoIconIconesTodosH"><img src="View/img/home/cursos.png" /></div>
    <div class="texIconIconesTodosH">MEUS CURSOS</div>
</div>

<div class="iconIconesTodosH" name="View/certificados.php">
    <div class="icoIconIconesTodosH"><img src="View/img/home/certificados.png" /></div>
    <div class="texIconIconesTodosH">CERTIFICADOS</div>
</div>

<div class="iconIconesTodosH" name="View/atendimento.php">
    <div class="icoIconIconesTodosH"><img src="View/img/home/atendimento.png" /></div>
    <div class="texIconIconesTodosH">ATENDIMENTO</div>
</div>

<div class="iconIconesTodosH" name="View/mensagens.php">
    <div class="icoIconIconesTodosH"><img src="View/img/home/mensagem.png" /></div>
    <div class="texIconIconesTodosH">MENSAGENS</div>
</div>

<div class="iconIconesTodosH" name="View/relatorios.php">
    <div class="icoIconIconesTodosH"><img src="View/img/home/relatorios.png" /></div>
    <div class="texIconIconesTodosH">RELATÓRIOS</div>
</div>

<div class="iconIconesTodosH" name="View/meusDados.php">
    <div class="icoIconIconesTodosH"><img src="View/img/home/meusDados.png" /></div>
    <div class="texIconIconesTodosH">MEUS DADOS</div>
</div>


<?php
    }
    else {
        echo "<script>alert('Você não está logado');</script>";
        header('Location: ../index.php');
        exit;
    }
?>
