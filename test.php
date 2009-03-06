<?


include('Smarty.class.php');
include('default.php');
include('navigation.php');
include('mysql.php');

$passhash = md5(SALT."fluxus");
$query = "UPDATE users SET enabled='yes', password='%s' WHERE name='%s'";
$query = sprintf($query, $passhash, "fluxus");
mysql_query($query);


?>