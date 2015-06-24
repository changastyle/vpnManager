<?PHP


$user = 'postgres';
$passwd = '';
$db = 'radius';
$port = 5432;
$credenciales = "user=postgres password=";
$host = '10.10.20.20';

$conexion = pg_connect(" host=" . $host ." port=" . $port ." dbname=" . $db ." ".$credenciales)or die("Error de Conexion ");

if(!$conexion)
{
	echo "conexion fallida";
}
else
{
	//echo "conexion exitosa";
}
function query($sql)
{
	global $conexion;
	$respuestas = array();
		
	$statement = pg_query($conexion,$sql)or die("ERROR al realizar SQL " .  $sql );
		
	//DEVUELVE CANTIDAD DE FILAS DE LA CONSULTA:	
	
	while($fila = pg_fetch_row($statement))
	{
		$arrayFila = array();
		for($i = 0 ; $i < sizeof($fila); $i++ )
		{
			array_push($arrayFila, $fila[$i]);
		}
		array_push($respuestas,$arrayFila);
	}
	return $respuestas;
}
function insert($sql)
{
	global $conexion;
	  
	$result = pg_query($sql); 
	
	return $result;
}
function insertMultiple($arrSQL)
{
	pg_query("BEGIN") or die("Could not start transaction\n");
	$res = true;
	
	foreach ($arrSQL as $sql)
	{
		$resAux = pg_query($sql)or die(pg_last_error());
		$res = $res and $resAux;
	}
	
	if($res)
	{
		pg_query("COMMIT") or die("Transaction commit failed\n");
	}
	else 
	{
   	 	echo "Rolling back transaction\n";
    	pg_query("ROLLBACK") or die("Transaction rollback failed\n");
	}
}

?>