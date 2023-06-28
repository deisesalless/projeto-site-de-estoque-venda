<?php
	
	$conectar = mysqli_connect ("localhost", "root", "", "banco_de_dados");
	
	$cod_jaleco = $_POST["cod_jaleco"];
	$modelo = $_POST["modelo"];
	$descricao = $_POST["descricao"];
	$tamanho = $_POST["tamanho"];
	$preco = $_POST["preco"];
	$foto = $_FILES["foto"];
	
	if ($foto["name"] <> "") {
		$foto_nome = "imagem/".$foto["name"];
		$destino = "site_jaleco/imagem".$foto["name"];		
		move_uploaded_file($foto["tmp_name"], $foto_nome);
	}
	
	$sql_altera = "UPDATE jalecos 		
				   SET 		modelo_jaleco = '$modelo',
							descricao_jaleco = '$descricao',
							tamanho_jaleco = '$tamanho',
							preco_jaleco = '$preco',
							foto_jaleco = '$foto_nome'
				   WHERE 	cod_jaleco = '$cod_jaleco'";
				   
	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);
	
	if ($sql_resultado_alteracao == true) {
		echo "<script> alert ('$modelo alterado com sucesso!') </script>";
		echo "<script> location.href = ('lista_produtos.php') </script>";
		exit();
	}
	else {
		echo "<script> alert ('Ocorreu um erro no servidor. Dados do jaleco não foram alterados. Tente de novo.') </script>";
		echo "<script> location.href = ('altera_produtos.php?cod_amp=<?php echo $cod_jaleco;?>') </script>";
	}
?>