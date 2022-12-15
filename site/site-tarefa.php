  <?php
  require_once ('..\banco\conexao.php');
  require_once('..\service\TarefaService.php');
  require_once('..\modelo\Tarefa.php');
  $tarefaService = new TarefaService($conexao);
  $arrayTarefas = $tarefaService->buscaPorUsuario(23);
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
            <td><?=$arrayTarefas[$i]['status']?></td>
          </tr>
        
          <?php endfor;?>

        </tbody>
      </table>

      </div>
    </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
