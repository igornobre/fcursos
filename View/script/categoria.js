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
                    var categoria     = $("#categoria").val();
                    var descricaoCate = $("#descricaoCate").val();
                    
                    if((categoria != "") && (descricaoCate != "")){
                        $.post("Controller/cadastroCategoria.php",
                        {
                          categoria: categoria,
                          descricaoCate: descricaoCate
                        },
                        function(data){
                          alert(data);
                          if(data == "Cadastro de Categoria já existe!"){
                          alert(data);
                          }
                          else{
                              $(".carregar").load("View/cadastroCategoria.php"); 
                          }
                          
                        });
                    }
                    else if((categoria == "") && (descricaoCate != "")){
                        alert("Campo categoria não preenchido!");
                        $("#categoria").css("border" ,"solid 1px red");
                    }
                    else if((categoria != "") && (descricaoCate == "")){
                        alert("Campo Descrição de Categoria não preenchido!");
                        $("#descricaoCate").css("border" ,"solid 1px red");
                    }
                    else{
                       alert("Campo categoria e Campo Descrição não preenchidos!");
                       $("#categoria").css("border" ,"solid 1px red");
                       $("#descricaoCate").css("border" ,"solid 1px red");
                    }
                });
                
                
                $(".alterar").click(function (){
                   var idName = $(this).attr("name");
                   var categoriaE     = $("#categoria"+idName).val();
                   var descricaoCateE = $("#descricaoCate"+idName).val();
                   
                   if((categoriaE != "") && (descricaoCateE != "")){
                        $.post("Controller/cadastroCategoriaEdit.php",
                        {
                          idNameE: idName,  
                          categoriaE: categoriaE,
                          descricaoCateE: descricaoCateE
                        },
                        function(data){
                          alert(data);
                          if(data == "Cadastro existe em outro registro!"){
                          alert(data);
                          }
                          else{
                              $(".carregar").load("View/cadastroCategoria.php"); 
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