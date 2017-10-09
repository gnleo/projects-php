<!DOCTYPE html>

<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <title> Login - AppPescado </title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/apppescado.css">
        
        <script type="text/javascript" src="js/jquery.js"></script>
       
              
    </head>

    <body>

        <nav class="navbar menubar">
            <header class="title-bar"><h3>CRUD - APP PESCADO</h3></header>
        </nav>

        <br><br><br><br>
        <div class="container">

            <form class="form-signin" method="POST">
                <h2 class="form-signin-heading">Login</h2>

                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" name="login" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Password" required>

                <div>
                    <a href="#myModal" class="right" data-toggle="modal" data-target="#myModal">Cadastre-se</a>
                </div>

                <button class="btn btn-lg btn-color btn-block" type="submit">Entrar</button>
            </form>
        </div>

        <?php if(!empty($erroLogin)) : echo '<br><spam class="erro"><center>'.$erroLogin.'</center></spam>'; endif;?>

        
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Preencha os campos abaixo</h4>
                    </div>
                    
                    <div class="modal-body">
                        <form id="form-cadastro" method="POST">
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="nome-cadastro" placeholder="Nome" size="60" required autofocus> </label></div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="email" name="email-cadastro" placeholder="Email" size="60" required> </label> </div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="password" name="senha-cadastro" placeholder="Senha" size="60" required> </label> </div>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-color" id="btn-cadastro" data-dismiss="modal">CADASTRAR</button>
                    </div>

                </div>
            </div>
        </div>


        <div class="recebe"></div>

        
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
        <script>
            $(document).ready(function(){
                $("#btn-cadastro").click(function(){
                    // $("#form-cadastro").submit(function(){
                        $.ajax({
                            url: '2_cadastro.php', // VERIFICAR SE EXISTEM CAMPOS EM BRANCO
                            type: 'POST',
                            data: $("#form-cadastro").serialize()+ "&action=cadastrar",
                            success: function(data){
                                alert("Usuário cadastrado com sucesso! Faça seu login.");
                            }

                        });
                    // });
                });
            });
        </script>

    </body>
</html>



