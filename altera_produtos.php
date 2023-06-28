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
				<h1> ALTERAÇÃO DOS PRODUTOS - JALECOS </h1>
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
						
						$registro = mysqli_fetch_row($resultado_pesquisa);
					?>
					
					<!-- Formulario para exibir os dados que estão disponíveis no Banco de Dados -->
					<!-- E assim facilitar ao usuario a correção do que deseja alterar -->
					<form method="post" action="processa_altera_produtos.php" enctype="multipart/form-data">
						<input type="hidden" name="cod_jaleco" value="<?php echo "$cod_jaleco"; ?>">
						<table class="centralizar">	
							<tr>
								<tr>
									<td> Modelo: </td>
									<td> <input type="text" name="modelo" required value="<?php echo "$registro[1]"; ?>" > </td>
								</tr>

								<tr>
									<td> Descrição: </td>
									<td> <input type="text" name="descricao" required value="<?php echo "$registro[2]"; ?>" > </td>
								</tr>								

								<tr>
									<td> Preço: </td>
									<td> <input type="text" name="preco" required value="<?php echo "$registro[4]"; ?>" > </td>
								</tr>
								
								<tr>
									<td> Tamanho: </td>
									<td> 
										<select name="tamanho">
											<option value="P">
												<?php
													if ($registro[3] == "P") {
														echo "";
													}
												?> P
											</option>
											<option value="M">
												<?php
													if ($registro[3] == "M") {
														echo "";
													}
												?> M
											</option>
											<option value="G">
												<?php
													if ($registro[3] == "G") {
														echo "";
													}
												?> G
											</option>
											<option value="GG">
												<?php
													if ($registro[3] == "GG") {
														echo "";
													}
												?> GG
											</option>
										</select>
									</td>
								</tr>
								
								<tr>
									<td> Foto: </td>
									<td> <input name="foto" type="file"/> </td>
								</tr>

							<tr>
								<td colspan="5"> <!-- Botao de confirmar a alteracao -->
									<p> <input type="submit" value="Alterar Produto"> </p>
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