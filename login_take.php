<?
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

include('default.php');
include('navigation.php');
include('mysql.php');

if($logged_in) {
    header('Location: index.php');
}
else {
    if (   isset($_POST["username"])
        && isset($_POST["password"])
        && strlen($_POST["username"]) >= 3
        && strlen($_POST["password"]) >= 1)
    {
        $username   = mysql_real_escape_string($_POST["username"]);
        $password   = mysql_real_escape_string($_POST["password"]);
        $password   = md5(SALT.$password);
        $query      = "SELECT id,name,password FROM users WHERE name='%s' AND password='%s'";
        $query      = sprintf($query,$username,$password);
        $res        = mysql_query($query);
        
        if(mysql_num_rows($res) < 1)
        {
            $message = "Die von ihnen eingebenen Daten sind falsch. Bitte versuchen sie es erneut.<br />
                        Sollten sie ihr Passwort vergessen haben, klicken sie bitte <a href='recoverpassword.php'>hier</a>";
            $smarty->assign('message',$message);
            $smarty->display('login.tpl');
        }
        else {
            $row                    = mysql_fetch_assoc($res);
            $_SESSION["name"]       = $row["name"];
            $_SESSION["id"]         = $row["id"];
            $_SESSION["logged_in"]  = true;
            
            // setze cookies
            setcookie("raidplaner_username",$row["name"],time()+60*60*48);
            setcookie("raidplaner_hash",md5($row["password"].SALT.$row["name"]),time()+60*60*48);
            header("Location: index.php");
        }
    }
}

?>