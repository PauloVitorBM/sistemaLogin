
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, 
        initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="css/estilo.css">
        <meta charset="UTF-8">
        <title>Novo Usuário</title>
    </head>

    <body>
    <?php

        //VERIFICANDO SE QUALQUER SESSÃO FOI ABERTA.
        session_start();
        $email = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : "";
        if ($email == "") {
            header('location:aviso.php?mt="AVISO"&mc="Acesso Negado!"');
        }

        include "funcoes.php";

        $usuario = $email;

        $tipo_usuario = "";
            $c = getConnection();
            $comando = "SELECT * FROM USUARIOS WHERE email='$usuario'";
            //echo $comando;
            $tabela = $c->query($comando);
            if($tabela->num_rows  >0){
                $linha = $tabela->fetch_assoc();
                $tipo_usuario = $linha["tipo"];
            }else{
                //header ("location: aviso.php?mt=ERRO&mc=Email inválido");   
            }
        
    ?>
    <div class="titulo">
                <i class="material-icons icone">person</i>
                <h1>
                    Sua Conta
                    <a href="index.php">
                        <i class="material-icons close">close</i>
                    </a>
                </h1>
            </div>

        <div class="quadro">
            <ul id="erros" class="erros ocultar">
            </ul>
            <form action="alt_senha.php" method="post">
                
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Email" value="<?=$usuario?>" disabled>
                <label for="tipo">Tipo:</label>
                <input type="hidden"  value=<?=$usuario?> name="id">
                
                <select name="tipo" disabled>
                    <option value="ALUNO" <?=$tipo_usuario=="ALUNO"?"selected":""?> >Aluno(a)</option>
                    <option value="PROFESSOR" <?=$tipo_usuario=="PROFESSOR"?"selected":""?>>Professor(a)</option>
                    <option value="ADMINISTRADOR" <?=$tipo_usuario=="ADMINISTRADOR"?"selected":""?>>Administrador(a)</option>
                    <option value="SECRETARIA" <?=$tipo_usuario=="SECRETARIA"?"selected":""?>>Secretaría</option>
                </select>

                <label for="senha_atual">Senha Atual:</label>
                <input type="password" name="senhaatual" placeholder="Senha Atual" >
                <label for="nova_senha">Nova Senha:</label>
                <input type="password" name="novasenha" placeholder="Nova Senha" >
                <label for="confirma">Confirma:</label>
                <input type="password" name="confirma"  placeholder="Confirmação">

                
                <div class="acoes">
                    <input type="button" value="Alterar Senha" onclick="validar();">
                    <input type="reset" value="Limpar">
                </div>
            </form>
            <?php
            //INCLUINDO O RODAPÉ
            include 'rodape.php';
        ?>
        </div>

        

        <script>
            
            function isVazio(valor){
                if(valor==""){
                    return true;
                }else{
                    return false;
                }
            }
            function isEmail(email){
                
                if(email.indexOf("@")==-1){
                    return false;
                }else{
                    if(email.indexOf(".")!=-1){
                        return true;
                    }else{
                        return false;
                    }
                }
            }

            function isSenha(valor){
                if(valor.length>=6){
                    return true;
                }else{
                    return false;
                }
            }
            
            function validar(){
                let msg = "";
                let email = document.getElementsByName("email")[0];

                let senhaatual = document.getElementsByName("senhaatual")[0];
                let novasenha = document.getElementsByName("novasenha")[0];
                let confirma = document.getElementsByName("confirma")[0];
               
                //email vazio
                if(isVazio(email.value)){
                    msg += "<li>O Email é Obrigatório</li>";
                }else{
                    msg.replace("<li>O Email é Obrigatório</li>","");
                    //email válido
                    if(!isEmail(email.value)){
                        msg += "<li>O Email deve ser válido</li>";
                    }else{
                        msg.replace("<li>O Email deve ser válido</li>","");
                    }
                }

                //senha válida
                if(isSenha(senhaatual.value)){
                    msg.replace("<li>A Senha Atual deve ser informada corretamente</li>","");
                }else{
                    msg += "<li>A Senha Atual deve ser informada corretamente</li>";
                }
                //senha válida
                if(isSenha(novasenha.value)){
                    msg.replace("<li>A Nova Senha deve conter no mínimo 6 caracteres</li>","");
                }else{
                    msg += "<li>A Nova Senha deve conter no mínimo 6 caracteres</li></li>";
                }
                //Confirmação
                if(confirma.value === novasenha.value){
                    msg.replace("<li>Confirmação de senha não confere</li>","");
                }else{
                    msg += "<li>Confirmação de senha não confere</li>";
                }
                
                //exibindo mensagens ou submetendo dados
                var erros = document.getElementById("erros");
                if(msg.trim()==""){
                    document.forms[0].submit();  
                    erros.classList.remove("exibir");   
                    erros.classList.remove("ocultar");    
                }else{
                    erros.innerHTML = msg;
                    erros.classList.remove("ocultar");   
                    erros.classList.remove("exibir");  
                   
                }
            }

        </script>
    </body>   
</html>