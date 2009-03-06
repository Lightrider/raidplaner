<?

require("default.php");

if(isset($_POST["faction"]))
{
    if($_POST["faction"] == "alliance")
        print json_encode($RACES_ALLIANCE);
    elseif($_POST["faction"] == "horde")
        print json_encode($RACES_HORDE);
    else
        print json_encode($INVALID_REQUEST);
}
elseif(isset($_POST["race"]))
{
    switch($_POST["race"])
    {
        case "orcs" : print json_encode($CLASSES_ORCS);
    }
}
else
    print json_encode($INVALID_REQUEST);
?>