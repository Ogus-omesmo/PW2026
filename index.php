<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> Exemplo php pw1 </title>
</head>
	<body>
		<?php
		try {
		//include_once"conexao.php";
		//require "conexao.php";
		//require_once"conexao.php";
		require "conexao.php";

		// ajustando a instru��o select para ordenar por produto
		$query = mysqli_query($conexao,"select * from tabelaimg order by produto");

		if (!$query) {
			die('Query Inválida: ' . @mysqli_error($conexao));  
		}

		echo "<table border='1px'>";
		echo '<tr><th width="30px" align="center">Id</th><th width="100px">C&oacute;digo</th><th width="250px">Produto</th><th width="100px">Valor</th><th width="100px">Produto</th><tr>';

		while($dados=mysqli_fetch_array($query)) 
		{
			echo "<tr>";
			echo "<td align='center'>". $dados['id']."</td>";
			echo "<td>". $dados['codigo']."</td>";
			echo "<td>". $dados['produto']."</td>";
			echo "<td align='right'> R$ ". $dados['valor']."</td>";		
			// buscando a na pasta imagem
			echo "<td><img src='imagens/".$dados['imagem']."'></td>";
			echo "</tr>";
			}
		echo "</table>";

		mysqli_close($conexao);
		} catch (Exception $e) {
			echo "<h2>Aconteceu um erro:<br>".
			$e->getMessage() ."</h2>";
			?>
	</body>
</html>
