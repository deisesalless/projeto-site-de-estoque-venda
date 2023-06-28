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
				<h1> ADMINISTRAÇÃO </h1>
			</div>
			
			<!-- Exibe o manu da página -->
			<div id="menu_centralizar">
				<?php
					include "menu_local.php";
				?>
			</div>
		</div>
		
		<div id="rodape">
			<h4> Rua Guilherme Poerner, 1795, Blumenau, SC, Brasil </h4>
			<h4> 0800 724 2400 </h4>
		</div>
		
	</body>
</html>