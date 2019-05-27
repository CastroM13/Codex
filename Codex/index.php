<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Bibliotech</title>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    
  </head>
  <?php
    if(isset($_SESSION["permissao"]) == 1) {
        header('Location: main.php');
    } else{ ?>
  <body>
      
    
    <section id="cover">
        <div id="cover-caption">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        </div>
                        <div class="col-sm" id="login">
                                <img src="logo bright.png" alt="Smiley face" height="150" width="150"></img>
                        <form action="login.php" method="POST" class="form-horizontal">

                            <div class="form-group">
                                <input autocomplete="off" id="RM_ALUNO" name="RM_ALUNO" type="text" class="form-control form-control-lg inputmassa" placeholder="Seu RM">
                            </div>

                            <div class="form-group">
                                <input autocomplete="off" id="SENHA_ALUNO" name="SENHA_ALUNO" type="password" class="form-control form-control-lg inputmassa" placeholder="Sua Senha">
                            </div>

                            <input type="submit" value="Entrar" onClick="erro()" class="btn btn-dark btn-lg">
                        </form>
                        <h4 id="err"><?php $Erro ?></h4>
                    </div>
                    <div class="col-sm">
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </section>
        <footer>
    </footer>
    
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="index.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
    <?php } ?>
</html>












