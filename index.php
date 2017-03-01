    <?php
// variable to project path
$projectDir = "Kiez-Corner/";

// path variable
// default = start page
$pagePath = "includes/pages/start/start.php";

$cssPath = "";

//name of current page
$page = "start";

// find page path according $page variable
if (!empty($_GET['page'])) {
  
    
    $subPageBasepath = "includes/pages/" . $_GET['page'] . "/";

    
    $givenPath = $subPageBasepath . "/" . $_GET['page'] . ".php";

    
    $cssPath = $subPageBasepath . "css/" . $_GET['page'] . ".css";

    if (file_exists($givenPath)) {
        
        $pagePath = $givenPath;

        
        $page = $_GET['page'];
    }

    if (!file_exists($cssPath)) {
        $cssPath = "";
    }
}

?>
<!DOCTYPE html>
<html>
    <head> 
        <title>KiezCorner</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="author" content="Kevin Kosinski">
        <script src="js/FormFunctions.js" type="text/javascript"></script>
        <script src="https://use.fontawesome.com/4ce204c4a3.js"></script>
        <link rel="icon" type="image/jpg" href="img/logo.jpg">
        <link rel="stylesheet" href="css/screen.css">

<?php if ($cssPath != "") : ?>
            <link rel="stylesheet" href="<?php echo $cssPath; ?>">
        <?php endif; ?>

    </head>
    <body>
        <div class="wrapper"> 
<?php include("includes/header.php"); ?>

            <main>
            <?php include ($pagePath); ?>
            </main>            
<?php include("includes/footer.php"); ?>
        </div>
    </body>
</html>