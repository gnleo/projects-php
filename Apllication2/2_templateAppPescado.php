<!DOCTYPE html>

<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <title>AppPescado</title>

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> <!-- importacao css padrao bootstrap -->
        <link rel="stylesheet" type="text/css" href="css/apppescado.css"> <!-- folha de estilos | manual -->
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css"> <!-- biblioteca de icones -->
        <script type="text/javascript" src="js/jquery.js"></script> <!-- biblioteca de interpretacao jquery -->
        <script type="text/javascript" src="js/bootstrap.js"></script> <!-- biblioteca de estilização para modal -->
        <script type="text/javascript" src="DataTables/js/jquery.dataTables.js"></script> <!-- biblioteca controle de tabelas -->
        <script>
            $(document).ready(function(){
                $('#tabela').DataTable();
            });
        </script>
      
    </head>

    <body>

        <nav class="navbar menubar">
            <header class="title-bar"><h3>CRUD - APP PESCADO</h3></header>
        </nav>

        <div id="sidebar"">
            
            <div id="menu-sidebar">
                <table>
                    <tr class="center">
                        <img src="resources/users.png" height="130" width="100" class="image-circle" alt="foto do usuario">
                    </tr>

                    <tr class="center">
                        <h4>nome usuario</h4>
                    </tr>
                </table>
            </div>

        </div>

        <div class="container-fluid">
            <div id="elemento-principal" class="row">

                <div class="col-md-11">
                    <h4>AppPescado</h4>
                </div>

                <div class="col-md-1">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCadastro">Novo</button>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <div id="elemento-principal">
                <table id="tabela">
                    <thead>
                        <tr>
                            <th>questao</th>
                            <th>a</th>
                            <th>b</th>
                            <th>c</th>
                            <th>d</th>
                            <th>Opções</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th>TESTES</th>
                            <th>alternativa a</th>
                            <th>alternativa b</th>
                            <th>alternativa c</th>
                            <th>alternativa d</th>
                            <th><button class="btn btn-warning" data-toggle="modal" data-target="#modalEditar" >Editar</button> <button class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir" >Excluir</button></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- modal cadastrar -->
        <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Preencha os campos abaixo</h4>
                    </div>
                    
                    <div class="modal-body">
                        <form id="form-cadastro" method="POST">
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="enunciado" placeholder="Enunciado" size="60" required autofocus> </label></div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="opcaoA" placeholder="opcaoA" size="60" required> </label> </div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="opcaoB" placeholder="opcaoB" size="60" required> </label> </div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="opcaoC" placeholder="opcaoC" size="60" required> </label> </div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="resposta" placeholder="Resposta" size="60" required> </label> </div>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-color" id="btn-cadastro" data-dismiss="modal">CADASTRAR</button>
                    </div>

                </div>
            </div>
        </div>


        <!-- modal editar -->
        <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modifique os campos desejados</h4>
                    </div>
                    
                    <div class="modal-body">
                        <form id="form-cadastro" method="POST">
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="enunciado" placeholder="Enunciado" size="60" required autofocus> </label></div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="opcaoA" placeholder="opcaoA" size="60" required> </label> </div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="opcaoB" placeholder="opcaoB" size="60" required> </label> </div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="opcaoC" placeholder="opcaoC" size="60" required> </label> </div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="resposta" placeholder="Resposta" size="60" required> </label> </div>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-color" id="btn-editar" data-dismiss="modal">CADASTRAR</button>
                    </div>

                </div>
            </div>
        </div>


        <!-- modal excluir -->
        <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Excluir</h4>
                    </div>
                    
                    <div class="modal-body">
                        <h4>Deseja exluir esta questão?</h4>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-color" id="btn-excluir" data-dismiss="modal">Exluir</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- acoes jquery -->

        <script> // Cadastro de nova questa
            $(document).ready(function(){
                $("#btn-cadastro").click(function(){
                    alert("criar nova questao");
                    // $.ajax({
                    //     alert("criar nova questao");
                    // });
                });
            });
        </script>


        <script> // Edicao de questao
            $(document).ready(function(){
                $("#btn-editar").click(function(){
                    alert("editar questao");
                    // $.ajax({
                    //     alert("criar nova questao");
                    // });
                });
            });
        </script>


        <script> // Exclusao de questao
            $(document).ready(function(){
                $("#btn-excluir").click(function(){
                    alert("excluir questao");
                    // $.ajax({
                    //     alert("criar nova questao");
                    // });
                });
            });
        </script>

    </body>
</html>

