<?PHP 

include('default.php');
include('navigation.php');


$smarty->assign('message',"Du hast derzeit noch keine Charaktere eingetragen.");

// display it
$smarty->display('chars.tpl');
?>