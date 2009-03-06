var LC_RACES = new Array();
LC_RACES["dwarves"]       = "Zwerge";
LC_RACES["humans"]        = "Menschen";
LC_RACES["nightelves"]    = "Nachtelfen";
LC_RACES["gnomes"]        = "Gnome";
LC_RACES["draenei"]       = "Draenei";
LC_RACES["tauren"]        = "Tauren";
LC_RACES["orcs"]          = "Orks";
LC_RACES["trolls"]        = "Trolle";
LC_RACES["bloodelves"]    = "Blutelfen";
LC_RACES["undead"]        = "Untoten";

var LC_CLASSES = new Array()
LC_CLASSES["warlock"]   = "Hexenmeister";
LC_CLASSES["warrior"]   = "Krieger";
LC_CLASSES["rogue"]     = "Schurke";
LC_CLASSES["mage"]      = "Magier";
LC_CLASSES["druid"]     = "Druide";
LC_CLASSES["hunter"]    = "Jäger";
LC_CLASSES["priest"]    = "Priester";
LC_CLASSES["paladin"]   = "Paladin";
LC_CLASSES["shaman"]    = "Schamane";

function factionChanged ()
{    
    var factionbox = document.getElementById('factionbox');
    if ( factionbox.options[0].id == 0 ) // id=0  is ---Faction---, to be removed after first choice
        factionbox.removeChild(factionbox.options[0]);
    
    $.post('char_create_json.php', { faction : factionbox.options[factionbox.selectedIndex].id }, recvFactionData, "text");
}
function recvFactionData (res)
{
    var racebox = document.getElementById('racebox'); 
    var races = JSON.parse(res);
    if(racebox.length > 1)   // > 1, because we want to keep "--- Race ---" in the first run
    {
        while(racebox.length > 0)
        {
            racebox.removeChild(racebox.options[0]);
        }
    }
    for (i in races)
    {
        var newop = document.createElement('option');
        newop.setAttribute('id',races[i]);
        newop.innerHTML = LC_RACES[races[i]];
        racebox.appendChild(newop);
    }
    racebox.style.display = "block";
    $("#racerow").css("display", "table-row");
}

function raceChanged ()
{
    var racebox = document.getElementById('racebox');
    if ( racebox.options[0].id == 0 ) // id=0  is ---Race---, to be removed after first choice
        racebox.removeChild(racebox.options[0]);
    $.post('char_create_json.php', { race : racebox.options[racebox.selectedIndex].id }, recvRaceData, "text");
}

function recvRaceData (res)
{
    var classbox = document.getElementById('classbox');
    var classes = JSON.parse(res);
    while (classbox.length > 0)
    {
        classbox.removeChild(classbox.options[0]);
    }
    for (i in classes)
    {
        var newop = document.createElement('option');
        newop.setAttribute('id',classes[i]);
        newop.innerHTML = LC_CLASSES[classes[i]];
        classbox.appendChild(newop);
    }
    classbox.style.display = "block";
    $("#classrow").css("display", "table-row");
    
}

function classChanged ()
{
    $("#levelrow").css("display","table-row");
    $("#namerow").css("display","table-row");
}

function levelChanged ()
{
    var level = document.getElementById('levelinput').value;
    if (validLevel(level)) // level isNumeric() and in [1..70]
    {
        // enable the submit button, remove error
        $("#levelerror").html("");
        if(validName(document.getElementById('nameinput').value))
            $("#submitrow").css("display","table-row");
    }
    else
    {
        // disable submit, show error
        $("#levelerror").html("Bitte gib dein richtiges Level an (1-70)");
        $("#submitrow").css("display","none");
    }
    
}

function validLevel (level)
{
    // level isNumeric() and in [1..70]
    return (String(level).search(/^\d+$/) != -1) && (level <= 70) && (level > 0);
}

function validName (name)
{
    // string is alphanumeric and length >=3
    return (String(name).search(/^\w{3,99}$/) != -1);
}

function nameChanged ()
{
    var name = document.getElementById('nameinput').value;
    if (validName(name))
    {
        $("#nameerror").html("");
        if(validLevel(document.getElementById('levelinput').value))
            $("#submitrow").css("display","table-row");
    }
    else
    {
        $("#nameerror").html("ungültiger Name, er muss alphanumerisch sein und mind. 3 Zeichen lang");
        $("#submitrow").css("display","none");
    }                          
}