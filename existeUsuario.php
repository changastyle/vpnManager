<?PHP 
include 'conexionPostrgres.php';

$nombreUsuario = $_REQUEST['nombre'];

//echo $nombreUsuario;

$arr = query("SELECT id, username, attribute, op, value, reint, observaciones FROM radcheck WHERE username LIKE lower('".$nombreUsuario."');");

echo sizeof($arr);

?>