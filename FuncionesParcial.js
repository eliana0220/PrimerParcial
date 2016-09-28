function validarLogin()
{
		var varUsuario=$("#correo").val();
		var varClave=$("#clave").val();
		var recordar=$("#recordarme").is(':checked');
		
$("#informe").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");
	

	var funcionAjax=$.ajax({
		url:"php/validarUsuario.php",
		type:"post",
		data:{
			recordarme:recordar,
			usuario:varUsuario,
			clave:varClave
		}
	});


	funcionAjax.done(function(retorno){
		//alert(retorno);
			if(retorno!="No-esta"){	
				MostarBotones();
				MostarLogin();

				$("#BotonLogin").html("Ir a salir<br>-Sesión-");
				$("#BotonLogin").addClass("btn btn-danger");				
				$("#usuario").val("usuario: "+retorno);
			}else
			{
				$("#informe").html("usuario o clave incorrecta");	
				$("#formLogin").addClass("animated bounceInLeft");
			}
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	
}
function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
			MostarBotones();
			MostarLogin();
			$("#usuario").val("Sin usuario.");
			$("#BotonLogin").html("Login<br>-Sesión-");
			$("#BotonLogin").removeClass("btn-danger");
			$("#BotonLogin").addClass("btn-primary");
			
	});	
}
function MostarBotones()
{		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexoadministrador.php",
		type:"post",
		data:{queHacer:"MostarBotones"}
	});
	funcionAjax.done(function(retorno){
		$("#botonesABM").html(retorno);
		//$("#informe").html("Correcto BOTONES!!!");	
	});
}

function MostarLogin()
{
		//alert(queMostrar);
/*	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarLogin"}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto Form login!!!");	
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
*/
	$.ajax({
		url :"nexoadministrador.php",
		type : "post",
		data: {accion:"MostrarLogin"}
		})
	.then(function si(exito)
	{	
		$("#principal").html(exito);
	},
	function no(error)
	{
		alert("ERROR!");
	});
}

function Borrar(mascota)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexoadministrador.php",
		type:"post",
		data:{
			accion:"Borrar",
			mascota:mascota	
		}
	});
	funcionAjax.done(function(retorno){
		Mostrar("MostrarGrilla");
		$("#informe").html("cantidad de eliminados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}

function Editar(mascota)
{
	var funcionAjax=$.ajax({
		url:"nexoadministrador.php",
		type:"post",
		data:{
			accion:"Editar",
			mascota:mascota	
		}
	});
	funcionAjax.done(function(retorno){
					Mostrar("MostrarFormAlta");
					
					setTimeout(function(){

					var cd =JSON.parse(retorno);			
					$("#idCD").val(cd.id);
					$("#cantante").val(cd.cantante);
					$("#titulo").val(cd.titulo);
					$("#anio").val(cd.año);
				 	alert("llego");


						 }, 3000);
					
		


	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	





	});