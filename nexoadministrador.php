<?php 
	
	require "mascota.php";

	$accion = $_POST['accion'];

	switch ($accion) 
	{
		case 'Guardar': //$mascota = new Mascota($_POST['nombre'], $_POST['edad'], $_POST['nac'], $_POST['tipo'], $_POST['sexo']);
						$mascota = new Mascota($_POST['nombre'], $_POST['edad'], $_POST['nac'], $_POST['sexo']);
						Mascota:: AltaMascota($mascota);
						header("location:mascotassite.php");
						break;
		case 'MostarLogin':
			include("partes/formLogin.php");

		case 'Borrar':		var_dump("borro");
							$mascota = new mascota();
							$mascota->nombre=$_POST['nombre'];
							$cantidad=$mascota->BorrarMascota();
							echo $cantidad;
							break;

		case 'Editar':
						sleep(3);
						$mascota = Mascota::TraerMascota($_POST['nombre']);		
						echo json_encode($mascota) ;

		default:
			# code...
			break;
	}
?>