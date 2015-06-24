<?PHP 

$nombre = $_REQUEST['nombre'];
$ip = $_REQUEST['ip'];
$observaciones = $_REQUEST['observaciones'];
echo "Recibí para insertar : (Nombre = " . $nombre .", IP = ". $ip.", OBSERVACIONES  ".$observaciones .")<br>";

include 'conexionPostrgres.php';
$sqlConsultaUltimoIDRADCHECK =  "SELECT id FROM radcheck ORDER BY id DESC LIMIT 1;";
$sqlConsultaUltimoIDRADREPLY =  "SELECT id FROM radreply ORDER BY id DESC LIMIT 1;";


$arrConsultaUltimoIDRADCHECK = query($sqlConsultaUltimoIDRADCHECK);
$arrConsultaUltimoIDRADREPLY = query($sqlConsultaUltimoIDRADREPLY);

$idMaximoRADCHECK = intval($arrConsultaUltimoIDRADCHECK[0][0])  + 1;
$idMaximoRADREPLY = intval($arrConsultaUltimoIDRADREPLY[0][0]) + 1;
$idMaximoRADREPLY2 = $idMaximoRADREPLY + 1;

echo "ID MAXIMO RADCHECK = " . $idMaximoRADCHECK ."<br>";
echo "ID MAXIMO RADREPLY = " . $idMaximoRADREPLY ."<br>";
echo "ID MAXIMO RADREPLY2 = " . $idMaximoRADREPLY2 ."<br>";

$sql = "insert into radcheck (id ,username,attribute,op,value,reint,observaciones) VALUES(".$idMaximoRADCHECK.",'".$nombre."','User-Password','==','1nTr4l0t',0,'".$observaciones."')";
$sql2 = "INSERT INTO radreply (id, username, attribute, op, value) VALUES (".$idMaximoRADREPLY.",'".$nombre."', 'Framed-IP-Address', '=', '".$ip."');";
$sql3 = "INSERT INTO radreply(id, username, attribute, op, value) VALUES (".$idMaximoRADREPLY2.",'".$nombre."', 'Framed-IP-Netmask', '=', '255.255.255.0');";

$arr = array();
array_push($arr,$sql);
array_push($arr,$sql2);
array_push($arr,$sql3);
echo insertMultiple($arr);
?>