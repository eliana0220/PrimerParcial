<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">

<!-- disable iPhone inital scale -->
<meta name="viewport" content=" initial-scale=1.0">

<title>UTN FRA</title>

<!-- main css -->
<link href="css/style.css" rel="stylesheet" type="text/css">

<!-- media queries css -->
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link href="css/media-queries.css" rel="stylesheet" type="text/css">
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
 <link rel="icon" href="http://www.octavio.com.ar/favicon.ico">
<script type="text/javascript" src="FuncionesParcial.js"></script>
<script type="text/javascript" src="jquery.js"></script>

</head>

<body>

<div id="pagewrap">

	<header id="header">

		<hgroup>
			<h1 id="site-logo"><a href="#">Mascotas</a></h1>
		</hgroup>

		<!-- <nav>
			<ul id="main-nav" class="clearfix">
				<li><a onclick="MostarLogin()"  class="btn btn-primary"id="BotonLogin" >Login<br>-Sesión-</a> </li>
			</ul>
			<!-- /#main-nav 
		</nav> -->
	

	</header>
	<!-- /#header -->
	
	<form id="mascota" method = "POST" action = "nexoadministrador.php">
		<div id="content" >
		<table id="tabla">
			<tr> <th></th><th></th> </tr>
			<tr>
				<td>NOMBRE:</td> 
				<td><input type = "text"  name = "nombre"></td>
			</tr>
			<tr>
				<td>EDAD:</td>
				<td><input type = "text"  name = "edad"></td>
			</tr>
			<tr>
				<td>FECHA DE NACIMIENTO:</td> 
				<td><input type = "date"  name = "nac"></td> 
			</tr>
			<tr>
				<td>SEXO:</td>
				<td><input type = "radio"  name = "sexo" value = "Masculino">MASCULINO<br></td>
				<td><input type = "radio"  name = "sexo" value = "Femenino">FEMENINO<br></td>
			</tr>
			<!-- <tr>
				<td></td>
				<td></td>
			</tr> -->
			<!-- TIPO: 
				<select>
		  			<option id="tipo" value="perro">Perro</option>
		  			<option id="tipo" value="gato">Gato</option>
				</select>	
			<br> -->
			 
		</table>
			<input type = "submit" name = "accion" value = "Guardar" >
		</div>

		<div id="grillaMascotas">

			<?php
				require "mascota.php";
				$grilla = Mascota:: ConstruirGrillaMascotas();
				echo ($grilla);
			?>

		</div>	
	</form>
	<!-- /#content --> 
	
	
	<footer id="footer">
	
		<p>templete by <a href="http://www.octavio.com.ar">Octavio Villegas</a></p>

	</footer>
	<!-- /#footer --> 
	
</div>
<!-- /#pagewrap -->

</body>
</html>