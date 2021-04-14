<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, 
        initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/estilo.css">
    <meta charset="UTF-8">
    <title>Entrar no Sistema</title>
</head>

<body>
    <div class="titulo">
        <i class="material-icons icone">accessibility</i>
        <h1>
            Login
            <a href="index.php">
                <i class="material-icons close">close</i>
            </a>
        </h1>
    </div>

    <div class="quadro">
        <ul id="erros" class="erros ocultar">
        </ul>
        <form action="logar.php" method="post">

            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Email">

            <label for="senha">Senha:</label>
            <input type="password" name="senha" placeholder="Senha">

            <div class="acoes">
                <input type="button" value="Entrar" onclick="validar();">
                <input type="reset" value="Limpar">
            </div>
        </form>
        <?php
        //INCLUINDO O RODAPÉ
        include 'rodape.php';
        ?>
    </div>



    <script>
        function isVazio(valor) {
            if (valor == "") {
                return true;
            } else {
                return false;
            }
        }

        function isEmail(email) {

            if (email.indexOf("@") == -1) {
                return false;
            } else {
                if (email.indexOf(".") > -1) {
                    return true;
                } else {
                    return false;
                }
            }
        }


        function validar() {
            let msg = "";
            let email = document.getElementsByName("email")[0];
            let senha = document.getElementsByName("senha")[0];

            //senha vazia
            if (isVazio(senha.value)) {
                msg += "<li>Informe a senha</li>";
                senha.focus();
            } else {

                msg.replace("<li>Informe a senha</li>", "");
            }
            //email vazio
            if (isVazio(email.value)) {
                msg = "<li>Informe o email.</li>" + msg;
                email.focus();
            } else {
                msg.replace("<li>Informe o email.</li>", "");
                //email válido
                if (!isEmail(email.value)) {
                    msg += "<li>O Email deve ser válido</li>";
                } else {
                    msg.replace("<li>O Email deve ser válido</li>", "");
                }
            }



            //exibindo mensagens ou submetendo dados
            var erros = document.getElementById("erros");
            if (msg.trim() == "") {
                document.forms[0].submit();
                erros.classList.remove("exibir");
                erros.classList.remove("ocultar");
            } else {
                erros.innerHTML = msg;
                erros.classList.remove("ocultar");
                erros.classList.remove("exibir");
            }
        }
    </script>



</body>

</html>