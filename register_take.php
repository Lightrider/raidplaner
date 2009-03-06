<?
include('Smarty.class.php');
include('default.php');
include('navigation.php');
include('mysql.php');

if($logged_in) {
    header('Location: index.php');
}
else {
    
    if (isset($_POST["username"])
        && isset($_POST["email"])
        && strlen($_POST["username"]) >= 3
        && strlen($_POST["email"]) >= 7)
    {
        $username = mysql_real_escape_string($_POST["username"]);
        $email = mysql_real_escape_string($_POST["email"]);
        $query = sprintf("SELECT email FROM users WHERE name='%s' OR email='%s'",$username,$email);
        $res = mysql_query($query);
        if(mysql_num_rows($res) > 0)
        {
            $row = mysql_fetch_assoc($res);
            if($row["email"] == $email)
                $message = "Die von ihnen eingegebene Email-Adresse wird bereits verwendet.";
            else
                $message = "Der von ihnen eingegebene Benutzername wird bereits verwendet.";
            
            $smarty->assign('message',$message);
            $smarty->display('register.tpl');
        }
        else
        {
            $key = md5($username.SALT.$email);
            $query = sprintf("INSERT INTO users (name, email, registered,password) VALUES ('%s','%s',NOW(),'%s')",$username,$email,$key);
            if(mysql_query($query))
            {
                // SEND MAIL
                // TODO: escape email, strip bcc etc, validate email and username (alphanumeric names)
                $subject = "Raidplaner Registrierung";
                $body = sprintf("Um ihre Anmeldung fьr den Raidplaner zu bestдtigen, klicken sie bitte auf den folgenden Link:
                        http://localhost/activate.php?username=%s&key=%s
                        Sollten sie sich nicht fьr diesen Dienst angemeldet haben kцnnen sie diese EMail ignorieren.
                        Nicht aktivierte Accounts werden nach 48h gelцscht.
                        
                        Mit freundlichen Grьяen,
                        Ihre Raidplaner Crew",$username,$key);
                mail($email, $subject, $body, "From: service@localhost" ); // TODO: check if successfull
                $message = "Ihr Account wurde erstellt. Bitte folgen sie den Anweisungen in der ihnen zugesandten Email.".$key;
            }
            else
            {
                $message = "Ihr Account konnte nicht erstellt werden. Bitte kontrollieren sie ihre Eingabe und versuchen
                            sie es erneut.";
            }
            $smarty->assign('message',$message);
            $smarty->display('register_take.tpl');
        }
    }
    else {
        $message = "Ihre Angaben sind Fehlerhaft. Bitte ьberprьfen sie ihre Eingabe und versuchen sie es erneut.";
        $smarty->assign('message',$message);
        $smarty->display('register.tpl');
    }
}
?>