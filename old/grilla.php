<link rel="Styleshet" href="css/index.css">
<script src="js/index.js"></script>
<?PHP
	$metadatos = $_POST['metadatos'];
	include 'conexionPostrgres.php';
	
	if($metadatos == "")
	{
		$sql = "SELECT radcheck.id, radcheck.username, radcheck.observaciones, radreply.value FROM radcheck INNER JOIN radreply ON radcheck.username = radreply.username";
	}else
	{
		$sql = "SELECT radcheck.id, radcheck.username, radcheck.observaciones, radreply.value FROM radcheck INNER JOIN radreply ON radcheck.username = radreply.username ";
		$sql .= "WHERE lower(radcheck.username) LIKE '%" . $metadatos . "%' ";
		$sql .= " OR lower(radcheck.observaciones) LIKE '%" . $metadatos . "%'";
		$sql .= " OR lower(radreply.value) LIKE '%" . $metadatos . "%'";
		//$sql .= " OR lower(radcheck.password) LIKE '%" . $metadatos . "%'";
	}
	
	$arr = query($sql);
	$contadorParidad = 1;
?>
<table>
    <td class='th'><a class="enlace" href="javascript:orden('radcheck.id')">ID</a></td>
    <td class='th'><a class="enlace"  href="javascript:orden('radcheck.username')">Usuario</a></td>
    <td class='th'><a class="enlace" href="javascript:orden('radcheck.observaciones')">Observaciones</a></td>
    <td class='th'><a class="enlace" href="javascript:orden('radreply.value')">Direccion IP</a></td>
	<?PHP
    foreach($arr as $fila)
    {
        echo "<tr>";
        for($i = 0 ; $i < sizeof($fila); $i++)
        {
            if($contadorParidad % 2)
            {
                echo "<td class='Par'>";
            }
            else
            {
                echo "<td class='Impar'>";
            }
            
            
            if($i == 0)
            {
                echo "<button onclick='click(".$fila[$i].")'>" . $fila[$i]. "</button>";
            }
            else
            {
                echo $fila[$i];
            }
            
            echo "</td>";
        }
        echo "</tr>";
        $contadorParidad++;
    }
    ?>
</table>



