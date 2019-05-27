
<?php
define('DB_HOST'        , "SRV-BD-1"); //10.67.22.216
define('DB_USER'        , "q118_a");
define('DB_PASSWORD'    , "q118ta");
define('DB_NAME'        , "BIBLIOTECA");
define('DB_DRIVER'      , "sqlsrv"); //NÃO PRECISA ALTERAR!!! 
require_once "conexao.php";

try{

    $Conexao    = Conexao::getConnection();
    $query      = $Conexao->query("SELECT Titulo_livro, Editora_livro,Edicao_livro,Ano_livro,ISBN_livro,cod_volume_livro FROM tb_Livros");
    $produtos   = $query->fetchAll();

}catch(Exception $e){
    echo $e->getMessage();
    exit;
}
?> <table bord=1>
<tr>
    <td>Titulo_livro</td>
    <td>Editora_livro</td>
    <td>Edicao_livro</td>
    <td>ano_livro</td>
</tr>
 <!-- 
    foreach($produtos as $produto) {
       
        $pesquisar = $_POST['pesquisar'];
        $result ="SELECT * from tb_LIVROS WHERE TITULO_LIVRO LIKE %'.$pesquisar.'% LIMIT 5";
        $result_titulo = mssql_query($conn, $result);

        while($rows_titulo = mssql_query_array($result_titulo)){
                 echo "Nome do Livro :".$rows_titulo['titulo_livro']."<br>";
         }



?> -->