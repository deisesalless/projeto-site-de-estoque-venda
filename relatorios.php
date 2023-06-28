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
				<h1> RELATÓRIOS </h1>
			</div>
			
			<div id="menu_centralizar">
				<li>
					<a href="relatorio_estoque.php">Quantidade de Produtos em Estoque</a>
				</li>
				<li>
					<a href="relatorio_total_vendas.php" class="active">Faturamento Total do Mês</a>
				</li>
				<li>
					<a href="administracao.php">Página Inicial</a>
				</li>
			</div>
		</div>
		
		<br>
		<div id="rodape">
			<h4> Rua Guilherme Poerner, 1795, Blumenau, SC, Brasil </h4>
			<h4> 0800 724 2400 </h4>
		</div>
		
	</body>
</html>