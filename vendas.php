<?php
	// Faz conexão com o Banco de Dados 
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
				<h1> REGISTRO DE VENDAS </h1>
			</div>
			
			<!-- Menu da página -->
			<div class="alinhar">
				<div id="menu_esquerda">
					<?php
						include "menu_local.php";
					?>
				</div>
			
				<!-- Realiza conexao com o Banco de Dados e pesquisa as informacoes que precisa na tabela-->
				<div id="menu_direita">
					<?php
						$conectar = mysqli_connect ("localhost", "root", "", "banco_de_dados");			
					
						$sql_consulta = "SELECT cod_jaleco, modelo_jaleco, descricao_jaleco, tamanho_jaleco, preco_jaleco, foto_jaleco FROM jalecos WHERE vendas_cod_venda IS null AND fila_comp_jaleco = 'Sim'";
						
						// Atribui na variavel o resultado da pesquisa
						$resultado_consulta = mysqli_query ($conectar, $sql_consulta);	
					?>
					
					<!-- Link clicavel para acessar o carrinho de compras -->
					<p><a href="ver_carrinho.php"> Ver Carrinho de Compras </a></p>
					
					<table id="menu_centralizar" border=1>
						<tr>
							<td> Modelo </td>
							<td> Descricao </td>
							<td> Preco </td>
							<td> Tamanho </td>
							<td> Foto </td>
							<td> Ação </td>
						</tr>
						
						<!-- Looping de pesquisa de linha por linha e atribuindo o resultado a uma variavel -->
						<?php		
							while ($registro = mysqli_fetch_row($resultado_consulta))
							{
						?>	
						
						<tr>
							<td><p> <?php echo $registro[1]; ?> </p></td> <!--modelo-->
							<td><p> <?php echo $registro[2]; ?> </p></td> <!--descricao-->
							<td><p> <?php echo $registro[4]; ?> </p></td> <!--preco-->
							<td><p> <?php echo $registro[3]; ?> </p></td> <!--tamanho-->
							
							<td><p>
								<a href="exibe_produtos.php?cod_jaleco=<?php echo $registro[0]?>">
								Imagem do Produto
							</p></td> <!--foto-->
							
							<td><p>
								<a href="processa_carrinho_compras.php?cod_jaleco=<?php echo $registro[0]?>">
								Add ao carrinho de compras
							</p></td> <!--ação-->

						</tr>
						<?php
							}
						?>
					</table>
				</div>
			</div>
		</div>
		
		<br>
		<div id="rodape">
			<h4> Rua Guilherme Poerner, 1795, Blumenau, SC, Brasil </h4>
			<h4> 0800 724 2400 </h4>
		</div>
		
	</body>
</html>