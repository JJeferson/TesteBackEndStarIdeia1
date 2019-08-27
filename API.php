<?php



//Link do Banco de dados
require_once('db.class.php');
//criando conexão
$objDb = new db();
$link = $objDb->conecta_mysql();

//Tipo da operacao
/*
-Insert
-Update
-Delete
-Listar
*/
 $Recebe_TOperacao = $_GET['TOperacao'];

 $Recebe_Nome = $_GET['Nome'];
 $Recebe_Link = $_GET['Links'];
 $Recebe_Desc = $_GET['Desc'];
 $Recebe_Tags = $_GET['Tags'];
 $Recebe_id   = $_GET['id'];




//-Listar
if($Recebe_TOperacao="Listar")
{

$sql = " SELECT * from ferramentas ";

 $resultado_id = mysqli_query($link, $sql);
 $dados = array();
 while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

 $dados[]=$registro;
 }
 echo json_encode($dados);
}
//Fim do Listar

//Insert
if($Recebe_TOperacao="Insert")
{

  $sql="Insert into ferramentas (nome,link,desc,tags) values('$Recebe_nome','$Recebe_Link','$Recebe_Desc','$Recebe_Tags')";
      if(mysqli_query($link,$sql))
       {
	   echo "successo!";
       }
       else
       {
       echo "falha";
       }
}
//Fim do Insert


//Update
if($Recebe_TOperacao="Update")
{

      $sql= "update ferramentas set nome='$Recebe_nome', link='$Recebe_Link', desc='$Recebe_Desc',tag='$Recebe_Tags' where id='$id'";
      if(mysqli_query($link,$sql))
       {
	   echo "successo!";
       }
       else
       {
       echo "falha";
       }
}
//Fim do update

//Delete
if($Recebe_TOperacao="Delete")
{

      $sql=  "delete * from ferramentas where id='$id'";
      if(mysqli_query($link,$sql))
       {
	   echo "successo!";
       }
       else
       {
       echo "falha";
       }
}
//Fim do Delete


echo 'Dados para uso: </br>';
echo 'Informar o header TOperacao com uma das informacoes abaixo: </br>';
echo '-Insert </br>';
echo '-Update </br>';
echo '-Delete </br>';
echo '-Listar </br>';
echo 'Os header referentes as informações do registro devem ser informados sempre, menos no Listar';



?>
