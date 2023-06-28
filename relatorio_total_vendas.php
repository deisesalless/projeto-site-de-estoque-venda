<?php 
	session_start ();
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
		<style> a {text-decoration: none;} </style>
	</head>
	<body>
				
		<div id ="cabecalho">
			<div id = "topo">
				<h1> Controle de Estoque e Venda </h1>
			</div>
			
			<div id="logo">
				<img src="imagem/logo.jpg">
			</div>
			
			<div id="menu_sair">
				<ul><a href="logout.php" class="active">Sair</a></ul> 
			</div>
		</div>
		
		<div id="conteudo_especifico">
			<div id="titulo">
				<h1> RELATÓRIO TOTAL DE VENDAS </h1>
			</div>
			
			<div id="menu_centralizar">
				<?php
					$conectar = mysqli_connect ("localhost", "root", "", "banco_de_dados");			
						
					$data = date ('d/m/Y');
						
					$sql_consulta_total_vendas = "SELECT preco_jaleco
													FROM jalecos
													WHERE fila_comp_jaleco = 'Vendido'";
						
					$resultado_consulta = mysqli_query ($conectar, $sql_consulta_total_vendas);		
							
				
					$valor_total = 0;
					while ($registro_total_vendas = mysqli_fetch_row ($resultado_consulta))
					{
						$valor_total = $valor_total + $registro_total_vendas[0];
					}
				?>
				<p> Valor total das vendas até a presente data: R$ <?php echo $valor_total; ?> </p>
				<p> <a href="relatorios.php"> Voltar </a> </p>
			</div>
		</div>
		
		<br>
		<div id="rodape">
			<h4> Rua Guilherme Poerner, 1795, Blumenau, SC, Brasil </h4>
			<h4> 0800 724 2400 </h4>
		</div>
		
	</body>
</html>