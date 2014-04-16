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


<div class="barra_descricao">Cadastro de Exercício</div>
<div class="barra_pesquisa"><input placeholder="Pesquisa" type="text" id="txtBusca" /></div>

<div class="alunos">
    
    <div class="alunosTotal">
        <div class="alunosTitulo" name="1"><a>Novo Exercício</a></div>
        <div class="alunosConteudo" id="1">
            <p class="campo100">
                <label class="label">Pergunta</label>
                <input type="text" />
            </p>
            <p class="campo50">
                <label class="label">Alternativa A</label>
                <input type="text" />
            </p>
            <p class="campo50">
                <label class="label">Alternativa B</label>
                <input type="text" />
            </p>
            <p class="campo50">
                <label class="label">Alternativa C</label>
                <input type="text" />
            </p>
            <p class="campo50">
                <label class="label">Alternativa D</label>
                <input type="text" />
            </p>
            <p class="campo50">
                <label class="label">Resposta</label>
                <select>
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">C</option>
                    <option value="4">D</option>
                </select>
            </p>
        </div>
    </div>
    
    
    
</div>
<?php
}
?>

<?php } ?>
