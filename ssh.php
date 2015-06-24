<?PHP 
set_include_path(get_include_path() . PATH_SEPARATOR . 'ssh/phpseclib');
include 'Net/SSH2.php';

$ssh = new Net_SSH2('10.10.20.20');
if (!$ssh->login('root', 'tecacc'))
{
    exit('Login Failed');
}

$respuesta =  $ssh->exec('tail /var/log/radius/radius.log');
$parentesis = false;
for($i = 0 ; $i < strlen($respuesta) ; $i++)
{
	echo $respuesta{$i};
	//$condicion1 = ;
	if( ($respuesta{$i} == ')' and  $respuesta{$i + 1} != ':' ) or ($respuesta{$i} == ']' and $respuesta{$i + 1} != ' '))
	{
		echo "<br>";
	}
}


echo $ssh->getLog();
?>