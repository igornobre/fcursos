<?php
session_start(); // Inicia a sessão
$usuarioHome = $_SESSION['login_usuarios'];
$nivel = $_SESSION['nivel'];
?>
<?php
    if((!empty($usuarioHome))){
?>

<?php
if($nivel == 1){

?>
<script type="text/javascript">
	$(function() {
		$("#txtBusca").keyup(function() {
			var texto = $(this).val();
			$(".alunosTotal .alunosTitulo").parent().css("display", "block");
			$(".alunosTotal .alunosTitulo").each(function() {
				if($(this).text().toUpperCase().indexOf(texto.toUpperCase()) < 0)
                                $(this).parent().css("display", "none");
			});
		});
                
                $(".alunosTitulo").click(function (){
                    var name = $(this).attr("name");
                    $("#"+name).toggle();
                });
	});
</script>


<div class="barra_descricao">Cadastro de Aula</div>
<div class="barra_pesquisa"><input placeholder="Pesquisa" type="text" id="txtBusca" /></div>

<div class="alunos">
    
    <div class="alunosTotal">
        <div class="alunosTitulo" name="1"><a>Nova Aula</a></div>
        <div class="alunosConteudo" id="1">
            <p class="campo100">
                <label class="label">Descrição da Aula</label>
                <input type="text" />
            </p>
            <p class="campo50">
                <label class="label">Endereço da Interatividade</label>
                <input type="file" />
            </p>
            <p class="campo50">
                <label class="label">Endereço do Video</label>
                <input type="file" />
            </p>
            <p class="campo50">
                <label class="label">Endereço da Apostila</label>
                <input type="file" />
            </p>
            <p class="campo50">
                <label class="label">Grade do Curso</label>
                <select>
                    <option value="0">Selecione uma Grade</option>
                </select>
            </p>
            <p class="campo100">
                <button>Cadastrar</button>
            </p>
        </div>
    </div>
    
    
    
</div>
<?php
}
?>

<?php } ?>
