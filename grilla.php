<link rel="Styleshet" href="css/index.css">
<script src="js/index.js"></script>
<?PHP
	include 'conexionPostrgres.php';
	include 'metodosDeGrilla.php';
	
	@$metadatos = $_POST['metadatos'];
	@$orderBy = $_POST['orderBy'];


	$sql = "SELECT radcheck.id, radcheck.username, radcheck.attribute, radcheck.observaciones, radreply.value FROM radcheck INNER JOIN radreply ON radcheck.username = radreply.username";
	
	if($metadatos == "" && $orderBy == "")
	{
		$sql .= "";
	}
	else if($metadatos == "" && $orderBy !="")
	{
		$sql .= " ORDER BY ".$orderBy." ASC";
	}
	else if($metadatos != "" && $orderBy =="")
	{
		$sql .= " WHERE lower(radcheck.username) LIKE '%" . $metadatos . "%' ";
		$sql .= " OR lower(radcheck.observaciones) LIKE '%" . $metadatos . "%'";
		$sql .= " OR lower(radreply.value) LIKE '%" . $metadatos . "%'";
		/*if(!is_nan($metadatos))
		{
			$sql .= " OR radcheck.id = ".$metadatos.";";
		}*/
		
	}
	else if($metadatos != "" && $orderBy !="")
	{
		$sql = "SELECT radcheck.id, radcheck.username, radcheck.observaciones, radreply.value FROM radcheck INNER JOIN radreply ON radcheck.username = radreply.username";
		$sql .= " WHERE lower(radcheck.username) LIKE '%" . $metadatos . "%' ";
		$sql .= " OR lower(radcheck.observaciones) LIKE '%" . $metadatos . "%'";
		$sql .= " OR lower(radreply.value) LIKE '%" . $metadatos . "%'";
		/*if(!is_nan($metadatos))
		{
			$sql .= " OR radcheck.id = ".$metadatos.";";
		}*/
		$sql .= " ORDER BY ".$orderBy." ASC";
	}
	
	/*echo "<h3>RECIBÍ:</H3>";
	echo "metadatos= " . $metadatos;
	echo "<br>";
	echo "orderBy= " . $orderBy;
	echo "<br>";
	*/
	
	$arr = query($sql);
	$contadorParidad = 1;
?>
<table>
    <td class='th grillarow0'><a class="enlace" href="javascript:busqueda('radcheck.id')">ID</a></td>
    <td class='th'><a class="enlace"  href="javascript:busqueda('radcheck.username')">Usuario</a></td>
    <td class='th'><a class="enlace" href="javascript:busqueda('radcheck.observaciones')">Observaciones</a></td>
    <td class='th'><a class="enlace" href="javascript:busqueda('radreply.value')">Direccion IP</a></td>
    <td class='th grillarow5'>Del/Upd</td>
	<?PHP
	
	//print_r($arr);
	
	foreach($arr as $a)
	{
		/*if( !esNasIP($a))
		{
			echo esNasIP($a) . "-> " .$a[1] ."<br>" ;
		}*/
		if(esUsuarioYNoMascara($a) && !esNasIP($a))
		{
			echo "<tr>";
			
			//PARIDAD PARA COLORES DE LA FILA:
			if($contadorParidad % 2)
			{
				$paridad = "Par";
			}
			else
			{
				$paridad = "Impar";
			}
			imprimirFila($a,$paridad);
			
			echo "</tr>";
			$contadorParidad++;
		}
	}
    ?>
</table>



