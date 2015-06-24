<?PHP 

$ip = $_POST['ip'];
//echo $ip;
include 'conexionPostrgres.php';

$sql = "SELECT radcheck.id, radcheck.username, radcheck.observaciones, radreply.value FROM radcheck INNER JOIN radreply ON radcheck.username = radreply.username WHERE radreply.value LIKE '" .$ip ."'" ;

$arr = query($sql);

echo sizeof($arr);

?>