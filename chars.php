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

include('default.php');
include('navigation.php');


$smarty->assign('message',"Du hast derzeit noch keine Charaktere eingetragen.");

// display it
$smarty->display('chars.tpl');
?>