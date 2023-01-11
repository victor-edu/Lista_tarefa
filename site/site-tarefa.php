  <?php
  require_once ('..\banco\conexao.php');
  require_once('..\service\TarefaService.php');
  require_once('..\modelo\Tarefa.php');
  require ('..\controladores\verificacao.php');

  $Idusuario= $_SESSION["id"];
  $tarefaService = new TarefaService($conexao);
  $arrayTarefas = $tarefaService->buscaPorUsuario($Idusuario);
  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-light bg-dark d-flex justify-content-center">
      <span class="navbar-brand mb-0 h1 text-white" style="font-size: 30px;">Lista de tarefas</span>
    </nav>
    <div class="container mt-4">
        <div class="card">
          <form method="post" action="../controladores/tarefacontroller.php">

            <div class="card-header bg-dark text-white  mb-3">
              <h4>Registro</h4>
            </div>
            
            <div classs="card-body">  
              <div class="row">  
                
                <div class="col-5">
                  <input id="titulo" name="titulo"class="form-control" required="required" type="text" placeholder="Digite sua tarefa.." aria-label="default input example">
                </div>
                
                <div class="col-3">
                  <input id="dataInicial" name="dataInicial" class="form-control" required="required" type="datetime-local" placeholder="Default input" aria-label="default input example">
                </div>
              
                <div class="col-3">
                  <input id="dataFinal" name="dataFinal" class="form-control" required="required" type="datetime-local" placeholder="Default input" aria-label="default input example">
                </div>
                
                <div class="col-1">
                  <div class="container mb-3 d-flex justify-content-end">
                      <button type="submit"name="submit" id="submit" value="" class="btn btn-success">
                        Salvar
                      </button>
                    </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      <div class="card mt-4" >
          
          <div class="card-header bg-dark text-white">
            <h4>Tarefas</h4>
          </div>

        <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" >ID</th>
                  <th scope="col" >Titulo</th>
                  <th scope="col" >Data_Inicial</th>
                  <th scope="col" >Data_final</th>
                  <th scope="col" >Status</th>
                  <th scope="col" >Deletar</th>
                  <th scope="col" >Atualizar</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  for ($i = 0; $i <count($arrayTarefas); $i++):
                ?>
              
                <tr>
                  <th scope='row'><?=$arrayTarefas[$i]['id']?></th>
                  <td><?=$arrayTarefas[$i]['titulo']?></td>
                  <td><?=$arrayTarefas[$i]['data_inicio']?></td>
                  <td><?=$arrayTarefas[$i]['data_fim']?></td>
                  <td>             
                    <select class="form-select form-select-sm tarefas" id="select-tarefas<?=$arrayTarefas[$i]['id']?>" aria-label=".form-select-sm example " name="tarefas">
                      <option id="fazer" value="1" <?=$arrayTarefas[$i]['status_tarefas_id'] == 1 ? "selected" : ""?>>A fazer</option>
                      <option id="fazendo" value="2" <?=$arrayTarefas[$i]['status_tarefas_id'] == 2 ? "selected" : ""?>>Fazendo</option>
                      <option id="concluido" value="3" <?=$arrayTarefas[$i]['status_tarefas_id'] == 3 ? "selected" : ""?>>Concluido</option>
                    </select>
                    <input type="hidden" name="idTarefa" value="<?=$arrayTarefas[$i]['id']?>">
                  </td>
                      
                  
                  <td>
                    <form action="../controladores/deleteTarefaController.php" method="POST">
                      <input type="hidden" name="deleteItem" value="<?= $arrayTarefas[$i]['id'] ?>" >
                      <button  type="submit" class="btn btn-danger">deletar</button>
                    </form>
                  </td>
                  <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $arrayTarefas[$i]['id'] ?>">
                      atualizar
                    </button>

                    <div class="modal fade" id="exampleModal<?= $arrayTarefas[$i]['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <form method="post" action="../controladores/atualizaTarefaController.php">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="col-5">
                                  <input id="tituloAtualiza" name="tituloAtualiza"class="form-control" value="<?= $arrayTarefas[$i]['titulo'] ?>" required="required" type="text" placeholder="Digite sua tarefa.." aria-label="default input example">
                                </div>
                                
                                <div class="col-3">
                                  <input id="dataInicialAtualiza" name="dataInicialAtualiza" class="form-control"value="<?= $arrayTarefas[$i]['data_inicio'] ?>" required="required" type="datetime-local" placeholder="Default input" aria-label="default input example">
                                </div>
                              
                                <div class="col-3">
                                  <input id="dataFinalAtualiza" name="dataFinalAtualiza" class="form-control"value="<?= $arrayTarefas[$i]['data_fim'] ?>" required="required" type="datetime-local" placeholder="Default input" aria-label="default input example">
                                </div>
                              </div>
                              <input type="hidden" name="idTarefa" value="<?=$arrayTarefas[$i]['id']?>">
                              
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit"name="submit" id="submit" value="" class="btn btn-success">Save changes</button>
                              </div>
                            </div>
                          </form>
                      </div>
                    </div>
                  </td>                  
                </tr>
                </tr>
              
                <?php endfor;?>

              </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="result"></div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>

      $('.tarefas').change((e)=>{
        var idStatus = $(e.currentTarget).val();
        var idTarefa = $(e.currentTarget).next().val();

        console.log(idStatus);
        console.log(idTarefa);

        $.ajax({
          method: "POST",
          url: "../controladores/statusController.php",
          data: {idStatus:idStatus, idTarefa:idTarefa}
        });
        
        
      });

    </script>

    
      </body>
</html>
