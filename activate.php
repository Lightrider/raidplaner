<?PHP 
/*
    This file is part of raidplaner (http://github.com/betagan/raidplaner/).

    (c) Copyright 2009, Chris-Werner Reimer <betagan@betaworx.de>

    Raidplaner is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Raidplaner is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Raidplaner.  If not, see <http://www.gnu.org/licenses/>.
*/

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