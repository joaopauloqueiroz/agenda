<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <title>Logado</title>
  <?php
            if (!isset($_COOKIE['logado'])) {
                echo "<script>window.location = 'http://localhost/Agenda/';</script>";
            }
    ?>
</head>
<body>
    <div class="container">
      <div class="col-md-12">
        <div class="form lista">
              <h2>Lista de Tarefas Pendentes</h2> 
              <h4 style="float: right; margin-top: -2%; margin-right: 20%;">João Paulo</h4>
              <div class="form-group">
                  <table class="table table-striped table-resposnsive">
                    <tr>
                      <th>Assunto</th>
                      <th>Data</th>
                      <th>Ação</th>
                    </tr>

                      <?php
                            require_once __DIR__.'/vendor/autoload.php';
                            use Agenda\Models\Tasks;

                            $conteudo = new Tasks();
                          foreach ($conteudo->getAll() as $value) {
                              echo '
                                <tr>
                                  <td>'.$value->title.'</td>
                                  <td>'.$value->data_expired.'</td>
                                  <td><a href='.$value->id." class='btn btn-success'>ABRIR</a></td>
                                </tr>";
                          }

                      ?>

                    
                  </table>
              </div>
        </div>
      </div>
      
          <script>
            function delete_cookie() {
                  document.cookie = 'logado=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                  window.location = "http://localhost/Agenda/";
                }
          </script>
    </div>
</body>
</html>