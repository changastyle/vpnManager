<?PHP 
$nombre = $_REQUEST['nombre'];

echo $nombre;

include 'conexionPostrgres.php';

$arr = array();
$sql1 = "DELETE FROM radcheck WHERE username LIKE '".$nombre."';";
$sql2 = "DELETE FROM radreply WHERE username LIKE '".$nombre."';";
array_push($arr,$sql1);
array_push($arr,$sql2);


insertMultiple($arr);

?>