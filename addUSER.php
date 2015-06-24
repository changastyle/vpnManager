<?PHP 

$usuario = $_REQUEST['usuario'];
$password = $_REQUEST['password'];

//echo "Recibí para insertar : (USUARIO = " . $usuario .", PASSWORD = ". $password;

include 'conexionPostrgres.php';
$sqlConsultaUltimoIDRADCHECK =  "SELECT id FROM radcheck ORDER BY id DESC LIMIT 1;";
$sqlConsultaUltimoIDRADREPLY =  "SELECT id FROM radreply ORDER BY id DESC LIMIT 1;";


$arrConsultaUltimoIDRADCHECK = query($sqlConsultaUltimoIDRADCHECK);
$arrConsultaUltimoIDRADREPLY = query($sqlConsultaUltimoIDRADREPLY);

$idMaximoRADCHECK = intval($arrConsultaUltimoIDRADCHECK[0][0])  + 1;
$idMaximoRADCHECK2 = $idMaximoRADCHECK + 1;
$idMaximoRADREPLY = intval($arrConsultaUltimoIDRADREPLY[0][0]) + 1;
$idMaximoRADREPLY2 = $idMaximoRADREPLY + 1;

/*
echo "ID MAXIMO RADCHECK = " . $idMaximoRADCHECK ."<br>";
echo "ID MAXIMO RADCHECK2 = " . $idMaximoRADCHECK2 ."<br>";
echo "ID MAXIMO RADREPLY = " . $idMaximoRADREPLY ."<br>";
echo "ID MAXIMO RADREPLY2 = " . $idMaximoRADREPLY2 ."<br>";
*/
$sql1 = "INSERT INTO radcheck 
	(id ,username,attribute,op,value,reint,observaciones)
    VALUES ( ".$idMaximoRADCHECK." , '".$usuario."', 'User-Password', '==', '".$password."', 0, 'VPN de ".$usuario."')";

 
$sql2 = "INSERT INTO radcheck 
	(id ,username,attribute,op,value,reint,observaciones)
    VALUES ( ".$idMaximoRADCHECK2." , '".$usuario."', 'NAS-IP-Address', '=~', '(10.10.20.5|192.168.59.84)', 0, 'VPN de ".$usuario."')";

$sql3 = "INSERT INTO radreply
	( id, username, attribute, op, value)
    VALUES ( ".$idMaximoRADREPLY.", '".$usuario."','Service-Type','=','Framed-User' );
";

$arr = array();
array_push($arr,$sql1);
array_push($arr,$sql2);
array_push($arr,$sql3);
echo insertMultiple($arr);
?>