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


<div class="barra_descricao">Dados pessoais</div>
<div class="barra_pesquisa"><input placeholder="Pesquisa" type="text" id="txtBusca" /></div>

<div class="alunos">
    
    <div class="alunosTotal">
        <div class="alunosTitulo" name="1"><a>Igor Coutinho Ferreira Nobre</a></div>
        <div class="alunosConteudo" id="1">
            <p class="campo100">
                <label class="label">nome</label>
                <input type="text" />
            </p>
            <p class="campo50">
                <label class="label2">nome</label>
                <input type="text" />
            </p>
            <p class="campo50">
                <label class="label2">nome</label>
                <input type="text" />
            </p>
        </div>
    </div>
    
    <div class="alunosTotal">
        <div class="alunosTitulo" name="2"><a>Vania Coutinho</a></div>
        <div class="alunosConteudo" id="2">
            <label>igor</label>
            <input type="text" />
        </div>
    </div>
    
</div>