<?php
	//Faz conexão com o banco de dados
	session_start();
	
	$conectar = mysqli_connect ("localhost", "root", "", "banco_de_dados");
	
	// recebe o login e a senha da página anterior
	$login = $_POST["login"];
	$senha = $_POST["senha"];	
	
	// realiza a consulta no banco de dados de acordo com os campos
	$sql_consulta = "SELECT cod_user, nome_user, login_user, senha_user FROM usuario
					 WHERE 
					       login_user = '$login' 
					 AND 
					       senha_user = '$senha'";
	
	// executa comando do SQL por meio do PHP
	$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
	
	$linhas = mysqli_num_rows ($resultado_consulta);
	
	// colocar os nomes conforme a tabela do banco de dados
	if ($linhas == 1) {	
		$registro = mysqli_fetch_row($resultado_consulta);
		$_SESSION["cod_user"] = $registro[0];
		$_SESSION["nome_user"] = $registro[1];
		$_SESSION["login_user"] = $registro[2];	
		
		echo "<script> 
					location.href = ('administracao.php') 
			  </script>";
	}
	else {
		echo "<script> 
				  alert ('Login ou Senha Incorretos! Digite Novamente!!') 
			  </script>";
		echo "<script> location.href = ('index.php') </script>";
	}
?>