Erläuterungen zu der Ordnerstruktur des Starter Kits für den Kurs HTML/PHP:
-------------------------------------------------------------------------------------

index.php
-------------------------------------
Dieses Dokument wird vom Browser als Erstes aufgrufen und stellt somit den Anfangspunkt der Webseite dar. 
Hier befindet sich das so genannte GET-Routing, wobei mittels des GET-Parameters die aktuelle Unterseite aus der URL ausgelesen wird. 

Hier wird die Variable für das Projektverzeichnis festgelegt. BITTE ÄNDERN!!
Diese Variable wird für absolute Pfade in den Links der HTML Elemente verwendet: Beispiel: <img src="<?php echo $projectDir . "img/test,jpg"; ?>">

Bei einem Wechsel zur einer der Unterseite (und auch der Startseite) wird lediglich der Code innerhalb der 'main'-Tags ausgetauscht. 
Dies geschieht per 'include'-Anweisung, in der Pfad anhand des GET-Parameters geändert wird.

Außerdem werden die Module, die sich unter 'includes' befinden direkt eingefügt, bspw header und footer.


'css'-Ordner
-------------------------------------
Hier sollten CSS-Dokumente platziert werden



'includes'-Ordner
-------------------------------------

In diesem Ordner befinden sich sämtliche PHP-Skripte. Module der Webseite wie header und footer befinden sich direkt in diesem Ordner, 
sämtliche weiteren Module, die immer auf der Webseite auftauchen, sollten hier platziert werden. 

Außerdem bindet sich unter 'includes' ein Ordner 'functions', welcher PHP-Lösungen zu allgemeinen Problemen bereithält. 
Diese wären bspw. eine Datenbankanbindung, eine Loginverarbeitung auf der Startseite, kurz: Skripte, die sicherstellen, dass die Webseite funktioniert.

Unter 'pages' befinden sich Skripte zu den Unterseiten der Webseite. Jede Unterseite erhält ihren eigenen Ordner (auch die Startseite).
In dem eigenen Ordner befindet sich das Skript mit dem gleichen Namen, welches den Inhalt dieser Unterseite ausgibt.

Beispiel: includes/pages/about/about.php

!!Hinweis!! 
'about.php' MUSS NICHT php-Code enthalten, es kann auch einfach eine HTML-Ausgabe sein.

Der spezifische Ordner der Unterseite enthält ebenfalls einen 'functions'-Ordner, in welchem die Skripte, die für die Anzeige der Untersedite notwendig sind, platziert werden sollen.

Somit wird alles zu einer Unterseite in einem eigenen Ordner verwaltet. 


'js'-Ordner
-------------------------------------
Hier sollten JavaScript-Dokumente platziert werden


'img'-Ordner
-------------------------------------
In diesem Ordner sollten sämtliche Grafikdateien platziert werden. 








