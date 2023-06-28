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
				<h1> LISTA DOS PRODUTOS </h1>
			</div>
			
			<!-- Exibe o manu da página -->
			<div class="alinhar">
				<div id="menu_esquerda">
					<?php
						include "menu_local.php";
					?>
				</div>
		
				<div id="menu_direita">
				
					<!-- Conexão e busca no Banco de Dados -->
					<?php
						$conectar = mysqli_connect ("localhost", "root", "", "banco_de_dados");			
			
						$sql_consulta = "SELECT cod_jaleco, modelo_jaleco, descricao_jaleco, tamanho_jaleco, preco_jaleco, foto_jaleco, fila_comp_jaleco FROM jalecos";
						$resultado_consulta = mysqli_query ($conectar, $sql_consulta);	
					?>
					
					<!-- Redireciona para a página de cadastro do produto -->
					<p><a href="cadastra_produtos.php"> Cadastrar Produto </a></p>
					
					<table id="menu_centralizar" border=1>	
						<tr>
							<td> <p> Modelo </p> </td>
							<td> <p> Descrição </p> </td>
							<td> <p> Tamanho </p> </td>
							<td> <p> Preço </p> </td>
							<td> <p> Disponibilidade </p> </td>
							<td> <p> Exibir </p> </td>
							<td> <p> Ação </p> </td>
						</tr>
						
						<!-- Looping de consulta no BD e o resultado atribuido a uma variavel -->
						<?php
							while ($registro = mysqli_fetch_row($resultado_consulta))
							{
						?>						
						<tr>
							<td> <p> <?php echo $registro[1]; ?> </p> </td>	
							<td> <p> <?php echo $registro[2]; ?> </p> </td>
							<td> <p> <?php echo $registro[3]; ?> </p> </td>
							<td> <p> <?php echo $registro[4]; ?> </p> </td>
							<td> <p> <?php echo $registro[6]; ?> </p> </td>
							
							<td>
								<p>
									<!-- Exibe foto do produto, palavra clicavel -->
									<a href="exibe_produtos.php?cod_jaleco=<?php echo $registro[0]?>"> 
										Foto
									</a>										
								</p>
							</td>
							
							<td>
								<p>
									<!-- Redireciona para alteração do produto, palavra clicavel -->
									<a href="altera_produtos.php?cod_jaleco=<?php echo $registro[0]?>"> Alterar </a>
								</p>
							</td>
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