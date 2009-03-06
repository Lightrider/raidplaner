{*
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
*}
{include file="header.tpl" pagetitle="Login"}
{include file="navigation.tpl"}

<h1>Login</h1>
<p class="small_text">Bitte geben sie ihren Benutzernamen und ihr Passwort ein um sich einzuloggen. <br />
Sollten sie noch keinen Account besitzen, k&ouml;nnen sie <a href="register.php">hier</a> einen Account beantragen.<br />
Zur Wiederherstellung eines vergessenen Passwortes klicken sie bitte <a href="recover_password.php">hier</a>.</p>
<p class="small_error">{$message|default }</p>
<form action="login_take.php" method="POST">
    <table>
        <tr>
            <td>Benutzername:</td><td><input type="text" name="username" /></td>
        </tr>
        <tr>
            <td>Passwort:</td><td><input type="text" name="password" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td><td><input type="submit" value="Absenden" /></td>
        </tr>
    </table>
</form>


{include file="footer.tpl"}