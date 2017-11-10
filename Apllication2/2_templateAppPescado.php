<!DOCTYPE html>

<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <title>AppPescado</title>

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> <!-- importacao css padrao bootstrap -->
        <link rel="stylesheet" type="text/css" href="css/apppescado.css"> <!-- folha de estilos | manual -->
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css"> <!-- biblioteca de icones -->
        <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">  <!-- css tabela principal -->
        <script type="text/javascript" src="js/jquery.js"></script> <!-- biblioteca de interpretacao jquery -->
        <script type="text/javascript" src="js/bootstrap.js"></script> <!-- biblioteca de estilização para modal -->
        <script type="text/javascript" src="DataTables/js/jquery.dataTables.js"></script> <!-- biblioteca controle de tabelas -->
        <script>
            $(document).ready(function(){
                $('#tabela').DataTable({
                    "oLanguage":{
                       
                        "sLengthMenu": "Exibindo _MENU_ resgistro por página",
                        "sZeroRecords": "Nenhum registro correspondente encontrado!",
                        "sInfo": "Exibindo de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Exibindo de 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrado de _MAX_ registros no total)",
                        "sSearch": "Buscar:",
                        "oPaginate": {
                            "sFirst":      "Primeiro",
                            "sPrevious":   "Anterior",
                            "sNext":       "Próximo",
                            "sLast":       "Último"
                        }
                        
                    }
                });
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
                       <h3><i class="fa fa-user-o fa-5x" aria-hidden="true"></i></h3>
                    </tr>

                    <tr class="center">
                        <h4><?= $usuario['nome']; ?></h4>
                    </tr>

                    <tr class="center">
                        <h4><a href="2_sair.php">Sair</a></h4>
                    </tr>
                </table>
            </div>
        </div>

        <div class="container-fluid">
            <div id="elemento-principal" class="row">

                <div class="col-md-10">
                    <h3><b>Exercícios disponíveis</b></h3>
                </div>

                <div class="col-md-2">
                    <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#modalCadastro">Novo</button>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <div id="elemento-principal2" class="row">
                <table id="tabela">
                    <thead>
                        <tr>
                            <th>Enunciado</th> <!-- atributo para controlar a largura da coluna: width="40%" -->
                            <th>Alternativa A</th>
                            <th>Alternativa B</th>
                            <th>Alternativa C</th>
                            <th>Resposta</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($lista_questoes as $questao) : ?>
                            <tr>
                                <td data-id-questao="<?= $questao['id']; ?>"> <?= $questao['enunciado']; ?> </td>
                                <td> <?= $questao['opcaoA']; ?></td>
                                <td> <?= $questao['opcaoB']; ?></td>
                                <td> <?= $questao['opcaoC']; ?></td>
                                <td> <?= $questao['resposta']; ?></td>
                                <td> <button class="btn btn-warning btn-editar" data-toggle="modal" data-target="#modalEditar" data-enunciado="<?= $questao['enunciado']; ?>" data-opcaoA="<?= $questao['opcaoA']; ?>" data-opcaoB="<?= $questao['opcaoB']; ?>" data-opcaoC="<?= $questao['opcaoC']; ?>" data-resposta="<?= $questao['resposta']; ?>"> Editar  <i class="fa fa-pencil" aria-hidden="true"></i> </button> <button class="btn btn-danger btn-excluir" data-toggle="modal" data-target="#modalExcluir" > <i class="fa fa-trash" aria-hidden="true"></i></button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- modal cadastro de questao -->
        <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Preencha os campos abaixo</h4>
                    </div>
                    
                    <div class="modal-body">
                        <form id="form-cadastro-questao" method="POST">
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="enunciado" placeholder="Enunciado" size="60" required autofocus> </label></div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="opcaoA" placeholder="opcaoA" size="60" required> </label> </div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="opcaoB" placeholder="opcaoB" size="60" required> </label> </div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="opcaoC" placeholder="opcaoC" size="60" required> </label> </div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="resposta" placeholder="Resposta" size="60" required> </label> </div>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-color" id="btn-cadastro-questao" data-dismiss="modal">CADASTRAR</button>
                    </div>

                </div>
            </div>
        </div>


        <!-- modal editar questao -->
        <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> Modifique os campos desejados</h4>
                    </div>
                    
                    <div class="modal-body">
                        <form id="form-editar" method="POST">
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="enunciado" id="enunciado" size="60"> </label></div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="opcaoA" id="opcaoA" size="60"> </label> </div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="opcaoB" id="opcaoB" size="60"> </label> </div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="opcaoC" id="opcaoC" size="60"> </label> </div>
                            <div class="form-group" id="form-cadastro"> <label> <input type="text" name="resposta" id="resposta" size="60"> </label> </div>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-color" id="btn-editar-ok" data-dismiss="modal">Editar</button>
                    </div>

                </div>
            </div>
        </div>


        <!-- modal excluir  questao -->
        <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> Deletar</h4>
                    </div>
                    
                    <div class="modal-body">
                        <h4>Deseja exluir esta questão?</h4>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-color" id="btn-excluir-ok" data-dismiss="modal">Excluir</button>
                    </div>

                </div>
            </div>
        </div>


        <!-- acoes jquery -->

        <script> // Cadastro de nova questao
            $(document).ready(function(){
                // alert(id);
                $("#btn-cadastro-questao").click(function(){
                    var id = <?= $_SESSION['id-User']; ?>;
                    $.ajax({
                        url: '2_cadastro.php', 
                        type: 'POST',
                        data: $("#form-cadastro-questao").serialize() + "&id_usuario=" + id + "&action=inserir",
                        success: function(resultado){
                            alert(resultado);
                        }
                    });
                });
            });
        </script>


        <script> //Edicao de questao
            $(document).ready(function(){
                $(document).on('click', '.btn-editar', function(){
                    var id_questao = $(this).closest('tr').find('td[data-id-questao]').attr('data-id-questao');
                    $.ajax({
                        url: '2_cadastro.php', 
                        type: 'POST',
                        data: "id_questao=" + id_questao + "&action=busca",
                        success: function(resultado){
                            // alert(resultado);
                            var indice = resultado.lastIndexOf("&");
                            var ultimo = resultado.length;
                            var resposta = resultado.substring(indice+1,ultimo-1);
                            
                            var resultado1 = resultado.substring(0,indice-1);
                            indice = resultado1.lastIndexOf("&");
                            ultimo = resultado1.length;
                            var opcaoC = resultado.substring(indice+1,ultimo+1);

                            var resultado2 = resultado1.substring(0,indice-1);
                            indice = resultado2.lastIndexOf("&");
                            ultimo = resultado2.length;
                            var opcaoB = resultado.substring(indice+1,ultimo+1);
                            
                            var resultado3 = resultado2.substring(0,indice-1);
                            indice = resultado3.lastIndexOf("&");
                            ultimo = resultado3.length;
                            var opcaoA = resultado.substring(indice+1,ultimo+1);
                           
                            indice = resultado.indexOf("\"");
                            ultimo = resultado.indexOf("&");
                            var enunciado = resultado.substring(indice+1,ultimo);
                            
                            $('#enunciado').val(enunciado);
                            $('#opcaoA').val(opcaoA);
                            $('#opcaoB').val(opcaoB);
                            $('#opcaoC').val(opcaoC);
                            $('#resposta').val(resposta);
                        }
                    });

                    $('#btn-editar-ok').click(function(){
                        $.ajax({
                            url: '2_cadastro.php', 
                            type: 'POST',
                            data: $("#form-editar").serialize() + "&id_questao=" + id_questao + "&action=editar",
                            success: function(resultado){
                                alert(resultado);
                            }
                        });
                    });
                });
            });
        </script>


        <script> // Exclusao de questao
            $(document).ready(function(){
                $(document).on('click','.btn-excluir',function(){
                    var id_questao = $(this).closest('tr').find('td[data-id-questao]').attr('data-id-questao');
                    // alert(id_questao);
                    $('#btn-excluir-ok').click(function(){
                        $.ajax({
                            url: '2_cadastro.php', 
                            type: 'POST',
                            data: "id_questao=" + id_questao + "&action=delete",
                            success: function(resultado){
                                alert(resultado);
                            }
                        });
                    });
                });
            });
        </script>

    </body>
</html>

