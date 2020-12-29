<?php	


	$conn = new PDO('mysql:host=localhost; dbname=concursosasdh2020_db','root','');

$sql = $conn->prepare("SELECT nome as nome, protocolo as protocolo, descricaoIndeferido as motivo FROM formularios WHERE aprovado = 2 and cargo = 1 GROUP BY nome, protocolo,motivo  ");


$sql->execute();


?>



			<html>
<head>
	<meta charset="utf-8">
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
 										<h2>RESULTADO PARCIAL</h2>


				<p >A Comissão Organizadora do Processo Seletivo Simplificado da SASDH, no uso de suas atribuições legais em conformidade com o Edital 01/2020 e Portaria Nº096/2020, torna pública a lista das incrições indefirida por não atenderem ao estabelecido no
    referido edital, conforme as funções abaixo:</p>
                                       </div>

<h5 style="text-align: center;">CARGO SUPERVISOR DO PROGRAMA CRIANÇA FELIZ </h5>
	<table class="table table-bordered ">
		<tr>
		<td>N°</td>
		<td>Nome</td>
	
		<td>Protocolo</td>
		<td>Motivo</td>


		

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
 		<td style ='color:red;'> $motivo </td>



 ";
}


		?>

	</table>











</body>
</html>
		


