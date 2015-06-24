<meta charset="utf-8" />
<?PHP 
session_start();
$location = "index.php";

session_destroy();

header("Location:".$location);
?>