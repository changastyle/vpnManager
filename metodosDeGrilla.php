<?PHP
function esUsuarioYNoMascara($fila)
{
	$salida = false;
	if($fila[4] != "255.255.255.0")
	{
		$salida = true;	
	}
	else
	{
		$salida = false;
	}
	return $salida;
}
function esNasIP($fila)
{
	$salida = false;
	
	if($fila[2]== "NAS-IP-Address")
	{
		$salida = true;
	}
	
	return $salida;
}
function imprimirFila($fila,$paridad)
{
	for($i = 0 ; $i < (sizeof($fila) + 1);$i++)
	{
		if($i == 0){echo "<td class='grillarow0 ".$paridad."'>";echo "<button>" . $fila[0]."</button>";echo "</td>";}
		else if($i == 2)
		{
			/*echo "<td class='".$paridad."'>"; 
			echo $fila[2];
			 if($fila[2]== "NAS-IP-Address")
			 {
				 echo "asdfa";
			 };
		    echo "</td>";*/
		}
		else if($i == 4){echo "<td class='".$paridad."'>"; cambiarFramedUser($fila[4]); echo "</td>";}
		else if($i == sizeof($fila)){echo "<td class='grillarow5 ".$paridad."'>";operaciones($fila[1]);echo "</td>";}
		
		else
		{
			echo "<td class='".$paridad."'>";
			echo "" . $fila[$i];
			echo "</td>";
		}
	}
}
function cambiarFramedUser($elemento)
{
	if($elemento == "Framed-User")
	{
		echo "Usuario Común";
	}
	else
	{
		echo $elemento;
	}
}
function operaciones($id)
{
	echo '<div class="papelera" id="papelera'.$id.'" onclick=del("'.$id.'")></div>';
	echo "<div class='lapiz' id='lapiz".$id."' onclick='upd($id)'></div>";
}
?>