<header>
    <?php
    //if user is logged in, display users firstname
    session_start();
    
    if (isset($_SESSION["USERNAME"])) {
        include "includes/functions/dbConnect.php";

        //find name according username;
        $userName = $_SESSION["USERNAME"];
        $selectName = "select name from member m join login l on m.membno=l.userid where username = '$userName'";
        $queryName = mysqli_query($conn, $selectName);
        $result = mysqli_fetch_array($queryName);
        
        //only display first name
        $firstName = explode(" ", $result["name"]);
        
        echo "<h3>Hallo " . $firstName[0] . "</h3>";

        include "includes/functions/dbClose.php";
    }
    ?>  
    <nav>
        <ul>
            <li style="margin-bottom: -8px"><a href="index.php" style="padding-top: 6px"><img src="img/logo.jpg" alt="KiezCorner" height="35"/></a></li> 
            <li class="dropdown">
                <a class="dropbtn">Inserate</a>
                <div class="dropdown-content">
                    <a href="index.php?page=requests">Gesuche</a> 
                    <a href="index.php?page=offers">Angebote</a>
                </div>
            </li>
            <li><a href="index.php?page=search_form">Suche</a></li>
            <li><a href="index.php?page=registrate">Registrieren</a></li>
            <li><a href="index.php?page=impressum">Impressum</a></li>
            <?php
            //display login or logout
            if (!isset($_SESSION["USERNAME"])) {

                echo "<li style =\"float: right !important\"><a href=\"index.php?page=login\">Anmelden</a></li>";
            } else {

                echo "<li style =\"float: right !important\"><a href=\"includes\\functions\\execLogout.php\">Abmelden</a></li>";
            }
            ?>
        </ul>
    </nav> 
</header>

