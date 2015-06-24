<html>
	<head>
    	<link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/fonts/fonts.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/index.js"></script>
        <script>
        
		function verificarLogin(formulario)
		{
			usuario = $("#inputUsuario").val().trim();
			password = $("#inputsPassword").val().trim();
			console.log("USUARIO = " + usuario + ", Password = " + password +  " | FORMULARIO = " + formulario);
			
			if(usuario == "tacom" && password == "tecacc")
			{
				console.log("Ingrese" + $("#" +formulario.id ).html());
				$("#" +formulario.id ).submit();
			}else
			{
				$("#notificacionLogin").html("Usuario y contraseña invalidos.");
			}
		}
		function limpiarNotificacion()
		{
			$("#notificacionLogin").html("");
		}
		function enterLogin(event)
		{
			//console.log(event.charCode);
			if(event.charCode == 13)
			{
				verificarLogin("formularioLogin");
			}
		}
		$().ready(function(e)
		{
           $("#inputUsuario").keypress(function(event)
			{
				//console.log(event.charCode);
				if(event.charCode == 13)
				{
					verificarLogin(document.getElementById("formularioLogin"));
				}
			});
		   $("#inputsPassword").keypress(function(event)
			{
				//console.log(event.charCode);
				if(event.charCode == 13)
				{
					verificarLogin(document.getElementById("formularioLogin"));
				}
			});
        });
		
        </script>
        <style>
        #cuadroLogin
		{
			position:absolute;
			left:40%;
			right:40%;
			width:20%;
			height:250px;
			top:40%;
			
			background: #a9db80; /* Old browsers */
			background: -moz-linear-gradient(top,  #a9db80 0%, #96c56f 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#a9db80), color-stop(100%,#96c56f)); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top,  #a9db80 0%,#96c56f 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top,  #a9db80 0%,#96c56f 100%); /* Opera 11.10+ */
			background: -ms-linear-gradient(top,  #a9db80 0%,#96c56f 100%); /* IE10+ */
			background: linear-gradient(to bottom,  #a9db80 0%,#96c56f 100%); /* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a9db80', endColorstr='#96c56f',GradientType=0 ); /* IE6-9 */

			border-radius:5px;
		}
		.inputsLogin
		{
			width:96%;
			position:relative;
			left:2%;
			right:2%;
			padding:8px;
			margin-bottom:12px;
			font-family:Prototype;
			font-size:18px;
			text-align:center;
		}
		#notificacionLogin
		{
			font-family:Prototype;
			font-size:18px;
			font-style:italic;
			text-align:center;
			color:red;
		}
		#butLogin
		{
			position:absolute;
			bottom:5px;
		}
        </style>
    </head>
    <body onLoad="init()">
    	<div id="cuadroLogin">
        	<h3></h3>
            <form id="formularioLogin"action="sessionIN.php" method="post">
        	<input class="inputsLogin" id="inputUsuario" type="text" name ="nombreUsuario" value="Usuario" data-text="Usuario" onFocus="foc(this)" onblur="blu(this)" onclick="limpiarNotificacion()">
            <input class="inputsLogin" id="inputsPassword"  type="password" name="passwordUsuario" value="Password" data-text="Password" onFocus="foc(this)" onblur="blu(this)"
            onclick="limpiarNotificacion()" >
            </form>
            <div id="notificacionLogin"></div>
            <button class="inputsLogin" id="butLogin" onclick="verificarLogin(formularioLogin)">Ingresar</button>
        </div>
    </body>
</html>

