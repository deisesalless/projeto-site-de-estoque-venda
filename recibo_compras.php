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
				<h1> FINALIZAÇÃO DA VENDA </h1>
			</div>
			
			<div class="alinhar">
				<div id="menu_esquerda">
					<?php
						include "menu_local.php";
					?>
				</div>
		
				<div id="menu_direita">
				
					<?php
						$conectar = mysqli_connect ("localhost", "root", "", "banco_de_dados");			
						
						$data = date ('d/m/Y');
						$sql_registro_venda = "INSERT INTO vendas
												(data_venda)
												VALUES ('$data')";
												
						$resultado_registro_venda = mysqli_query ($conectar, $sql_registro_venda);
						
						$sql_consulta_ultima_venda = "SELECT cod_venda
						FROM vendas ORDER BY cod_venda DESC LIMIT 1";
						
						$resultado_consulta = mysqli_query ($conectar, $sql_consulta_ultima_venda);		
												
						$registro_cod_venda = mysqli_fetch_row ($resultado_consulta);
						
						
						// alteração na do campo chave estrangeira na tabela AMPLIFICADORES
						// servirá para saber em que venda está (ou estão) o(s) amplificador(es)
						
						$sql_codigo_venda_em_jalecos = "UPDATE jalecos
																SET vendas_cod_venda = '$registro_cod_venda[0]',
																    fila_comp_jaleco = 'Vendido'
																WHERE fila_comp_jaleco = 'Nao'";
																
						$resultado_alteracao_amp = mysqli_query ($conectar, $sql_codigo_venda_em_jalecos);
						
						$sql_consulta_recibo = "SELECT modelo_jaleco, descricao_jaleco, preco_jaleco FROM jalecos WHERE vendas_cod_venda = '$registro_cod_venda[0]'";
						
						$resultado_consulta = mysqli_query ($conectar, $sql_consulta_recibo);						
						echo "<p> Venda nº: $registro_cod_venda[0] </p>";
						echo "<p> Data: $data </p>";
					?>
					
					<table id="menu_centralizar" border=1>	
						<tr>
							<td> <p> Modelo </p> </td>
							<td> <p> Descrição </p> </td>
							<td> <p> Preço </p> </td>
						</tr>
						<?php	
							$valor_total = 0;
							while ($registro = mysqli_fetch_row($resultado_consulta))
							{
						?>
						<tr>
							<td> <?php echo $registro[0]; ?> </td>
							<td> <?php echo $registro[1]; ?> </td>
							<td> <?php echo $registro[2]; ?> </td>
						</tr>
						
						<?php
							$valor_total = $valor_total + $registro[2];
							}
						?>
					</table>
					
					<p>Valor total de compras: R$ <?php echo $valor_total; ?></p>
					<p><a href="vendas.php"> Finalizar venda </a></p>
	
				</div>
			</div>
		</div>

		<div id="rodape">
			<h4> Rua Guilherme Poerner, 1795, Blumenau, SC, Brasil </h4>
			<h4> 0800 724 2400 </h4>
		</div>
		
	</body>
</html>