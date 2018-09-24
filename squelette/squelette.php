<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>thecamp dynamic screens</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $CSS_URL ?>bootstrap.min.css"  type="text/css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $CSS_URL ?>style.css" type="text/css" rel="stylesheet">

    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo $JS_URL ?>jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="<?php echo $JS_URL ?>bootstrap.min.js"></script>
    
</head>

<body class="page-<?php echo $GLOBAL_PAGE; ?> " >
    
<div>
  <?PHP
        //Front loading
        if(is_file($FRONT_PAGES_PATH."/".$GLOBAL_PAGE.".php"))
            require($FRONT_PAGES_PATH."/".$GLOBAL_PAGE.".php");
        elseif(is_dir($FRONT_PAGES_PATH."/".$GLOBAL_PAGE))
            require($FRONT_PAGES_PATH."/".$GLOBAL_PAGE."/".$GLOBAL_PAGE.".php");
        else
            require($FRONT_PAGES_PATH."/notfound.php");

        ?>
</div>  

</body>

</html>