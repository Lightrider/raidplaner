<?php

include('Smarty.class.php');
define(SALT, "6vnpctmCA$%C!^A");

$INVALID_REQUEST = array("error" => "your request was invalid and could not be answered");

/* Races per Faction */
$RACES_HORDE = array("tauren", "orcs", "undead", "bloodelves", "trolls");
$RACES_ALLIANCE = array("dwarves","gnomes","humans","draenei","nightelves");

/* Classes per Race */
/** Horde Races **/
$CLASSES_TAUREN = array("warrior","druid","hunter","shaman");
$CLASSES_ORCS = array("warlock","warrior","shaman");
$CLASSES_TROLLS = array("hunter","warrior","mage","priest","rogue");

/** Alliance Races **/
$CLASSES_HUMANS = array("warrior","priest","mage","paladin");

function GetRandomPassword()
    {
        $password = (string)'';
        $password .= mt_rand(0, 9);
        $password .= chr(mt_rand(97, 122));
        $password .= chr(mt_rand(65, 90));
        
        for ($i = 0; $i < 5; $i++)
        {
            Switch (mt_rand(0, 2))
            {
                case 0:
                    $password .= mt_rand(0, 9);
                    break;
                case 1:
                    $password .= chr(mt_rand(97, 122));
                    break;
                case 2:
                    $password .= chr(mt_rand(65, 90));
                    break;
            }
        }
        $password = str_shuffle($password);
        
        return $password;
   }  


function require_login()
{
    //if(!$logged_in) header("Location: index.php");
}

// starte session
session_start();

if($_SESSION["logged_in"]) $logged_in=true;
else $logged_in = false;


// create smarty object (template engine)
$smarty = new Smarty;


?>
