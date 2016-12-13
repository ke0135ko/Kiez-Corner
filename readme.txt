Erl�uterungen zu der Ordnerstruktur des Starter Kits f�r den Kurs HTML/PHP:
-------------------------------------------------------------------------------------

index.php
-------------------------------------
Dieses Dokument wird vom Browser als Erstes aufgrufen und stellt somit den Anfangspunkt der Webseite dar. 
Hier befindet sich das so genannte GET-Routing, wobei mittels des GET-Parameters die aktuelle Unterseite aus der URL ausgelesen wird. 

Hier wird die Variable f�r das Projektverzeichnis festgelegt. BITTE �NDERN!!
Diese Variable wird f�r absolute Pfade in den Links der HTML Elemente verwendet: Beispiel: <img src="<?php echo $projectDir . "img/test,jpg"; ?>">

Bei einem Wechsel zur einer der Unterseite (und auch der Startseite) wird lediglich der Code innerhalb der 'main'-Tags ausgetauscht. 
Dies geschieht per 'include'-Anweisung, in der Pfad anhand des GET-Parameters ge�ndert wird.

Au�erdem werden die Module, die sich unter 'includes' befinden direkt eingef�gt, bspw header und footer.


'css'-Ordner
-------------------------------------
Hier sollten CSS-Dokumente platziert werden



'includes'-Ordner
-------------------------------------

In diesem Ordner befinden sich s�mtliche PHP-Skripte. Module der Webseite wie header und footer befinden sich direkt in diesem Ordner, 
s�mtliche weiteren Module, die immer auf der Webseite auftauchen, sollten hier platziert werden. 

Au�erdem bindet sich unter 'includes' ein Ordner 'functions', welcher PHP-L�sungen zu allgemeinen Problemen bereith�lt. 
Diese w�ren bspw. eine Datenbankanbindung, eine Loginverarbeitung auf der Startseite, kurz: Skripte, die sicherstellen, dass die Webseite funktioniert.

Unter 'pages' befinden sich Skripte zu den Unterseiten der Webseite. Jede Unterseite erh�lt ihren eigenen Ordner (auch die Startseite).
In dem eigenen Ordner befindet sich das Skript mit dem gleichen Namen, welches den Inhalt dieser Unterseite ausgibt.

Beispiel: includes/pages/about/about.php

!!Hinweis!! 
'about.php' MUSS NICHT php-Code enthalten, es kann auch einfach eine HTML-Ausgabe sein.

Der spezifische Ordner der Unterseite enth�lt ebenfalls einen 'functions'-Ordner, in welchem die Skripte, die f�r die Anzeige der Untersedite notwendig sind, platziert werden sollen.

Somit wird alles zu einer Unterseite in einem eigenen Ordner verwaltet. 


'js'-Ordner
-------------------------------------
Hier sollten JavaScript-Dokumente platziert werden


'img'-Ordner
-------------------------------------
In diesem Ordner sollten s�mtliche Grafikdateien platziert werden. 








