<?php

$menupunkte = array();
if($logged_in)
    {
    $menupunkte = array(
        array("chars.php","Charaktere"),
        array("user.php","Userinfo"),
        array("logout.php","Logout"),
        array("contact.php","Impressum"));
    }
else
    {
    $menupunkte = array(
        array("login.php","Login"),
        array("register.php","Registrieren"),
        array("contact.php","Impressum"));
    }
    
$smarty->assign('nav_punkte',$menupunkte);
?>
