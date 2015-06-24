<meta charset="utf-8" />
<?PHP 
session_start();
$location = "home.php";


$usuario = $_REQUEST['nombreUsuario'];
$password = $_REQUEST['passwordUsuario'];

$_SESSION['usuario'] = $usuario;

//echo "RECIBÍ: ". $usuario . ", " .$password;
/*
include '../DB/DB.php';
$id = 0;
$sql = "SELECT * FROM pruebas.usuarios WHERE lower(nombre) LIKE lower('".$usuario."')";
$arr = query($sql);
if( $arr[0][2]  == $password )
{
	echo $arr[0][0];
	$_SESSION['id'] = $arr[0][0];
	$location = "home.php";
}*/
header("Location:".$location);
?>