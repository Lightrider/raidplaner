<?
include('Smarty.class.php');
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