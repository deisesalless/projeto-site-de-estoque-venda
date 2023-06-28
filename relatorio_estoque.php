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
				<h1> RELATÓRIO DO ESTOQUE </h1>
			</div>
			
			<div id="menu_centralizar">
				<?php
					$conectar = mysqli_connect ("localhost", "root", "", "banco_de_dados");			
					
					$sql_consulta = "SELECT cod_jaleco, modelo_jaleco, descricao_jaleco, tamanho_jaleco, preco_jaleco, foto_jaleco FROM jalecos WHERE vendas_cod_venda IS NULL AND fila_comp_jaleco = 'Sim'";
					
					$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
				?>
				
				<table id="menu_centralizar" border=1>	
					<tr>
						<td> <p> Modelo </p> </td>
						<td> <p> Descrição </p> </td>
						<td> <p> Tamanho </p> </td>
						<td> <p> Preço </p> </td>
						<td> <p> Exibir </p> </td>
					</tr>
					<?php	
						while ($registro = mysqli_fetch_row($resultado_consulta))
						{
					?>
					<tr>
						<td> <?php echo $registro[1]; ?> </td>
						<td> <?php echo $registro[2]; ?> </td>
						<td> <?php echo $registro[3]; ?> </td>
						<td> <?php echo $registro[4]; ?> </td>
						<td>
							<a href="exibe_produtos.php?cod_jaleco=<?php echo $registro[0]?>"> Foto </a>
						</td>
					</tr>
					<?php
						}
					?>
				</table>	
				
					<p><a href="relatorios.php">Voltar</a></p>
			</div>
		</div>

		<div id="rodape">
			<h4> Rua Guilherme Poerner, 1795, Blumenau, SC, Brasil </h4>
			<h4> 0800 724 2400 </h4>
		</div>
		
	</body>
</html>