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
                
                $(".cadastrar").click(function (){
                    var grade = $("#grade").val();
                    
                    if((grade != "")){
                        $.post("Controller/cadastroGrade.php",
                        {
                          grade: grade
                        },
                        function(data){
                          alert(data);
                          if(data == "Cadastro de Grade já existe!"){
                          alert(data);
                          }
                          else{
                              $(".carregar").load("View/cadastroGrade.php"); 
                          }
                          
                        });
                    }
                    else{
                       alert("Campo descriçao de Grade nao preenchido!");
                       $("#grade").css("border" ,"solid 1px red");
                    }
                });
                
                
                $(".alterar").click(function (){
                    
                   var idNameE = $(this).attr("name");
                   var gradeE = $("#grade"+idNameE).val();
                   
                   if((idNameE != "") && (gradeE != "")){
                        $.post("Controller/cadastroGradeEdit.php",
                        {
                          idNameE: idNameE,  
                          gradeE: gradeE
                        },
                        function(data){
                          alert(data);
                          if(data == "Cadastro existe em outro registro!"){
                          alert(data);
                          }
                          else{
                              $(".carregar").load("View/cadastroGrade.php"); 
                          }
                          
                        });
                    }
                    else if((categoriaE == "") && (descricaoCateE != "")){
                        alert("Campo categoria não preenchido!");
                        $("#categoria"+idName).css("border" ,"solid 1px red");
                    }
                    else if((categoriaE != "") && (descricaoCateE == "")){
                        alert("Campo Descrição de Categoria não preenchido!");
                        $("#descricaoCate"+idName).css("border" ,"solid 1px red");
                    }
                    else{
                       alert("Campo categoria e Campo Descrição não preenchidos!");
                       $("#categoria"+idName).css("border" ,"solid 1px red");
                       $("#descricaoCate"+idName).css("border" ,"solid 1px red");
                    } 
                   
                });
	});