<?php 
	header ('Content-type: text/html; charset=UTF-8');
	$estado = $_POST['estado'];
	#echo "Funcionou";

 	$conn = mysql_connect ("localhost", "root" , "" ) or die (mysql_error());
    mysql_select_db("promessometro", $conn) or die (mysql_error());

 	$query   = "SELECT C.ID_CIDADE, C.NOME FROM cidade AS C INNER JOIN estado AS UF ON UF.ID_ESTADO = C.ID_ESTADO WHERE UF.SIGLA = '$estado'";
 	$query   = mysql_query($query); 	
 	while($rs = mysql_fetch_array($query)){
 		$dados .='<option value="'.$rs['ID_CIDADE'].'">'.$rs['NOME'].'</option>';
 	}

 	echo $dados;
 	
?>