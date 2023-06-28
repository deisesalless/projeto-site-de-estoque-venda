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
				<h1> EXIBIÇÃO DOS PRODUTOS </h1>
			</div>
			
			<!-- Exibe o manu da página -->
			<div class="alinhar">
				<div id="menu_esquerda">
					<?php
						include "menu_local.php";
					?>
				</div>
			
				<!-- Conexão e busca no Banco de Dados -->
				<div id="menu_direita">
					<?php		
						$conectar = mysqli_connect ("localhost", "root", "", "banco_de_dados");
						
						$cod_jaleco = $_GET["cod_jaleco"];
						
						$sql_pesquisa = "SELECT cod_jaleco, modelo_jaleco, descricao_jaleco, tamanho_jaleco, preco_jaleco, foto_jaleco
											  FROM jalecos
											  WHERE cod_jaleco = '$cod_jaleco'";
											  
						$resultado_pesquisa = mysqli_query ($conectar, $sql_pesquisa);

						$registro_amp = mysqli_fetch_row($resultado_pesquisa);
					?>
					
					<table class="centralizar">
						<tr>
							<img src="<?php echo "$registro_amp[5]"; ?>"> <!-- Exibe a foto do produto -->
						</tr>
						<tr>
							<?php
								echo "<p> Modelo: $registro_amp[1] </p>"; // Exibe o modelo do produto
								echo "<p> Descricao: $registro_amp[2]</p>";	 // Exibe a descricao do produto					
							?>
						</tr>
						<tr>
							<?php
								echo "<p> Tamanho: $registro_amp[3] </p>"; // Exibe o tamanho do produto
								echo "<p> Preço: $registro_amp[4]</p>"; // Exibe o preco do produto				
							?>
						</tr>
					</table>
					
				</div>
			</div>
		</div>
		
		<div id="rodape">
			<h4> Rua Guilherme Poerner, 1795, Blumenau, SC, Brasil </h4>
			<h4> 0800 724 2400 </h4>
		</div>
		
	</body>
</html>