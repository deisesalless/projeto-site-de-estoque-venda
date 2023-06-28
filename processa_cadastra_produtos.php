<?php
	
	$conectar = mysqli_connect ("localhost", "root", "", "banco_de_dados");
	
	$modelo = $_POST["modelo"];
	$descricao = $_POST["descricao"];
	$preco = $_POST["preco"];
	$tamanho = $_POST["tamanho"];
	$foto = $_FILES["foto"];
	
	$foto_nome = "imagem/".$foto["name"];
	
	/* faz a cópia do arquivo e salva na pasta do meu código
	* na pasta imagens */
	move_uploaded_file($foto["tmp_name"], $foto_nome);
	
	$sql_cadastrar = "INSERT INTO jalecos
													(modelo_jaleco,
													descricao_jaleco,
													tamanho_jaleco,
													preco_jaleco,
													foto_jaleco)
						VALUES					 ('$modelo',
													'$descricao',
													'$tamanho',
													'$preco',
													'$foto_nome')";
	
	$sql_resultado_cadastrar=mysqli_query($conectar,$sql_cadastrar);
	
	// verifica se foi cadastrado ou não, e dispara mensagem
	if ($sql_resultado_cadastrar == true) {
		echo "<script> alert ('$modelo cadastrado com sucesso') </script>";
		echo "<script> location.href = ('cadastra_produtos.php')</script>";
	} else {
		echo "<script> alert ('Ocorreu um erro no servidor, tente novamente') </script>";
		echo "<script> location.href = ('cadastra_produtos.php')</script>";
	}
?>