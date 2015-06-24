<head>
    <link rel="Stylesheet" href="css/adsl.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/fonts/fonts.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <?PHP include 'backendADSL.php';?>
</head>

<div class="h3">Valores Sugeridos para ADSL:</div>

<input class="inputADSL" type="text" name="nombreADSL" id="inputNombreADSL" data-text="<?php resuelveUsuarioAdsl() ?>" value ="<?php resuelveUsuarioAdsl() ?>" onfocus="foc(this)"onBlur="blu(this)" onKeyDown="comprobarNombreADSL(this)" onKeyUp="comprobarNombreADSL(this)">

<input class="inputADSL" type="text" name="direccionIP" id="direccionIP" data-text="<?PHP echo resuelveIP(); ?>" value ="<?PHP echo resuelveIP(); ?>" onkeydown="comprovarIP(this)" onkeyup="comprovarIP(this)"onfocus="foc(this)"onBlur="blu(this)">

<input class="inputADSL" type="text" name="Observacion" id="inputObservacionADSL" data-text="Observaciones" value ="Observaciones" onfocus="foc(this)"onBlur="blu(this)" onkeydown="comprovarObservaciones(this)" onkeyup="comprovarObservaciones(this)">

<button class="botones" id="butSubmitADSL" onclick="submitADSL()">Agregar ADSL </button>

<br>