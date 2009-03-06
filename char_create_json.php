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