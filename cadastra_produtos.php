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
				<h1> CADASTRAR PRODUTO </h1>
			</div>
			
			<!-- Menu da página -->
			<div class="alinhar">
				<div id="menu_esquerda">
					<?php
						include "menu_local.php";
					?>
				</div>
				
				<!-- Formulario de cadastro do produto, recebe as informacoes e envia para a página de processamento -->
				<div id="menu_direita">
					<form method="post" action="processa_cadastra_produtos.php" enctype="multipart/form-data">
						<table class="centralizar">	
							<tr>
								<tr>
									<td> Modelo: </td>
									<td> <input type="text" name="modelo" required> </td>
								</tr>

								<tr>
									<td> Descrição: </td>
									<td> <input type="text" name="descricao" required> </td>
								</tr>								

								<tr>
									<td> Preço: </td>
									<td> <input type="text" name="preco" required> </td>
								</tr>
								
								<tr>
									<td> Tamanho: </td>
									<td> 
										<select name="tamanho">
											<option value="P"> P </option>
											<option value="M"> M </option>
											<option value="G"> G </option>
											<option value="GG"> GG </option>
										</select>
									</td>
								</tr>
								
								<tr>
									<td> Foto: </td>
									<td> <input type="file" name = "foto" required> </td>
								</tr>

							<tr>
								<td colspan="5"> <!-- Botao de confirmar o cadastro -->
									<p> <input type="submit" value="Cadastrar Produto"> </p>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		
		<div id="rodape">
			<h4> Rua Guilherme Poerner, 1795, Blumenau, SC, Brasil </h4>
			<h4> 0800 724 2400 </h4>
		</div>
		
	</body>
</html>