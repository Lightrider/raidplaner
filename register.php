<?
include('Smarty.class.php');
include('default.php');
include('navigation.php');

if($logged_in) {
    header('Location: index.php');
}
else {
    $smarty->display('register.tpl');
}
?>