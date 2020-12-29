<?php	


$conn = new PDO('mysql:host=localhost; dbname=concursosemsa_db','concursosemsa_user','SEMSA!1882rB471*',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$sql = $conn->prepare("SELECT nome  as nome,
 CASE WHEN vagas_deficiencia <> 0 THEN 'SIM' ELSE 'NÃO' END as pne,
       protocolo as protocolo,
       SUM(ponc_graduacao + ponc_doutorado + ponc_mestrado + ponc_posgraduacao1 + 
       ponc_posgraduacao2 + ponc_qualific1 +
           ponc_qualific2 + ponc_qualific3 + ponc_qualific4 + 
           ponc_qualific5 + ponc_espe1 + ponc_espe2 + ponc_espe3 +
           ponc_espe4)as nota,
       SUM(ponc_espe1 + ponc_espe2 + ponc_espe3 + ponc_espe4)as experiencia
       
FROM ponctuations LEFT JOIN formularios ON ponctuations.formulario_id = formularios.id
WHERE aprovado = 1 and cargo = 1 GROUP BY nome, pne, protocolo
ORDER By nota desc ,experiencia desc, data_nascimento asc; ");


$sql->execute();

?>



			<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<title>Relatorio final</title>
	

<style type="text/css">
	
	h2 {letter-spacing: .1em;
font-weight: bold;
text-align: center;
}

	p {letter-spacing: .1em;
text-align: justify;

}
	.meio {
text-align:center;
}

	img {
	width:3em;
	margin-rigth:50%;
}



</style>

</head>
<body >
<div class="meio">
<img class="pre" src="logo-2.png" alt="teste"> 
 										<h2>RESULTADO PARCIAL</h2>


										 <p>A Comissão Organizadora do Processo Seletivo Simplificado da SEMSA, no uso de suas atribuições legais em conformidade com o Edital 01/2020 e Portaria Nº096/2020, torna pública a lista das incrições defiridas e a relação de classificados,
para que produzam os devidos e legais efeitos, como segue:</p>
</div>

				<h5 style="text-align: center;">CARGO TÉCNICO DE LABORATÓRIO </h5>

	<table class="table table-bordered ">
		<tr>
		<td>N°</td>
		<td>Nome</td>
		<td>PNE</td>	
		<td>PROTOCOLO</td>
		<td>NOTA</td>
		</tr>

<?php 

while($linha = $sql->fetch(PDO::FETCH_ASSOC)){


  $nome =$linha['nome'];
  $pne =$linha['pne'];
  $protocolo =$linha['protocolo'];
  $nota =$linha['nota'];
  $contador ++;

 echo "
 		<tr>
 		<td> $contador </td>
 		<td> $nome </td>
 		<td> $pne </td>
 		<td> $protocolo </td>
 		<td> $nota </td>



		 ";
}

?>

	</table>
</body>
</html>
		


