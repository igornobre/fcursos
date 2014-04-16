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
        
        $(document).ready(function (){
            $("#cadastrar").click(function (){
                var curso = $("#curso").val();
                var descricao = $("#descricaoCurso").val();
                var categoria = $("#categoria").val();
                var grade = $("#grade").val();
                
                if((curso != "") && (descricao != "") && (categoria != 0) && (grade != 0)){
                    $.post("Controller/curso.php",
                    {
                      curso: curso,
                      descricao: descricao,
                      categoria: categoria,
                      grade: grade
                    },
                    function(data){
                      if(data == "Cadastrado com Sucesso!"){
                          
                          $(".carregar").load("View/cadastroCurso.php");
                      }
                      else{
                          $(".carregar").load("View/cadastroCurso.php");
                      }
                    });
                }
                if(curso == ""){
                    alert("Digite o nome do Curso!");
                    $("#curso").css("border", "1px solid red");
                }
                if(descricao == ""){
                    alert("Digite a descrição do curso!");
                    $("#descricaoCurso").css("border", "1px solid red");
                }
                if(categoria == 0){
                    alert("Selecione a Categoria!");
                    $("#categoria").css("border", "1px solid red");
                }
                if(grade == 0){
                    alert("Selecione a grade!");
                    $("#grade").css("border", "1px solid red");
                }
            });
            
            $(".atualizar").click(function (){
                var idName = $(this).attr("name");
                var cursoA = $("#curso"+idName).val();
                var descricaoA = $("#descricaoCurso"+idName).val();
                var categoriaA = $("#categoria"+idName).val();
                var gradeA = $("#grade"+idName).val();
                
                if((cursoA != "") && (descricaoA != "") && (categoriaA != 0) && (gradeA != 0)){
                    $.post("Controller/cursoEdit.php",
                    {
                      idCurso: idName,
                      cursoA: cursoA,
                      descricaoA: descricaoA,
                      categoriaA: categoriaA,
                      gradeA: gradeA
                    },
                    function(data){
                      if(data == "Atualizado com Sucesso!"){
                          
                          $(".carregar").load("View/cadastroCurso.php");
                      }
                      else{
                          $(".carregar").load("View/cadastroCurso.php");
                      }
                    });
                }
                if(cursoA == ""){
                    alert("Digite o nome do Curso!");
                    $("#curso"+idName).css("border", "1px solid red");
                }
                if(descricaoA == ""){
                    alert("Digite a descrição do curso!");
                    $("#descricaoCurso"+idName).css("border", "1px solid red");
                }
                if(categoriaA == 0){
                    alert("Selecione a Categoria!");
                    $("#categoria"+idName).css("border", "1px solid red");
                }
                if(gradeA == 0){
                    alert("Selecione a grade!");
                    $("#grade"+idName).css("border", "1px solid red");
                }
            });
            
        });
</script>


<div class="barra_descricao">Cadastro de Curso</div>
<div class="barra_pesquisa"><input placeholder="Pesquisa" type="text" id="txtBusca" /></div>

<div class="alunos">
    
    <div class="alunosTotal">
        <div class="alunosTitulo" name="0"><a>Novo Curso</a></div>
        <div class="alunosConteudo" id="0">
            <p class="campo100">
                <label class="label">Curso</label>
                <input id="curso" type="text" />
            </p>
            <p class="campo50">
                <label class="label2">Descrição do Curso</label>
                <input id="descricaoCurso" type="text" />
            </p>
            <p class="campo50">
                <label class="label">Categoria de Curso</label>
                <select id="categoria">
                    <option value="0">Categoria de Curso</option>
                    <?php
                    require_once '../Model/conexaoSimples.php';

                    //consulta sql
                        $query1 = mysql_query("SELECT * FROM categoriaCurso ORDER BY nomeCategoria") or die(mysql_error());

                        //faz um looping e cria um array com os campos da consulta
                        while($array1 = mysql_fetch_array($query1))
                        {
                            $idcategoriaCurso   =  $array1['idcategoriaCurso'];
                            $nomeCategoria      =  $array1['nomeCategoria']; 
                            $retorno1 = 1; 
                            echo "<option value='$idcategoriaCurso'>$nomeCategoria</option>";
                        }    
                    ?>
                </select>
            </p>
            <p class="campo50">
                <label class="label">Grade de Curso</label>
                <select id="grade">
                    <option value="0">Grade de Curso</option>
                    <?php
                    require_once '../Model/conexaoSimples.php';

                    //consulta sql
                        $query1 = mysql_query("SELECT * FROM grade ORDER BY descricaoGrade") or die(mysql_error());

                        //faz um looping e cria um array com os campos da consulta
                        while($array1 = mysql_fetch_array($query1))
                        {
                            $idgrade        =  $array1['idgrade'];
                            $descricaoGrade =  $array1['descricaoGrade']; 
                            $retorno1 = 1; 
                            echo "<option value='$idgrade'>$descricaoGrade</option>";
                        }    
                    ?>
                </select>
            </p>
            <p class="campo100">
                <button id="cadastrar">Cadastrar</button>
            </p>
        </div>
    </div> 
   
</div>


<?php
    require_once '../Model/conexaoSimples.php';

    //consulta sql
    $query2 = mysql_query("SELECT * FROM curso ORDER BY nome") or die(mysql_error());

    //faz um looping e cria um array com os campos da consulta
     while($array2 = mysql_fetch_array($query2))
    {
    $idcurso = $array2['idcurso'];
    $nome  =  $array2['nome'];
    $descricao =  $array2['descricao'];
    $categoriaCurso_idcategoriaCurso =  $array2['categoriaCurso_idcategoriaCurso'];
    $grade_idgrade =  $array2['grade_idgrade'];
    $retorno2 = 1; 
       
?>

<div class="alunos">
    
    <div class="alunosTotal">
        <div class="alunosTitulo" name="<?php echo $idcurso; ?>"><a><?php echo $nome; ?></a></div>
        <div class="alunosConteudo" id="<?php echo $idcurso; ?>">
            <p class="campo100">
                <label class="label">Curso</label>
                <input id="curso<?php echo $idcurso; ?>" type="text" value="<?php echo $nome; ?>" />
            </p>
            <p class="campo50">
                <label class="label2">Descrição do Curso</label>
                <input id="descricaoCurso<?php echo $idcurso; ?>" type="text" value="<?php echo $descricao; ?>" />
            </p>
            <p class="campo50">
                <label class="label">Categoria de Curso</label>
                <select id="categoria<?php echo $idcurso; ?>">
                    <?php
                    require_once '../Model/conexaoSimples.php';

                    //consulta sql
                        $queryca = mysql_query("SELECT * FROM categoriaCurso where idcategoriaCurso = '$categoriaCurso_idcategoriaCurso' ORDER BY nomeCategoria") or die(mysql_error());

                        //faz um looping e cria um array com os campos da consulta
                        while($arrayca = mysql_fetch_array($queryca))
                        {
                            $idcategoriaCursoca   =  $arrayca['idcategoriaCurso'];
                            $nomeCategoriaca      =  $arrayca['nomeCategoria']; 
                            $retornoca = 1; 
                            echo "<option value='$idcategoriaCursoca'>$nomeCategoriaca</option>";
                        }  
                        
                    //consulta sql
                        $queryca2 = mysql_query("SELECT * FROM categoriaCurso where idcategoriaCurso <> '$categoriaCurso_idcategoriaCurso' ORDER BY nomeCategoria") or die(mysql_error());

                        //faz um looping e cria um array com os campos da consulta
                        while($arrayca2 = mysql_fetch_array($queryca2))
                        {
                            $idcategoriaCursoca2   =  $arrayca2['idcategoriaCurso'];
                            $nomeCategoriaca2      =  $arrayca2['nomeCategoria']; 
                            $retornoca2 = 1; 
                            echo "<option value='$idcategoriaCursoca2'>$nomeCategoriaca2</option>";
                        }      
                    ?>
                </select>
            </p>
            <p class="campo50">
                <label class="label">Grade de Curso</label>
                <select id="grade<?php echo $idcurso; ?>">
                    <?php
                    require_once '../Model/conexaoSimples.php';

                    //consulta sql
                        $query1 = mysql_query("SELECT * FROM grade ORDER BY descricaoGrade") or die(mysql_error());

                        //faz um looping e cria um array com os campos da consulta
                        while($array1 = mysql_fetch_array($query1))
                        {
                            $idgrade        =  $array1['idgrade'];
                            $descricaoGrade =  $array1['descricaoGrade']; 
                            $retorno1 = 1; 
                            echo "<option value='$idgrade'>$descricaoGrade</option>";
                        }    
                    ?>
                </select>
            </p>
            <p class="campo100">
                <button class="atualizar" name="<?php echo $idcurso; ?>">Atualizar</button>
            </p>
        </div>
    </div> 
   
</div>

<?php
}
}
?>

<?php } ?>
