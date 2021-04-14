<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, 
        initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/estilo.css">
    <meta charset="UTF-8">
    <style>
        .quadro{
            width: 600px;
        }
        .titulo {
            width: 620px;
        }
        .titulo h1 {
            width: 570px;
        }
    </style>
    <title>Gerenciamento de Usuários</title>
</head>

<body>

    <?php
    include "sessao_adm.php";
    ?>

    <div class="titulo">
        <i class="material-icons icone">group</i>
        <h1>
            Gerenciamento de Usuários
            <a href="index.php">
                <i class="material-icons close">close</i>
            </a>
        </h1>
    </div>

    <div class="quadro">
        <?php
        include 'funcoes.php';
        $c = getConnection();

        $comando = "SELECT * FROM USUARIOS WHERE email!='" . $_SESSION["usuario"] . "'";
        $tabela = $c->query($comando);

        if ($tabela->num_rows > 0) {
            //existem dados na tabela

            echo "<table class='tabela_gerencial'>";
            //linha to cabeçalho da tabela
            echo "<tr>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                            <th>Senha</th>
                          </tr>";
            //enquanto para buscar e imprimir os dados

            while ($linha = $tabela->fetch_assoc()) {
               

                if( $linha['senha']==md5('123mudar')){
                    $icone ="<i class='material-icons close'> done </i>";

                }else{
                    $icone ="<a href=\"redefinir.php?email=" . $linha["email"] . "\">
                    <i class='material-icons close'> autorenew </i>
                    </a>";
                }
                echo "<tr>
                        <td>" . $linha['email'] . "</td>
                        <td>" . $linha['tipo'] . "</td>
                        <td>
                            <a href=\"editar_usuario.php?email=" . $linha["email"] . "\">
                            <i class='material-icons close'>edit</i>
                            </a>
                        </td>
                        <td>
                            <a href=\"javascript: excluir('" . $linha["email"] . "')\">
                                <i class='material-icons close'>delete</i>
                            </a>
                        </td>
                        <td> 
                            $icone
                        </td>
                                
                    </tr>";
                                           
            }

     




            //fim da tabela
            echo "</table>";
        }
        ?>


        <?php
        //INCLUINDO O RODAPÉ
        include 'rodape.php';
        ?>

    </div>

    <script>
        function excluir(email) {
            r = confirm("DESEJA REALMENTE EXCLUIR\n O USUÁRIO: " + email + " ?");
            if (r == true) {
                window.location.href = "excluir.php?email=" + email;
            }
        }
    </script>

</body>

</html>