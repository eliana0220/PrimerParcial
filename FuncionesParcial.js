$(document).ready(function(){
	
	MostrarGrillaMascotas();
	
});

function validarLogin()
{
		var ingreso_ok='';
		var varUsuario=$("#nombre").val();
		var varClave=$("#clave").val();
		var recordar=$("#recordarme").is(':checked');
		
$("#informe").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");

	var funcionAjax=$.ajax({
		url:"php/validarUsuario.php",
		type:"post",
		data:{
			recordarme:recordar,
			nombre:varUsuario,
			clave:varClave
		},
		success: function(retorno) {
        //console.log(result);
        if (retorno == "ingreso")  {
        	document.location.href="mascotassite.php";
        	}
        else{
        		$("#informe").html("usuario o clave incorrecta");	
				$("#formLogin").addClass("animated bounceInLeft");
        	}
        }
	});

//alert('Redirec');
//window.location.replace("www.google.com.ar");
//location.href = "mascotassite.php";
/*window.open("mascotassite.php");*/
//return true;

  /*funcionAjax.done(function(retorno){
		alert(retorno);
	 });*/

/*	funcionAjax.done(function(retorno){
		alert(retorno);
			if(retorno!="No-esta"){	
				// MostarBotones();
				MostarLogin();

				$("#BotonLogin").html("Ir a salir<br>-Sesión-");
				$("#BotonLogin").addClass("btn btn-danger");				
				$("#usuario").val("usuario: "+retorno);
			}else
			{
				$("#informe").html("usuario o clave incorrecta");	
				$("#formLogin").addClass("animated bounceInLeft");
			}
			if (retorno == "ingreso") 
			{
				alert('Redirec');
				//window.location.href = "http://localhost:8080/PrimerParcial/mascotassite.php";
				//window.location.assign("http://localhost:8080/PrimerParcial/mascotassite.php");
				ingreso_ok = 'X';
				//window.open("mascotassite.php");
				//window.location="http://localhost:8080/PrimerParcial/mascotassite.php";
			}
	});
	// funcionAjax.fail(function(retorno){
	// 	$("#botonesABM").html(":(");
	// 	$("#informe").html(retorno.responseText);	
	// });
	alert('tttttt');
	if (ingreso_ok =='X')
	{
		window.open("mascotassite.php");
	}*/	
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
/*	var funcionAjax=$.ajax({ss
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
 	 alert('tEST');
 	 var pagina = "test.php";

	$.ajax({ 
		type: "POST",
		url: 'nexoadministrador.php',
		data: { accion : "MostrarLogin"}
		/*success: function (html) {
              alert('successful : ' + html);
              $("#result").html("Successful");
          },
          error: function(data, errorThrown)
          {
              alert('request failed :'+errorThrown);
          }*/
		});
/*	.then(function si(exito)
	{	
		$("#principal").html(exito);
	},
	function no(error)
	{
		alert("ERROR!");
	})*/
}

function BorrarMascota(mascota)
{
	//alert("borras");
		var funcionAjax=$.ajax({
		url:"nexoadministrador.php",
		type:"post",
		data:{
			accion:"BorrarMascota",
			mascota:mascota	
		}
	});
	funcionAjax.done(function(retorno){
		alert(retorno);
		//MostrarGrillaMascotas();
		//$("#grillaMascotas").html(grilla);
		// Mostrar("MostrarGrilla");
		// $("#informe").html("cantidad de eliminados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}

/*function ModificarMascota(mascota)
{
	alert("ajax modificar");
	/*var varNombre=$("#nombre").val();
	var varEdad=$("#edad").val();
	var varNac=$("#nac").val();
	var varSexo=$("#sexo").val();*/
	
	/*$("#nombre").val(mascota.nombre);
	$("#edad").val(mascota.edad);
	$("#nac").val(mascota.nac);
	$("#sexo").val(mascota.sexo);
	var funcionAjax=$.ajax({
		//url:"nexoadministrador.php",
		url:"mascotassite.php",
		type:"post",
		data:{
			nombre:varNombre,
			edad:varEdad,
			nac:varNac,
			sexo:varSexo,
			accion:"ModificarMascota",
			mascota:mascota	
		},
		success: function (data) {
              alert('successful : ' + html);
              $("#content").html(response);
          }
	});
	funcionAjax.then(function (mascota)
	{	
		alert("ingreso a then");
		alert(mascota);
		$("#mascota").html(exito);
	});
	//funcionAjax.done(function(retorno){
					/*Mostrar("MostrarFormAlta");
					
					setTimeout(function(){

					var cd =JSON.parse(retorno);			
					$("#idCD").val(cd.id);
					$("#cantante").val(cd.cantante);
					$("#titulo").val(cd.titulo);
					$("#anio").val(cd.año);
				 	alert("llego");


						 }, 3000);*/
					
		


	//});
	/*funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	





	}); }*/

	function ModificarMascota(mascota)
{
		//alert ("entro a ESSSSSSSSSTA!");
	$("#nombre").val(mascota.nombre);
	$("#edad").val(mascota.edad);
	$("#nac").val(mascota.nacimiento);
	$("#sexo").val(mascota.sexo);
	alert("ajax modificar");
	var funcionAjax=$.ajax({
		url:"nexoadministrador.php",
		type:"post",
		data:{
			accion:"ModificarMascota",
			mascota:mascota	
		}
	});
	funcionAjax.then(function (mascota)
	{	},
	function no (retorno)
	{
		alert("EXPLOTO MEN!!");
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	

	}); }

function MostrarGrillaMascotas(){
	
    var pagina = "./nexoadministrador.php";
    //var pagina = "mascotassite.php";

	$.ajax({
        type: 'POST',
        url: pagina,
		data : { accion : "mostrarGrillaMascotas"},
        dataType: "html",
        async: true
    } 
   //success: function (html) {
    //          $("#grillaMascotas").html(grilla);
    //      }
    )
	.done(function (grilla) {

		$("#grillaMascotas").html(grilla);
	})
	.fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });   
}