<?php 

	class Mascota
	{
		public $nombre;
		public $edad;
		public $nacimiento;
		//public $tipo;
		public $sexo;

		//function __construct($nom, $ed, $nac, $tip, $sex)
		function __construct($nom, $ed, $nac, $sex)
		{
			$this->nombre = $nom;
			$this->edad = $ed;
			$this->nacimiento = $nac;
			//$this->tipo = $tip;
			$this->sexo = $sex;
		}

		public static function AltaMascota($mascota)
		{
			$archivo = fopen("ListaMascotas.txt", "a+");	
			//$renglon = $mascota->nombre . "|" . $mascota->edad . "|" . $mascota->nacimiento. "|" . $mascota->tipo . "|" . $mascota->sexo;
			$renglon = $mascota->nombre . "|" . $mascota->edad . "|" . $mascota->nacimiento. "|" . $mascota->sexo. "\r\n";
			fwrite($archivo, $renglon);
			fclose($archivo);
		} //cierre AltaMascota

		public function TraerListaMascotas()
		{
			$listaMascotas = array();

			$archivo=fopen("ListaMascotas.txt", "r");
			
			while(!feof($archivo))
			{
				$archAux = fgets($archivo);
				$mascota = explode("|", $archAux);
				$mascota[0] = trim($mascota[0]);
				if($mascota[0] != "")
				{
					//$listaMascotas[] = new Mascota($mascota[0], $mascota[1],$mascota[2],$mascota[3],$mascota[4]);
					$listaMascotas[] = new Mascota($mascota[0], $mascota[1],$mascota[2],$mascota[3]);
				}
			}
			fclose($archivo);
		
			return $listaMascotas;
		}

		public static function ConstruirGrillaMascotas()
		{

			$listaMascotas = Mascota::TraerListaMascotas();

			$grilla = '<table class="table">
							<tr>
								<th>  NOMBRE     		   </th>
								<th>  EDAD     	 		   </th>	
								<th>  FECHA DE NACIMIENTO  </th>								
								<th>  TIPO           	   </th>
								<th>  SEXO      	 	   </th>	
							</tr> 
						</thead>';   

			foreach ($listaMascotas as $mas)
			{
				$mascota = array();
				$mascota["nombre"] = $mas->nombre;
				$mascota["edad"] = $mas->edad;
				$mascota["nacimiento"] = $mas->nacimiento;
				$mascota["sexo"] = $mas->sexo;

				$mascota = json_encode($mascota);
		
				$grilla .= "<tr>
								<td>".$mas->nombre.    "</td>
								<td>".$mas->edad.      "</td>
								<td>".$mas->nacimiento."</td>
								
								<td>".$mas->sexo.  	   "</td>
								<td><input type='button' value='Eliminar' class='MiBotonUTN' id='btnEliminar' onclick='Borrar($mascota)' />
								<input type='button' value='Modificar' class='MiBotonUTN' id='btnModificar' onclick='Editar($mascota)' /></td>
							</tr>";
			}
		
			$grilla .= '</table>';		
		
			return $grilla;
		}//cierre ConstruirGrilla


		//$mascota = Mascota::TraerMascota($_POST['nombre']);	
		public static function TraerMascota ($nombre)
		{
			$listaMascotas = array();
			$archivo=fopen("ListaMascotas.txt", "r");
			
			while(!feof($archivo))
			{

				$archAux = fgets($archivo);
				$mascota = explode("|", $archAux);
				$mascota[0] = trim($mascota[0]);
				if($mascota[0] != "")
				{
					if ($mascota[0] == $nombre) 
					{
						$mascota[] = new Mascota($mascota[0], $mascota[1],$mascota[2], $mascota[3]);
						break;
					}
				}
			}
			fclose($archivo);
		
			return $mascota;
		}

		//$cantidad=$mascota->BorrarMascota();
		public function Borrar()
		{
			$mascotaBorar = Mascota:: TraerMascota ( $this->nombre);
			$listaMascotas = Mascota:: TraerListaMascotas();
			foreach ($listaMascotas as $mascota) 
			{
				if ($mascota[0] != $mascotaBorar[0]) 
				{
					unset($mascota);
				}
			}

   			$archivo=fopen("ListaMascotas.txt","w");
   			fclose($archivo);

			foreach ($listaMascotas as $mascota) 
			{
				Mascota:: AltaMascota ($mascota);
			}
		}

	}//cierre class Mascota

 ?>