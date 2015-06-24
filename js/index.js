var criteriOrden = "";
function init()
{
	busqueda(criteriOrden);
	recargarLOG();
}
function recargarLOG()
{
	$("#verdaderoContenedorLOG").slideUp("slow",function()
	{
		$.post("ssh.php",{},function (data)
		{
			$("#verdaderoContenedorLOG").html(data);
			$("#verdaderoContenedorLOG").slideDown("slow");
		});
	});
	
}
function busqueda(criterio)
{
	console.log("busqueda = " + $("#barraBusqueda").val().toLowerCase());
	
	$.post("grilla.php",{"metadatos":$("#barraBusqueda").val().toLowerCase() ,"orderBy": criterio},function(data)
	{
		$("#contenedor").html(data);
	});
}
function desplegarABM()
{
	if($("#ABM").css("width") == "600px")	//VACIAR:
	{
		$("#headerContenedorABM").html("");
		$("#verdaderoContenedorABM").html("");
		$("#verdaderoContenedorABM").css("display","none");
		$("#ABM").css("width","45px");

	}else		//LLENAR:
	{
		$("#ABM").css("width","600px");
		$.post("abm.html", {}, function(data)
		{
			$("#headerContenedorABM").html(data);
			selInicial();
			$("#verdaderoContenedorABM").css("display","block");
		});
		$.post("ADSL.php",{},function(data)
		{
			$("#verdaderoContenedorABM").html(data);
		});
		
	}
	
}
function desplegarLOG()
{
	if($("#log").css("width") == "600px")	//VACIAR:
	{
		$("#headerContenedorLOG").css("display","none");
		$("#verdaderoContenedorLOG").css("display","none");
		$("#log").css("width","45px");

	}else//LLENAR:
	{
		$("#log").css("width","600px");
		$("#verdaderoContenedorLOG").css("display","block");
		$("#headerContenedorLOG").css("display","block");
		
	}
}
function foc(quien)
{	//console.log(	$("#" + quien.id).val()		);
	if($("#" + quien.id).val().trim()  ==  $("#" + quien.id).data("text")	)
	{
		$("#" + quien.id).val("");
	}
}
function blu(quien)
{
	//console.log($("#" + quien.id).data("text"));
	if($("#" + quien.id).val().trim()  == "")
	{
		$("#" + quien.id).val($("#" + quien.id).data("text"));
	}	
}


function selInicial()
{
	//APAGO Y DOY BRILLO AL QUE USO:
		$("#selectADSL").css("box-shadow","inset -5px -5px 25px white");
		
		//TRAIGO DATOS:
		$.post("ADSL.php",{},function(data)
		{
			$("#verdaderoContenedorABM").html(data);
			$("#verdaderoContenedorABM").slideDown("slow");
		});
}
function sel(quien)
{
	if(quien == "adsl")
	{
		//APAGO Y DOY BRILLO AL QUE USO:
		$("#selectUsuario").css("box-shadow","inset 0px 0px 0px white");
		$("#selectADSL").css("box-shadow","inset -5px -5px 25px white");
		
		$("#verdaderoContenedorABM").slideUp("slow",function()
		{
			//TRAIGO DATOS:
			$.post("ADSL.php",{},function(data)
			{
				$("#verdaderoContenedorABM").html(data);
				$("#verdaderoContenedorABM").slideDown("slow");
			});
		});
	}
	else
	{
		//APAGO Y DOY BRILLO AL QUE USO:
		$("#selectADSL").css("box-shadow","inset 0px 0px 0px white");
		$("#selectUsuario").css("box-shadow","inset -5px -5px 25px white");
		
		//SLIDE:		
		$("#verdaderoContenedorABM").slideUp("slow",function()
		{
			//TRAIGO DATOS:
			$.post("USER.php",{},function(data)
			{
				$("#verdaderoContenedorABM").html(data);
				$("#verdaderoContenedorABM").slideDown("slow");
			});
			
		});
	}
	
}
function blu(quien)
{
	if(	$("#"+quien.id).val().trim() == "" || $("#"+quien.id).val().trim() == "adsl_"|| $("#"+quien.id).val().trim() == "adsl")
	{
		$("#"+quien.id).val(	$("#"+quien.id).data("text")	);
	}else
	{
		if(		$("#"+quien.id).val().trim() == ""	)
		{
			$("#"+quien.id).val(	$("#"+quien.id).data("text")	);
		}
	}

	
}
function foc(quien)
{
	
	if(quien.id == "inputNombreADSL" )
	{
		if(	$("#"+quien.id).val().trim() == $("#"+quien.id).data("text"))
		{
			$("#"+quien.id).val("adsl_");
		}
	}else
	{
		if(	$("#"+quien.id).val().trim() == $("#"+quien.id).data("text"))
		{
			$("#"+quien.id).val("");
		}
	}
}



function cerrarSesion()
{
	window.location ="sessionOUT.php";
}




/*ADSL*/

function green(campo)
{
	$("#" + campo.id ).css("border","solid 2px green");
}
function red(campo)
{
	$("#" + campo.id ).css("border","solid 2px red");
}
function comprobarNombreADSL(campo)
{
	salida = false;
	nombreAdsl = $("#" + campo.id).val().trim();
	//console.log("Nombre ADSL = " + nombreAdsl);
	
	if(nombreAdsl.startsWith('adsl_'))
	{
		salida = true;
		green(campo);
	}
	else
	{
		salida = false;
		red(campo);
	}
	if(salida == true)
	{
		$.ajax(
		{
			url:"existeUsuario.php",
			data:{"nombre":nombreAdsl},
			type:"POST",
			async:false,
			success: function(data)
			{
				//console.log("EXISTE = " + data );
				if(parseInt(data) > 0)
				{
					red(campo);
					salida = false;
				} else
				{
					green(campo);
					salida = true;
				}
			}
		});
	}else
	{
		salida = false;
		red(campo);
	}
	
	
	return salida;
}
function comprovarIP(campo)
{
	var salida = false;
	var ip = $("#" +  campo.id ).val();
	//console.log("Compruebo IP: "  + ip	);

	//UNA IP NO ES MAYOR A 15 DIGITOS:
	if(ip.length > 15 )
	{
		console.log("IP " + ìp +" es mayor a 15 digitos.");
		salida = false;
		red(campo);
	}
	else
	{
		salida = true;
		green(campo);
	}
	
	//VALORES ENTRE PUNTOS NUMERICOS , MAYORES QUE 0 y MENORES A 256
	if(salida == true)
	{
		var separado = ip.split(".");
		for(i =  0 ; i < separado.length ; i++)
		{
			if(parseInt(separado[i]) > 255 || parseInt(separado[i]) < 1 || isNaN(separado[i]))
			{
				console.log("LA IP NO ES NUMERICA.");
				salida = false;
				red(campo);
			}
		}
	}
	else
	{
		green(campo);
	}
	
	//COMPRUEBO SI YA EXISTE UNA IP IGUAL:
	if(salida == true)
	{
		$.ajax(
		{
			url:"existeIP.php",
			data:{"ip":ip},
			type:"POST",
			async:false,
			success: function(data)
			{
				if(parseInt(data) > 0)
				{
					red(campo);
					
					salida = false;	
					
					console.log("Ya existe una ip igual.");
				}else
				{
					green(campo);
					
					salida = true;	
					
					//console.log("IP COMPROVADA OK");
				}
			}
		});
	}
	return salida;
}
function comprovarObservaciones(campo)
{
	salida = false;
	//console.log("size = " + $("#inputObservacionADSL").val().length);
	if($("#"+ campo.id ).val().length > 3  && $("#"+ campo.id ).val() != $("#"+ campo.id ).data("text") )
	{
		observacionesOK = true;
		$("#"+ campo.id ).css("border", "solid 2px green");
		salida =true;
		//console.log("Paso  las obsevaciones");
	}
	else
	{
		$("#"+ campo.id ).css("border", "solid 2px red");
		salida = false;
	}
	return salida;
}
function submitADSL()
{
	
	campoIP = document.getElementById("direccionIP");
	campoNombreADSL = document.getElementById("inputNombreADSL");
	campoObservaciones = document.getElementById("inputObservacionADSL");
	
		console.log("---------------------------");
		console.log("comprovarip() = " + comprovarIP(campoIP));
		console.log("comprobarNombreADSL() = " + comprobarNombreADSL(campoNombreADSL));
		console.log("comprovarObservaciones() = " + comprovarObservaciones(campoObservaciones));
		
	
	if( comprovarIP(campoIP) && comprobarNombreADSL(campoNombreADSL) && comprovarObservaciones(campoObservaciones))
	{
		var nombre = $("#inputNombreADSL").val();
		var ip = $("#direccionIP").val();
		var observaciones = $("#inputObservacionADSL").val();
		console.log("NOMBRE = " + nombre +", IP = " + ip + ", OBS = " + observaciones);
		
		
		$.post("addADSL.php",{"nombre":nombre,"ip":ip,"observaciones":observaciones },function(data)
		{
			notificacion("ADSL Agregado");
			busqueda();
			sel("adsl");
			
		});
		console.log("submitié");
	}
	else
	{
		console.log("ERROR AL INTENTAR CARGAR ADSL, ESTADO:");
		console.log("ip = " + comprovarIP(campoIP));
		console.log("nombre = " + existeNombreADSL(campoNombreADSL));
		console.log("observaciones = " + comprovarObservaciones(campoObservaciones));
	}

}

/*USER*/
function usuariOK(campo)
{
	salida = false ;
	usuario = $("#" + campo.id ).val().trim();
	console.log(usuario);
	
	$.ajax(
	{
		url:"existeUsuario.php",
		type:'POST',
		data:{"nombre":usuario},
		async:false,
		success: function(data)
		{
			console.log("AJAX DATA: " + data);
			if(	(parseInt(data) > 0) || usuario == $("#" + campo.id ).data("text"))
			{
				$("#" + campo.id ).css("border","solid 2px red");
			
				salida = false;
			}
			else
			{
				$("#" + campo.id ).css("border","solid 2px green");
			
				salida = true;
			}
		}
	});
	console.log("USUARIO OK = " + salida);
	
	return salida;
}
function passwordOK(campo)
{
	salida = false;
	//console.log("CAMPO DEL PASSWORD = " + campo.id);
	//console.log("VALOR DEL CAMPO PASSWORD = " + $("#"+campo.id).val());
	//console.log("VALOR DEL CAMPO PASSWORD LENTGH = " + $("#"+campo.id).val().length);
	
	
	if( $("#"+campo.id).val().length > 6  &&  $("#"+campo.id).val().trim()  != $("#"+campo.id).data("text"))
	{
		salida = true;

		$("#"+campo.id).css("border", "solid 2px green");
	}
	else
	{
		salida = false;
		$("#"+campo.id).css("border", "solid 2px red");
	}
	return salida;
	
}
function submitUSER()
{
	
	campoUsuario = document.getElementById("inputNombreUsuario");
	campoPassword = document.getElementById("inputPasswordUsuario");
	

	if( usuariOK(campoUsuario) && passwordOK(campoPassword)) 
	{
		console.log("sumbmitié usuario");
		usuario = $("#inputNombreUsuario").val().trim();
		password = $("#inputPasswordUsuario").val().trim();
		
		//console.log( "USUARIO = " +  usuario + "| PASS = " + password);
		//MANDO:
		$.post("addUSER.php",{"usuario":usuario,"password":password },function(data)
		{
			console.log( data);
			busqueda();
			sel("adsl");
			notificacion("Usuario Agregado");
			
		});
	}
	else
	{
		console.log("ERROR DE SUBMIT");
		console.log("usuarioOK ?? = " + usuariOK(campoUsuario));
		console.log("passwordOK ?? = " +  passwordOK(campoPassword));
	}
}
function del(nombre)
{
	//console.log(nombre);
	var c = confirm("Borrar el " + nombre+"?");
	//console.log(c);
	if(c)
	{
		$.post("borrar.php",{"nombre":nombre},function(data)
		{
			console.log(data);
			busqueda();
		});
	}
}
function notificacion(texto)
{
	$("#notificacion").css("display","block");
	
	$("#notificacion").html(texto);
	
}
function closeNotificacion()
{
	$("#notificacion").slideUp("slow");
	
	$("#notificacion").css("display","none");
}