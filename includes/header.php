<header>
    <?php
    if (!isset($_SESSION)) {
        session_start();
        session_cache_limiter(20);
    }

    if (isset($_SESSION["USERNAME"])) {
        include "includes/functions/dbConnect.php";

        //find name according username
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
            <li><a href="index.php">Home</a></li>
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
            if (!isset($_SESSION["USERNAME"])) {

                echo "<li style =\"float: right !important\"><a href=\"index.php?page=login\">Anmelden</a></li>";
            } else {

                echo "<li style =\"float: right !important\"><a href=\"\\Kiez-Corner\\includes\\functions\\execLogout.php\">Abmelden</a></li>";
            }
            ?>
        </ul>
    </nav> 
    <div>

    </div>
</header>

