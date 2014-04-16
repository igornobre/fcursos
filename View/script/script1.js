/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function (){

    $(".login").click(function (){
        $(".menuLogin").toggle();
        $(".banner").show();
        $(".carregar").hide();
    });
    
    $(".menuLogin2 button").click(function (){
        var emailLogin = $("#emailLogin").val();
        var senhaLogin = $("#senhaLogin").val();
        
        if(emailLogin.length < 5){
            alert("Campo de E-mail não preenchido!");
            $("#emailLogin").css("border", "solid 2px red");
        }
        if(senhaLogin.length < 8){
            alert("Campo de Senha deve ter no mínimo 8 caracteres!");
            $("#senhaLogin").css("border", "solid 2px red");
        }
        
        if((emailLogin.length > 4) && (senhaLogin.length > 7)){
            $.post("Controller/usuarios.php",
            {
              user: emailLogin,
              pass: senhaLogin
            },
            function(data){
              alert(data);
              if(data == "Login efetuado com sucesso!"){
                  window.location.href = 'home.php';
              }
            });
        }
        
    });
    
    
    $(".subTopo").click(function(){
        var url = $(this).attr("name");
        $(".banner").toggle();
        $(".carregar").toggle();
        $(".carregar").load(url);
    });
        
});

