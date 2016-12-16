<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$server = "localhost";
$user = "student";
$pw = "pwa"; 
$db="kiez corner";

//Verbindung zur Datenbank aufnehmen
$conn = @mysqli_connect($server,$user,$pw,$db);
