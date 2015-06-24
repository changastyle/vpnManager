<?PHP include 'conexionPostrgres.php';

function resuelveUsuarioAdsl()
{
	$sql = "SELECT username FROM radcheck WHERE username LIKE '%adsl%' ORDER BY username ASC;";

	$arr = query($sql);
	
	$strMaximo = "";
	$maximo= 0;
	
	foreach($arr as $a)
	{
		$strMaximo = $a[0];
	}
	$maximo = intval(substr($strMaximo,5));
	$maximo ++;
	
	echo "adsl_" . $maximo;
}

function resuelveIP()
{
	global $conexion;
	$sql = "SELECT value FROM radreply WHERE username LIKE '%adsl%' and attribute LIKE 'Framed-IP-Address' ";

	$arr = pg_query($conexion,$sql);
	
	$strUltimaIp ;
	while ($fila = pg_fetch_row($arr))
	{
		for($i = 0 ; $i < sizeof($fila);$i++)
		{
			//echo $fila[$i];
			//echo "<br>";
			$strUltimaIp = $fila[$i];
		}
	}
	$aux = "";
	$contadorParteIp = 1 ;
	$ultimaIPparte1 = 0;
	$ultimaIPparte2 = 0;
	$ultimaIPparte3 = 0;
	$ultimaIPparte4 = 0;
	//echo "strlen($strUltimaIp)  = " . strlen($strUltimaIp) ."<br>";
	for($i = 0 ; $i < strlen($strUltimaIp);$i++)
	{
		
		if($strUltimaIp{$i} != '.' )
		{
			$aux .=  $strUltimaIp{$i};
			//echo $strUltimaIp{$i};
		}
		if($strUltimaIp{$i} == '.' || ($i+1) == strlen($strUltimaIp))
		{
			if($contadorParteIp == 1){ $ultimaIPparte1 = intval($aux);$contadorParteIp++; $aux = "";}
			elseif($contadorParteIp == 2){ $ultimaIPparte2 = intval($aux);$contadorParteIp++; $aux = "";}
			elseif($contadorParteIp == 3){ $ultimaIPparte3 = intval($aux);$contadorParteIp++; $aux = "";}
			elseif($contadorParteIp == 4){ $ultimaIPparte4 = intval($aux);$contadorParteIp++; $aux = "";}
			//echo "<br>";
		}
		
	}
	$ultimaIPparte4 = $ultimaIPparte4 + 1;
	//echo "Ultima IP = ". $strUltimaIp ."<br>";
	//echo "Proxima IP = ".$ultimaIPparte1 . " . " . $ultimaIPparte2 ." . " .$ultimaIPparte3 . " . " .$ultimaIPparte4;
	return $ultimaIPparte1 . "." . $ultimaIPparte2 ."." .$ultimaIPparte3 . "." .$ultimaIPparte4;
}
?>