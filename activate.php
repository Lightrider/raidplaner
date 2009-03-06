<?PHP 

include('Smarty.class.php');
include('default.php');
include('navigation.php');
include('mysql.php');

if($logged_in) {
    header('location: index.php');
}
else {
    
    if(isset($_GET["key"])
       && strlen($_GET["key"]) > 25
       && isset($_GET["username"])
       && strlen($_GET["username"]) > 3)
    {
        $password = GetRandomPassword();
        $passhash = md5(SALT.$password);
        $query = "UPDATE users SET enabled='yes', password='%s' WHERE password='%s' AND name='%s'";
        $query = sprintf($query,
                         $passhash,
                         mysql_real_escape_string($_GET["key"]),
                         mysql_real_escape_string($_GET["username"]));
        if(mysql_query($query))
        {
            $message = "Ihr Account wurde erfolgreich aktiviert. Sie können sich nun mit dem folgenden Passwort einloggen: <br /><br />%s<br /><br />
            Später können sie dieses in den Einstellungen ändern.";
            $message = sprintf($message,$password);
        }
        else
        {
            $message = $query."Ihr Aktivierungskey ist ungültig. Bitte überprüfen sie dass die Adresse im Browser mit der ihn der Email übereinstimmt.
            Gegebenfalls stellen einige Emailprogramme Links falsch da, so dass etwas Nacharbeit erforderlich ist.
            Bitte bedenken sie ebenfalls, dass alle Keys nur 48h lang gültig sind, danach werden die Accounts gelöscht. In diesem Fall können
            sie sich allerdings erneut registrieren.";
        }        
    }
    else
    {
        $message = "Sie rufen diese Seite ohne gültigen Aktivierungskey auf. Wenn sie sich registrieren möchten,
        <a href='register.php'>klicken sie bitte hier</a>";
    }
    $smarty->assign('message',$message);
    $smarty->display('activate.tpl');
}

?>