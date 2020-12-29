<?php	


$conn = new PDO('mysql:host=localhost; dbname=concursosemsa_db','concursosemsa_user','SEMSA!1882rB471*',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$sql = $conn->prepare("SELECT nome as nome, protocolo as protocolo FROM formularios WHERE cargo = 0 GROUP BY nome, protocolo");


$sql->execute();


?>



			<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<title>Relatorio final</title>
	

<style type="text/css">
	
	h2{letter-spacing: .1em;
font-weight: bold;
text-align: center;
	}

	p{letter-spacing: .1em;
text-align: justify;

		}
.meio{
text-align:center;
}

img{
	width:3em;
	
	margin-rigth:50%;
}



</style>

</head>
<body >
<div class="meio">
<img class="pre" src="logo-2.png" alt="teste"> 
 										<h2>LISTA DOS INDEFERIDOS</h2>


				<p >A Comissão Organizadora do Processo Seletivo Simplificado da SEMSA, no uso de suas atribuições legais em conformidade com o Edital 01/2020 e Portaria Nº096/2020, torna pública a lista das incrições indefirida por não atenderem ao estabelecido no
    referido edital, conforme as funções abaixo:</p>
                                       </div>
	<table class="table table-bordered ">
		<tr>
		<td>N°</td>
		<td>NOME</td>
		<td>PROTOCOLO</td>
		<td>MOTIVO</td>
		</tr>

<?php 

while($linha = $sql->fetch(PDO::FETCH_ASSOC)){


  $nome =$linha['nome'];
  
  $protocolo =$linha['protocolo'];
  $motivo =$linha['motivo'];
  $contador ++;

 echo "
 		<tr>
 		<td> $contador </td>
 		<td> $nome </td>
 		<td> $protocolo </td>
 		<td style ='color:red;'>NÃO FOI SELECIONADO O CARGO</td>



 ";
}


		?>
	</table>
</body>
</html>
		


 