<script>

    $(document).ready(function (){
        $("#cpf").mask("999.999.999-99");
        $(".botaoCadastrar").click(function (){
            var nome = $("#nome").val();
            var nomeTratamento = $("#nomeTratamento").val();
            var cpf = $("#cpf").val();
            var email = $("#email").val();
            var senha = $("#senha").val();
            var repitaSenha = $("#repitaSenha").val();
            
            if(nome.length < 3){
                alert("Digite seu nome!")
                $("#nome").css("border", "solid 2px red");
            }
            if(nomeTratamento.length < 3){
                alert("Digite seu Sobrenome!");
                $("#nomeTratamento").css("border", "solid 2px red");
            }
            if(cpf.length < 14){
                alert("Digite seu CPF!");
                $("#cpf").css("border", "solid 2px red");
            }
            if(email.length < 3){
                alert("Digite seu E-mail!");
                $("#email").css("border", "solid 2px red");
            }
            if(senha.length < 8){
                alert("Sua senha deve ter no mínimo 8 caracteres!");
                $("#senha").css("border", "solid 2px red");
            }
            if(repitaSenha.length < 8){
                alert("Seu repita senha deve ter no mínimo 8 caracteres!");
                $("#repitaSenha").css("border", "solid 2px red");
            }
            
            if((nome.length > 2) && (nomeTratamento.length > 2) && (cpf.length > 13) && (email.length > 2) && (senha.length > 7) && (repitaSenha.length > 7)){
                
                $.post("Controller/alunos.php",
                {
                  nome: nome,
                  nomeTratamento: nomeTratamento,
                  cpf: cpf,
                  email: email,
                  senha: senha
                },
                function(data){
                  alert(data);
                  if(data == "Cadastro de Aluno realizado com sucesso!"){
                      window.location.href = 'index.php';
                  }
                });
                
            }
            
        });
    });

</script>

<div class="menuCadastro">
    <div class="tituloCadastro">Cadastre-se e comece seu curso agora mesmo!</div>
    
    <div class="camposGrandes">
        <label>Nome <a>*Campo Obrigatório</a></label>
        <input type="text" placeholder="Nome" name="nome" id="nome" class="inputGrade" />
    </div>
    <div class="camposMedio">
        <label>Nome de Tratamento <a>*Campo Obrigatório</a></label>
        <input type="text" placeholder="Nome de tratamento" name="nomeTratamento" id="nomeTratamento" class="inputMedio" />
    </div>
    <div class="camposMedio">
        <label>CPF <a>*Campo Obrigatório</a></label>
        <input type="text" placeholder="CPF" name="cpf" id="cpf" class="inputMedio" />
    </div>
    <div class="camposGrandes">
        <label>E-mail <a>*Campo Obrigatório será seu login</a></label>
        <input type="email" placeholder="E-mail" name="email" id="email" class="inputGrade" />
    </div>
    <div class="camposMedio">
        <label>Senha <a>*Campo Obrigatório mínimo 8 caracteres</a></label>
        <input type="password" placeholder="Senha" name="senha" id="senha" class="inputMedio" />
    </div>
    <div class="camposMedio">
        <label>Repita a senha <a>*Campo Obrigatório mínimo 8 caracteres</a></label>
        <input type="password" placeholder="Repita a senha" name="repiteSenha" id="repitaSenha" class="inputMedio" />
    </div>
    <div class="camposMedio">
        
        <button class="botaoCadastrar">Cadastrar</button>
    </div>
    
</div>