<?php 
	// conexao com o Banco de Dados
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
				<h1> CARRINHO DE COMPRAS </h1>
			</div>
			
			<!-- Menu local -->
			<div class="alinhar">
				<div id="menu_esquerda">
					<?php
						include "menu_local.php";
					?>
				</div>
		
				<div id="menu_direita">
				
					<!-- Conexao e pesquisa no banco de dados -->
					<?php
						$conectar = mysqli_connect ("localhost", "root", "", "banco_de_dados");			
					
						$sql_consulta = "SELECT cod_jaleco, modelo_jaleco, descricao_jaleco, tamanho_jaleco, preco_jaleco, foto_jaleco FROM jalecos WHERE vendas_cod_venda IS null AND fila_comp_jaleco = 'Nao'";
						
						// o resultado da linha da pesquisa é atribuida a uma variavel
						$resultado_consulta = mysqli_query ($conectar, $sql_consulta);			
					?>
					
					<table id="menu_centralizar" border=1>	
						<tr>
							<td> <p> Modelo </p> </td>
							<td> <p> Descrição </p> </td>
							<td> <p> Tamanho </p> </td>
							<td> <p> Preço </p> </td>
							<td> <p> Exibir </p> </td>
							<td> <p> Ação </p> </td>
						</tr>
						<?php	
							$valor_total = 0; // valor zerado para ser inicializado
							
							// Looping da linha sendo atribuido a um array
							while ($registro = mysqli_fetch_row($resultado_consulta))
							{
						?>
						<tr>
							<td> <?php echo $registro[1]; ?> </td> <!-- Modelo -->
							<td> <?php echo $registro[2]; ?> </td> <!-- Descricao -->
							<td> <?php echo $registro[3]; ?> </td> <!-- Tamanho -->
							<td>
								<?php
									echo $registro[4]; // Preco
									$valor_total = $valor_total + $registro[4]; // Soma do valor total do carrinho
								?>
							</td>
							<td> <!-- Palavra clicavel, direciona para a pagina que exibe o produto -->
								<a href="exibe_produtos.php?cod_jaleco=<?php echo $registro[0]?>"> Foto </a>
							</td>
							<td> <!-- Palavra clicavel, direciona para a pagina de processamento da exclusao do produto do carrinho -->
								<a href="processa_retira_carrinho.php?cod_jaleco=<?php echo $registro[0]?>"> Retirar do Carrinho </a>
							</td>
						</tr>
						<?php
							}
						?>
					</table>
					
					<!-- Soma o valor total do carrinho -->
					<p>Valor total de compras: R$ <?php echo $valor_total; ?></p>
					
					<!-- Palavra clicavel, direciona o relatório de listagem dos produtos -->
					<p><a href="vendas.php"> Retornar para a listagem de produtos </a></p>
					
					<!-- Palavra clicavel, direciona para a finalizacao das vendas -->
					<p><a href="recibo_compras.php"> Finalizar venda </a></p>
					
					
				</div>
			</div>
		</div>

		<div id="rodape">
			<h4> Rua Guilherme Poerner, 1795, Blumenau, SC, Brasil </h4>
			<h4> 0800 724 2400 </h4>
		</div>
		
	</body>
</html>