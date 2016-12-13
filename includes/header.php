<header>
    <a class="logo" href="index.php">
        <img src= "img/logo.png" alt="Logo">
    </a>
    <!--Hier spaeter Ausgabe von evtl. zwoschengespeicherten Mitteilungen einfuegen-->
    <nav>
        <ul>
            <li class="<?php if ($page == 'start') echo "active"; ?>"><a href="index.php">Home</a></li>
            <li class="<?php if ($page == 'products') echo "active"; ?>"><a href="index.php?page=products">Produkte</a></li>
            <li class="<?php if ($page == 'about') echo "active"; ?>"><a href="index.php?page=about">About</a></li>
            <li class="<?php if ($page == 'contact') echo "active"; ?>"><a href="index.php?page=contact">Kontakt</a></li>
            <!--Hier spaeter Login-Prüfung und -Button einfuegen-->
        </ul>
    </nav> 
    <div class="clear"></div>
</header>