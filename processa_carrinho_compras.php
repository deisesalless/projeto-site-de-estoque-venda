<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "banco_de_dados");
				
	
	$cod_jaleco = $_GET["cod_jaleco"];	
	
	$sql_altera = "UPDATE jalecos 		
				   SET 		fila_comp_jaleco = 'Nao'
				   WHERE 	cod_jaleco = '$cod_jaleco'";
	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

	if ($sql_resultado_alteracao == true)
	{
		echo "<script>
				alert ('Jaleco adicionado ao carrinho com sucesso!') 
			  </script>";
		echo "<script> 
				 location.href = ('vendas.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. O jaleco não foi colocado no carrinho de compras. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('vendas.php') 
			 </script>";
	}
?>