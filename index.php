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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/funcionesAjax.js"></script>
<script type="text/javascript" src="js/funcionesLogin.js"></script> -->
<script type="text/javascript" src="FuncionesParcial.js"></script>
<script type="text/javascript" src="jquery.js"></script>
</head>

<body>

<div id="pagewrap">

	<header id="header">

		<hgroup>
			<h1 id="site-logo"><a href="#">Bienvenido</a></h1>
			<h2 id="site-description">Ingrese</h2>
		</hgroup>

<!-- 		<nav>
			<ul id="main-nav" class="clearfix">
				<li><a onclick="MostarLogin()"  class="btn btn-primary"id="BotonLogin" >Login<br>-Sesión-</a> </li>
			</ul>
		</nav> -->

<!-- 		<form id="searchform" method = "POST" >

			<input type="search" id="usuario" readonly placeholder="Sin Usuario">

		</form>  -->

	</header>
	<!-- /#header -->
	

    <div align="center">
		NOMBRE:     <input type = "text"  name = "nombre" id="nombre"><br>
		CONTRASEÑA: <input type = "text" name "clave" id="clave"><br>
		RECORDARME: <input type= "checkbox" name = "recordarme" id="checkbox"><br>
		<input type = "submit" name = "accion" onclick="validarLogin()">
 	</div>
	
	<footer id="footer">
	
		<p>Template by <a href="http://www.octavio.com.ar"> Octavio Villegas</a></p>

	</footer>
	<!-- /#footer --> 
	
</div>
<!-- /#pagewrap -->

</body>
</html>