<?php
session_start();
  require_once "php/conexao.php";

  if(empty($_POST['RM_ALUNO']) || empty($_POST['SENHA_ALUNO'])){
    header('Location: index.php');
    exit();
  }

    $usuario = $_POST['RM_ALUNO'];
    $senha = $_POST['SENHA_ALUNO'];
    
    try{
      
      $Conexao    = conexao::getConnection();
      $query      = $Conexao->query("select RM_ALN, SENHA_ALN, NOME_ALN from TB_Alunos where RM_ALN = '{$usuario}' and SENHA_ALN = '{$senha}'");
      $resultados = $query->fetch();
      
    }catch(Exception $e){
      echo $e->getMessage();
      exit;
    }
    
    $_SESSION["usuario"] = $resultados['NOME_ALN'];
    
    if(($resultados['RM_ALN'] == $usuario) && ($resultados['SENHA_ALN'] == $senha)){
      $_SESSION["permissao"] = 1;
      header('Location: main.php');
    }else{
      header('Location: index.php');
    }

    // foreach($resultados as $resultado) {

      
   
    //    }
  // include('php/conexao.php')

/*if(empty($_POST['RM_ALUNO']) || empty($_POST['SENHA_ALUNO'])){
    header('Location: index.php')
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['RM_ALUNO']);
$senha = mysqli_real_escape_string($conexao, $_POST['SENHA_ALUNO']);

$query = "select RM_ALUNO, SENHA_ALUNO, NOME_ALUNO from TB_Aluno where usuario = '{$usuario}' and senha = '{$senha}";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

echo $row;exit;0 */