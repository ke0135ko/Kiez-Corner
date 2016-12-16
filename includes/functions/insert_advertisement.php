<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Eingabe Formular
$Headline = $_REQUEST['Headline'];
$Descrip = $_REQUEST['Descrip'];
$Zip = $_REQUEST['Zip'];
$Phone = $_REQUEST['Phone'];
$Mail = $_REQUEST['Mail'];
$Score = $_REQUEST['Score'];
//$Picture = $_REQUEST['Picture'];

echo $Headline." ".
     $Descrip." ".
     $Zip." ".
     $Phone." ".
     $Mail." ".
     $Score;
        

