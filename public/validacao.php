<?php 
    if(isset($_POST['logar'])) {
        $email = $_POST['email_validacao'];
        $senha = $_POST['senha_validacao'];
        if(!empty($email && $senha)) {
            $conn = mysql_connect ("localhost", "root" , "" );
            mysql_select_db("promessometro", $conn);

            $sql = "SELECT EMAIL, NOME, ID_TIPO_USUARIO FROM usuario WHERE (EMAIL = '$email') AND (SENHA = '$senha' ) ";
            $res = mysql_query($sql);
            $resultado = mysql_fetch_row($res);

            if(!empty($resultado)){
                session_start();
                $_SESSION['ID_USUARIO'] = $resultado['ID_USUARIO'];
                $_SESSION['NOME'] = $resultado['NOME'];
                $_SESSION['ID_TIPO'] = $resultado['ID_TIPO_USUARIO'];
                header('Location: logado.php');
            }
            else {
                echo "login ou senha inv�lidos";
            }
        }
        else {
            echo "preencha os campos corretamente";
        }
    }
    else {
        echo "� necess�rio postar o formul�rio";
    }
    
   

    session_start();

    if(isset($_SESSION["ID_USUARIO"])){

        header("location: navbar-logged");

    }



/*
$email = $_POST['email_validacao'];
$senha = $_POST['senha_validacao'];


 $conn = mysql_connect ("localhost", "root" , "" );
 mysql_select_db("promessometro", $conn);

    $sql = "SELECT EMAIL, NOME, ID_TIPO_USUARIO FROM usuario WHERE (EMAIL = '$email') AND (SENHA = '$senha' ) ";

echo $sql;

    $res = mysql_query($sql);
    $resultado = mysql_fetch_row($res);
    print_r($resultado);

    if (empty($resultado)) {
       
        echo "Login inv�lido!"; exit;
    } 

    // Se a sess�o n�o existir, inicia uma
        if (!isset($_SESSION)) session_start();
      
        // Salva os dados encontrados na sess�o
        $_SESSION['ID_USUARIO'] = $resultado['ID_USUARIO'];
        $_SESSION['NOME'] = $resultado['NOME'];
        $_SESSION['ID_TIPO'] = $resultado['ID_TIPO_USUARIO'];
      
        // Redireciona o visitante
        header("Location: navbar-logged"); exit;

        // A sess�o precisa ser iniciada em cada p�gina diferente
            if (!isset($_SESSION)) session_start();
              
            // Verifica se n�o h� a vari�vel da sess�o que identifica o usu�rio
            if (!isset($_SESSION['ID_USUARIO'])) {
                // Destr�i a sess�o por seguran�a
                session_destroy();
                // Redireciona o visitante de volta pro login
                header("Location: index.php"); exit;
            }
              
            ?>
              

*/
    

?>