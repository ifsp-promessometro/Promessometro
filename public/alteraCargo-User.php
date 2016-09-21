
<?php 
    $conn = mysql_connect ("mysql.promessometro.kinghost.net", "promessometro" , "alcino5096" ) or die (mysql_error());
    mysql_select_db("promessometro", $conn) or die (mysql_error());
?>



<?php
session_start();


$cargo = $_SESSION['CARGO'];
$id = $_SESSION['ID_USUARIO'];
$cargo_new = $_POST['cargo_user_new'];

 $select = "SELECT * FROM usuario WHERE (CARGO = '$cargo') and (ID_USUARIO ='$id')";
	$query = mysql_query($select);
	$row = mysql_num_rows($query);

	echo $row;


if ($row != 1){
    die ("Esse usuario não existe");
} 
else {
    $update= "UPDATE usuario SET CARGO = '$cargo_new' WHERE (CARGO = '$cargo') and (ID_USUARIO = '$id') ";
    mysql_db_query("promessometro",$update,$conn);

}



if (!$query){
    die ("Problemas ao executar o SQL !!!");
} 
else {
    Echo "A execução do SQL foi bem sucedida !!!";
}

if (!$query){
    die ("Erro ao atualizar o banco");
} 
else {
    header("Location: principal");
    
}



?>