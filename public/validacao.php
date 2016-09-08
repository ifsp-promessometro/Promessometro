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
                echo "login ou senha inválidos";
            }
        }
        else {
            echo "preencha os campos corretamente";
        }
    }
    else {
        echo "É necessário postar o formulário";
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
       
        echo "Login inválido!"; exit;
    } 

    // Se a sessão não existir, inicia uma
        if (!isset($_SESSION)) session_start();
      
        // Salva os dados encontrados na sessão
        $_SESSION['ID_USUARIO'] = $resultado['ID_USUARIO'];
        $_SESSION['NOME'] = $resultado['NOME'];
        $_SESSION['ID_TIPO'] = $resultado['ID_TIPO_USUARIO'];
      
        // Redireciona o visitante
        header("Location: navbar-logged"); exit;

        // A sessão precisa ser iniciada em cada página diferente
            if (!isset($_SESSION)) session_start();
              
            // Verifica se não há a variável da sessão que identifica o usuário
            if (!isset($_SESSION['ID_USUARIO'])) {
                // Destrói a sessão por segurança
                session_destroy();
                // Redireciona o visitante de volta pro login
                header("Location: index.php"); exit;
            }
              
            ?>
              

*/
    

?>