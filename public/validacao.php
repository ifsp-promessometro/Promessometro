<?php 
    $conn = mysql_connect ("localhost", "root" , "" ) or die (mysql_error());
    mysql_select_db("promessometro", $conn) or die (mysql_error());
?>  
<html>
<head>
    <title></title>
    <script type="text/javascript">
    function LoginFailed(){



        setTimeout("window.location='principal'",3000);


    }

    </script>
</head>
<body>

</body>
</html>





<?php
    
        $email = $_POST['email_validacao'];
        $senha = $_POST['senha_validacao'];

    

            $sql = "SELECT * FROM usuario  WHERE (EMAIL = '$email') AND (SENHA = '$senha')" ;
            $query = mysql_query($sql);
            $res = mysql_fetch_array($query);
            $row = mysql_num_rows($query);

            

            if($row == 1){

               
               
        
                session_start();
                $_SESSION['ID_USUARIO'] = $res['ID_USUARIO'];
                $_SESSION['EMAIL'] = $res['EMAIL'];
                $_SESSION['SENHA'] = $res['SENHA'];
                $_SESSION['NOME'] = $res['NOME'];
                $_SESSION['ID_CIDADE'] = $res['ID_CIDADE'];
                $_SESSION['ID_TIPO_USUARIO'] = $res['ID_TIPO_USUARIO'];
                $_SESSION['ID_OSA'] = $res['ID_OSA'];
                $_SESSION['CARGO'] = $res['CARGO'];
                $_SESSION['STATUS_ATIVIDADE'] = $res['STATUS_ATIVIDADE'];
                $_SESSION['LOG'] = 1;


               


            }
            else{
                echo "Email ou Senha Inválidos! Aguarde enquanto você é redirecionado!";
                echo "<script>LoginFailed()</script>";
            }

             header("Location: principal");

           

            


          
?>