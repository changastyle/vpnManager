<head>
	<link rel="Stylesheet" href="css/adsl.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/index.js"></script>
</head>
<body>
<div class="h3">Valores Sugeridos para Usuario:</div>
	<input class="inputADSL" type="text" name="nombreUsuario" id="inputNombreUsuario" data-text="Nombre Usuario" value ="Nombre Usuario" onFocus="foc(this)" onBlur="blu(this)" 				onKeyDown="usuariOK(this)" onKeyUp="usuariOK(this)" >
    
	<input class="inputADSL" type="password" name="passwordUsuario" id="inputPasswordUsuario" data-text="cambiame" value ="cambiame"  onFocus="foc(this)" onBlur="blu(this)"
    onKeyDown="passwordOK(this)" onKeyUp="passwordOK(this)" >
    
	<button class="botones" id="butSubmitUSER" onclick="submitUSER()">Agregar Usuario</button>
</body>
	