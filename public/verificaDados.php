   
<?php
		
		session_start();
    
       



		switch ($_SESSION['ID_TIPO_USUARIO']) {
			case 1:
				header("Location: meusdados1");
				break;

			case 2:
				header("Location: meusdados2");
				break;

			case 3:
				header("Location: meusdadosadm");
				break;
			
			
		}
		
		


          
?>