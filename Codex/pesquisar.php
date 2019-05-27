<?php
    session_start();
    require_once "php/conexao.php";

    try{
      
      $Pesquisa = 'mem';
      $Conexao    = conexao::getConnection();
      $query      = $Conexao->query("SELECT LV.TITULO_LIVRO,LV.EDITORA_LIVRO,LV.COD_VOLUME_LIVRO, CT.TIPO_CATEGORIA, AT.NOME_AUTOR 
      FROM TB_LIVROS LV
      INNER JOIN TB_CATEGORIAS CT ON LV.COD_CATEGORIA = CT.COD_CATEGORIA
      INNER JOIN TB_AUTORIA AU ON LV.COD_LIVRO = AU.COD_LIVRO
      INNER JOIN TB_AUTORES AT ON AU.COD_AUTOR = AT.COD_AUTOR
      WHERE TITULO_LIVRO like '%$Pesquisa%' ");
      $resultados = $query->fetchAll();
      
    }catch(Exception $e){
      echo $e->getMessage();
      exit;
    }
    // $resultados

  ?>