<html>
	<head>
    	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
    	<link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/fonts/fonts.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/index.js"></script>
		<?PHP 
			session_start();
			@$usuario =  $_SESSION['usuario'];
		?>
        <style>
		#cuadroPerfil
		{
			background-color:white;
			border:solid 2px black;
			display:inline-block;
			position:absolute;
			right:10px;
			border-radius:5px;
			text-decoration:none;
			color:black;
			padding-right:45px;
		}
		#butCerrarSesion
		{
			position:absolute;
			right:5px;
			width:30px;
			height:80%;
			top:10%;
			bottom:10%;
		}
        </style>
    </head>
    <body onLoad="init()">
		<?PHP if($usuario != NULL){?>
        
        <div id="banner">
        	TACOM VPN Manager
           	<div id="cuadroPerfil">
				<?PHP echo $usuario;?>
                <button id="butCerrarSesion" onClick="cerrarSesion()">x</button>
            </div>
		</div>
        
        <div id="buscador">
            <input type="text" id='barraBusqueda' onchange="busqueda('')" onKeyUp="busqueda('')">
            <button clasS="botones" id='botonBuscar'  onClick="busqueda(')">Buscar</button>
        </div>
        
        <div id="contenedor">
        </div>
        
        <div id="ABM" >
            <div id="contenedorABM">
                <div id="desdesplegadorABM" onclick="desplegarABM()"> <div id="verticalText"> A<br> L<br>  T<br> A<br> S<br></div></div>
                <div id="headerContenedorABM">
                </div>
                <div id="verdaderoContenedorABM"></div>
            </div>
        </div>
        <div id="log">
            <div id="desdesplegadorLOG" onclick="desplegarLOG()"> <div id="verticalText"> L<br> O<br> G</div></div>
            <div class="invisibles" id="headerContenedorLOG">
            	<button class="botones invisibles" id="botonRecargarLog" onclick="recargarLOG()">Reload</button>
            </div>
            <div id="verdaderoContenedorLOG"  class="invisibles">
            </div> 
        </div>     
        <?PHP }else{echo "<div id='banner'>No estas logeado <a id='cuadroPerfil' href='index.php'>Volver a login</a></div>";} ?>
    	
        <div id="notificacion" onclick="closeNotificacion()"></div>
            
        

    </body>
</html>

