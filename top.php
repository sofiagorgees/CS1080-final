<?php
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Book Worms</title>
        <link rel="icon"  href="final-images/book-icon.png">
        <link rel="stylesheet" href="css/custom.css?version=<?php print time(); ?>" type="text/css">
        <link rel="stylesheet" href="css/layout-desktop.css?version=<?php print time(); ?>" type="text/css"> 
        <link rel="stylesheet" href="css/layout-tablet.css?version=<?php print time(); ?>"
        media="(max-width:820px)" type="text/css">
        <link rel="stylesheet" href="css/layout-phone.css?version=<?php print time(); ?>"  media="(max-width:430px)" type="text/css">
        <meta name="author" content="Sofia Gorgees">
        <meta name="description" content="Information about upcoming books, recommedations and details on authors">
    </head>
    
<?php
    print '<body class="' . $pathParts['filename'] . '">';
    print '<!-- ########### Body Element ############ -->';
    include 'database-connect.php';
    include 'header.php';
    include 'nav.php';
?>






    