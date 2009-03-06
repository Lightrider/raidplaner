<?PHP 

include('Smarty.class.php');
include('default.php');
include('navigation.php');


$smarty->assign('introduction', 'Willkommen...');


// display it
$smarty->display('index.tpl');
?>