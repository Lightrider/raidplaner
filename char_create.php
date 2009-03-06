<?PHP 

include('default.php');
include('navigation.php');

require_login();

$smarty->assign('message',"Bitte gib die Grundinfos zu deinem Charakter ein:");

// display it
$smarty->display('char_create.tpl');
?>