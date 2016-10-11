<!-- <script type="text/javascript" src="FuncionesParcial.js"></script>	
<script type="text/javascript" src="jquery.js"></script> -->
<?php 
	require "mascota.php";

	$accion = $_POST['accion'];
    echo $accion;
	var_dump($accion);
	switch ($accion) 
	{
		case 'MostrarLogin': 
							 header("location:mascotassite.php");
							 break;
		case 'Guardar': //$mascota = new Mascota($_POST['nombre'], $_POST['edad'], $_POST['nac'], $_POST['tipo'], $_POST['sexo']);
						$mascota = new Mascota($_POST['nombre'], $_POST['edad'], $_POST['nac'], $_POST['sexo']);
						Mascota:: AltaMascota($mascota);
						header("location:mascotassite.php");
						break;
		/*case 'MostarLogin':
			include("partes/formLogin.php");*/

		case 'BorrarMascota':	
							
							echo 'nhnnbftvvvrdvvddr';
							var_dump('LLLEGAAAAAMO');	
							$obj = isset($_POST['mascota']) ? json_decode(json_encode($_POST['mascota'])) : NULL;
							
							if(!Mascota::BorrarMascota($obj->nombre)){
								$retorno["Exito"] = FALSE;
								$retorno["Mensaje"] = "Lamentablemente ocurrio un error y no se pudo escribir en el archivo.";
							}
							else{
								$retorno["Mensaje"] = "El archivo fue escrito correctamente. PRODUCTO eliminado CORRECTAMENTE!!!";
							}
							
							echo json_encode($retorno);
							break;

		case 'ModificarMascota':
						var_dump("nexo modificar");
						sleep(3);

						$obj = isset($_POST['mascota']) ? json_decode(json_encode($_POST['mascota'])) : NULL;
						$mascota = Mascota::ModificarMascota($obj->nombre);	
						var_dump($mascota);	
						$_POST["nombre"] =$mascota->nombre;
						$_POST["edad"] =$mascota->edad;
						$_POST["nac"] =$mascota->nac;
						$_POST["sexo"] =$mascota->sexo;
						var_dump("POST");
						var_dump($_POST);
						echo json_encode($mascota) ;

		case 'mostrarGrillaMascotas': 
										//require "mascota.php";
										//sleep(5);
										$grilla = Mascota:: ConstruirGrillaMascotas();
										echo ($grilla);
										//header("location:mascotassite.php");
										break;

		default:
			# code...
			break;
	}
?>