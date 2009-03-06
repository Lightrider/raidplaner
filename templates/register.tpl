{include file="header.tpl" pagetitle="Registrierung"}
{include file="navigation.tpl"}

<h1>Registrierung</h1>
<p class="small_text">Bitte geben sie den gewünschten Benutzernamen und ihre Email-Adresse ein. Sie k&ouml;nnen ihren Account erst nutzen,
wenn sie auf den Aktivierungslink geklickt haben der an diese Adresse versandt wird. Je nach Sicherheitslevel kann ebenfalls
die Aktivierung durch einen Administrator erforderlich sein.</p>
<p class="small_error">{$message|default }</p>
<form action="register_take.php" method="POST">
    <table>
        <tr>
            <td>Benutzername:</td><td><input type="text" name="username" /></td>
        </tr>
        <tr>
            <td>Email-Adresse:</td><td><input type="text" name="email" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td><td><input type="submit" value="Absenden" /></td>
        </tr>
    </table>
</form>


{include file="footer.tpl"}