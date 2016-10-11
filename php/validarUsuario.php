<?php 
session_start();
$usuario=$_POST['nombre'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];

if($usuario=="octavio@admin.com.ar" && $clave=="1234")
{			
/*	var_dump($_SESSION);*/
	if($recordar=="true")
	{
		setcookie("registro",$usuario,  time()+36000 , '/');
		
	}else
	{
		setcookie("registro",$usuario,  time()-36000 , '/');
		
	}
	$_SESSION['registrado']="octavio";
	$retorno="ingreso";

	
}else
{
	$retorno= "No-esta";
}

echo $retorno;
?>