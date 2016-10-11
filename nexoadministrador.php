<?php 
	require "mascota.php";

	$accion = $_POST['accion'];
    //echo $accion;
	//var_dump($accion);
	switch ($accion) 
	{
		case 'MostrarLogin': 
							 header("location:mascotassite.php");
							 break;
		case 'Guardar': 
						//$mascota = new Mascota($_POST['nombre'], $_POST['edad'], $_POST['nac'], $_POST['tipo'], $_POST['sexo']);
						$mascota = new Mascota($_POST['nombre'], $_POST['edad'], $_POST['nac'], $_POST['sexo']);
						Mascota:: AltaMascota($mascota);
						header("location:mascotassite.php");
						break;

		case 'BorrarMascota':		
							$obj = isset($_POST['mascota']) ? json_decode(json_encode($_POST['mascota'])) : NULL;
							
							if(!Mascota::BorrarMascota($obj->nombre)){
								$retorno["Exito"] = FALSE;
								$retorno["Mensaje"] = "Lamentablemente ocurrio un error y no se pudo escribir en el archivo.";
							}
							else{
								$retorno["Mensaje"] = "El archivo fue escrito correctamente. PRODUCTO eliminado CORRECTAMENTE!!!";
							}
							header("location:mascotassite.php");
							//echo json_encode($retorno);
							break;

		case 'ModificarMascota':
								sleep(3);

								$obj = isset($_POST['mascota']) ? json_decode(json_encode($_POST['mascota'])) : NULL;
								$mascota = Mascota::ModificarMascota($obj->nombre);	
								$_POST["accion"] = "Guardar";
								break;

		case 'mostrarGrillaMascotas': 
									$grilla = Mascota:: ConstruirGrillaMascotas();
									echo ($grilla);
									break;

		default:
			# code...
			break;
	}
?>