<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/layout.css">
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
		</div>

		<div id="principal">
			<h1> LOGIN </h1>
			<form method="post" action="processa_login.php">
				<p>
					Usuário: <br>
				<input type="text" name="login" required>
				</p>
				<p>
					Senha: <br>
					<input type="password" name="senha" required>
				</p>
				<p>
					<input type="submit" value="Entrar">
				</p>
			</form>
		</div>
		
		<div id="rodape">
			<h4> Rua Guilherme Poerner, 1795, Blumenau, SC, Brasil </h4>
			<h4> 0800 724 2400 </h4>
		</div>
		
	</body>
</html>