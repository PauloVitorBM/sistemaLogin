
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
        include "sessao_adm.php";
    ?>
    <div class="titulo">
                <i class="material-icons icone">person</i>
                <h1>
                    Novo Usuário
                    <a href="index.php">
                        <i class="material-icons close">close</i>
                    </a>
                </h1>
            </div>

        <div class="quadro">
            <ul id="erros" class="erros ocultar">
            </ul>
            <form action="cad_usuario.php" method="post">
                
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Email">
                <label for="tipo">Tipo:</label>
                
                <select name="tipo">
               
                    <option value="ALUNO">Aluno(a)</option>
                    <option value="PROFESSOR">Professor(a)</option>
                    <option value="ADMINISTRADOR">Administrador(a)</option>
                    <option value="SECRETARIA">Secretaría</option>
                </select>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" placeholder="Senha" >
                <label for="confirma">Confirma:</label>
                <input type="password" name="confirma"  placeholder="Confirmação">
                
                <input type="checkbox" name="concordo">
                <label for="concordo">
                    <a href="javascript:abrir_termo();">
                    Li os termos e concordo.
                    </a>
                </label>
                <div class="acoes">
                    <input type="button" value="Cadastrar" onclick="validar();">
                    <input type="reset" value="Limpar">
                </div>
            </form>
            <?php
            //INCLUINDO O RODAPÉ
            include 'rodape.php';
        ?>
        </div>

       

        <div class="fundo_flutuante ocultar">
            <div class="termos">
                
                <h1>
                    Termos de Compromisso
                    <a href="javascript:fechar_termo();">
                        <i class="material-icons close">close</i>
                    </a>
                </h1>
                <p class="rolagem">
                                TERMO DE RESPONSABILIDADE PARA USO DO SALÃO DE FESTAS
                (nome do(a) condômino(a)), (nacionalidade), (estado civil), (profissão), inscrito(a) no CPF sob o nº (informar) e no RG nº (informar), morador(a) da unidade (informar), para fazer uso do salão de festas conforme reserva realizada para o dia (data), das (horário) às (horário), firmo o presente termo de responsabilidade assumindo as obrigações aqui descritas.
                1) Me responsabilizo pela integralidade das instalações, móveis, objetos de decoração, eletrônicos, eletrodomésticos, louças, talheres e demais utensílios que guarnecem o salão de festas, me comprometendo a entregar o salão com todos os itens recebidos em perfeito estado, conforme relação anexa.
                2) Em caso de extravio ou dano de algum dos itens constantes da relação anexa, me comprometo a custear seu conserto ou substituição.
                3) Me responsabilizo manter o número de usuários compatível com a capacidade do salão de festas, que é de (informar) pessoas.
                4) Me comprometo a entregar as chaves do salão de festas ao porteiro (ou zelador) até as 08h00 da manhã seguinte à reserva.
                Firmo, assim, o presente para surte efeito.
                (município) - (UF), (dia) de (mês) de (ano).
                TERMO DE RESPONSABILIDADE PARA USO DO SALÃO DE FESTAS
                (nome do(a) condômino(a)), (nacionalidade), (estado civil), (profissão), inscrito(a) no CPF sob o nº (informar) e no RG nº (informar), morador(a) da unidade (informar), para fazer uso do salão de festas conforme reserva realizada para o dia (data), das (horário) às (horário), firmo o presente termo de responsabilidade assumindo as obrigações aqui descritas.
                1) Me responsabilizo pela integralidade das instalações, móveis, objetos de decoração, eletrônicos, eletrodomésticos, louças, talheres e demais utensílios que guarnecem o salão de festas, me comprometendo a entregar o salão com todos os itens recebidos em perfeito estado, conforme relação anexa.
                2) Em caso de extravio ou dano de algum dos itens constantes da relação anexa, me comprometo a custear seu conserto ou substituição.
                3) Me responsabilizo manter o número de usuários compatível com a capacidade do salão de festas, que é de (informar) pessoas.
                4) Me comprometo a entregar as chaves do salão de festas ao porteiro (ou zelador) até as 08h00 da manhã seguinte à reserva.
                Firmo, assim, o presente para surte efeito.
                (município) - (UF), (dia) de (mês) de (ano).

                (assinatura)
                (nome do(a) condômino(a))
                </p>
            </div>
        </div>

        <script>
            function fechar_termo(){
                quadro = document.getElementsByClassName("fundo_flutuante")[0];
                quadro.classList.remove("exibir")
                quadro.classList.add("ocultar");
            }
            function abrir_termo(){
                quadro = document.getElementsByClassName("fundo_flutuante")[0];
                quadro.classList.remove("ocultar")
                quadro.classList.add("exibir");
            }
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
                    if(email.indexOf(".")> (email.indexOf("@")+1)){
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
               
                let senha = document.getElementsByName("senha")[0];
                let confirma = document.getElementsByName("confirma")[0];
                let aceita = document.getElementsByName("concordo")[0];
                
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
                if(isSenha(senha.value)){
                    msg.replace("<li>A Senha deve conter no mínimo 6 caracteres</li>","");
                }else{
                    msg += "<li>A Senha deve conter no mínimo 6 caracteres</li>";
                }
                //Confirmação
                if(confirma.value === senha.value){
                    msg.replace("<li>Confirmação de senha não confere</li>","");
                }else{
                    msg += "<li>Confirmação de senha não confere</li>";
                }
                //termos
                if(aceita.checked == true){
                    msg.replace("<li>Leia os Termos e Aceite</li>","");
                }else{
                    msg += "<li>Leia os Termos e Aceite</li>";
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