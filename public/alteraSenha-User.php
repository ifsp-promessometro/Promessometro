
<?php 
   $conn = mysql_connect ("localhost", "root" , "" ) or die (mysql_error());
    mysql_select_db("promessometro", $conn) or die (mysql_error());
?>



<?php
session_start();


$senha_user = $_SESSION ['SENHA'];
$id = $_SESSION['ID_USUARIO'];

$senha_user_new = $_POST['senha_user'];

$select = "SELECT * FROM usuario WHERE (SENHA = '$senha_user') and (ID_USUARIO ='$id')";
$query = mysql_query($select);
$row = mysql_num_rows($query);

if ($row != 1){
    die ("Esse usuario não existe");
} 
else {
    $update= "UPDATE usuario SET SENHA = '$senha_user_new' WHERE (SENHA = '$senha_user') and (ID_USUARIO = '$id') ";
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