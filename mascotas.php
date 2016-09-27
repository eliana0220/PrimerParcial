<?php 

	class Mascota
	{
		$nombre;
		$edad;
		$nacimiento;
		$tipo;
		$sexo;

		function __construct($nom, $ed, $nac, $tip, $sex)
		{	
			$this->nombre = $nom;
			$this->edad = $ed;
			$this->nacimiento = $nac;
			$this->tipo = $tip;
			$this->sexo = $sex;
		}

		public function AltaMascota($mascota)
		{
			$archivo = fopen("ListaMascotas.txt", "a+");	
			$renglon = $mascota->nombre . "|" . $mascota->edad . "|" . $mascota->nacimiento. "|" . $mascota->tipo . "|" . $mascota->sexo;
			fwrite($archivo, $renglon);
			fclose($archivo);
		} //cierre AltaMascota

	}//cierre class Mascota

 ?>