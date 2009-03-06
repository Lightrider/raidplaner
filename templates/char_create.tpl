{include file="header.tpl" pagetitle="Charakter anlegen"}
{include file="navigation.tpl"}

<h1>Charakter anlegen</h1>
<p class="small_text">{$message|default }</p>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/json2.js"></script>
<script type="text/javascript" src="scripts/char_create.js"></script>


<form action="char_create_info.php" method="POST">
    <table>
        <tr style="display:table-row">
            <td>Fraktion</td>
            <td>
                <select id="factionbox" name="faction" onChange="javascript: factionChanged()">
                    <option id="0" selected="selected">--- Fraktion ---</option>
                    <option id="alliance">Allianz</option>
                    <option id="horde">Horde</option>
                </select>
            </td>
        </tr>
        <tr id="racerow" style="display:none">
            <td>Rasse</td>
            <td>
                <select name="race" id="racebox" style="display:none" onChange="javascript: raceChanged()">
                    <option id="0" selected="selected">--- Rasse ---</option>
                </select>
            </td>
        </tr>
        <tr id="classrow" style="display:none">
            <td>Class</td>
            <td>
                <select name="class" id="classbox" style="display:none;" onChange="javascript: classChanged()">
                </select>
            </td>
        </tr>
        <tr id="namerow">
            <td>Name</td>
            <td>
                <input type="text" name="name" id="nameinput" onchange="javascript: nameChanged()" onkeyup="javascript: nameChanged()" />
                <span class="small_error" id="nameerror"></span>
            </td>
        </tr>
        <tr id="levelrow" style="display:none">
            <td>Level</td>
            <td>
                <input type="text" name="level" id="levelinput" onChange="javascript: levelChanged()" onkeyup="javascript: levelChanged()" />
                <span class="small_error" id="levelerror"></span>
            </td>
        </tr>
        <tr id="submitrow" style="display:none">
            <td>&nbsp;</td>
            <td>
                <input type="submit" value="Weiter" />
            </td>
        </tr>
    </table>
</form>


{include file="footer.tpl"}