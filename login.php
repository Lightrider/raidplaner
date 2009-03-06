<?
include('Smarty.class.php');
include('default.php');
include('navigation.php');

if($logged_in) {
    header('location: index.php');
}
else {
    $smarty->display('login.tpl');
}
?>