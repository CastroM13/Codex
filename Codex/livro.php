<?php
    session_start();
    require_once "php/conexao.php";

    if(empty($_GET['campo'])){
      $pesquisa = '';
    } else {
      $pesquisa = $_GET['campo'];
    }

    try{

      $Conexao    = conexao::getConnection();
      $query      = $Conexao->query("SELECT LV.TITULO_LIVRO,LV.EDITORA_LIVRO,LV.COD_VOLUME_LIVRO, CT.TIPO_CATEGORIA, AT.NOME_AUTOR 
      FROM TB_LIVROS LV
      INNER JOIN TB_CATEGORIAS CT ON LV.COD_CATEGORIA = CT.COD_CATEGORIA
      INNER JOIN TB_AUTORIA AU ON LV.COD_LIVRO = AU.COD_LIVRO
      INNER JOIN TB_AUTORES AT ON AU.COD_AUTOR = AT.COD_AUTOR
      WHERE TITULO_LIVRO like '%$pesquisa%' ");
      $resultados = $query->fetchAll();
      
    }catch(Exception $e){
      echo $e->getMessage();
      exit;
    }
    // $resultados
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Empréstimo</title>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="livro.css">

</head>
<?php if(isset($_SESSION["permissao"]) == 1) { ?>

<body>
    <nav style="color:red" class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="main.php">
            <img>
            Bibliotech
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="main.php">Início</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pesquisas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="livro.php">Livros</a>
                <a class="dropdown-item" href="autores.php">Autores</a>
                <a class="dropdown-item" href="categorias.php">Categorias</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Sair</a>
            </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Perfil
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="livros.html">Livros Emprestados</a>
                <a class="dropdown-item" href="situacao.html">Situação</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="config.html">Configurações</a>
              </div>
            </li> -->
          </ul>
        </div>
      </nav>

    <section id="cover" class="jumbotron text-xs-center">
        
    </section>

    <section>
        <h2 style="text-align: center">Pesquisa de Livro</h2>
        <form action="livro.php" method="GET" class="form-inline">
          <input id="campo"
                 placeholder="Digite o nome do livro" 
                           autocomplete="off"
                           name="campo" 
                           type="text" 
                           class="form-control form-control-lg" 
                           placeholder="Seu RM"><br/>
          <input id="btn1"
                 type="submit" 
                           value="Pesquisar" 
                           onClick="erro()" 
                           class="btn btn-dark btn-lg">
        </form>
               <form action="livro.php" method="GET" class="form-inline">
                    
                    
                </form>
        <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th class="d-none d-sm-block" scope="col">Editora</th>
                    <th scope="col">Qtd.</th>
                    <th class="d-none d-sm-block" scope="col">Categoria</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($resultados as $resultado){ 
                    ?>
                  <tr data-toggle="modal" data-target="#modal">
                    <td><?php echo $resultado["TITULO_LIVRO"]; ?></td>
                    <td><?php echo $resultado["NOME_AUTOR"]; ?></td>
                    <td class="d-none d-md-block"><?php echo $resultado["EDITORA_LIVRO"]; ?></td>
                    <td><?php echo $resultado["COD_VOLUME_LIVRO"] ?></td>
                    <td class="d-none d-md-block"><?php echo $resultado["TIPO_CATEGORIA"] ?></td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
    

    <footer class="text-muted">
        <div class="container">
            <!-- <p class="pull-xs-right">
                <a href="#">Back to top</a>
            </p> -->
            <p>Bibliotech é um projeto de desenvolvimento open-source.</p>
            <p>Quer colaborar com o projeto? <a href="../../">Visite nosso Git Hub</a> e leia nossas <a href="../../getting-started/">diretrizes de alteração</a>.</p>
        </div>
    </footer> 
   
   
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  <?php } else { 
    header('Location: index.php');
  }
  ?>
</html>