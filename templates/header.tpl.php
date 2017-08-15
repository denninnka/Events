<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
    <link rel="stylesheet" type="text/css" href="css/carousel.css"/>
    <link rel="stylesheet" type="text/css" href="css/calendar.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
        The Events Calendar
    </title>
</head>
<body>

<div class="navbar-wrapper <?php if(isset($_GET['page'])) echo "nocarousel"; ?> ">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <a class="navbar-brand" href="index.php">Начало</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if(isLogged() && isUser()){
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=logout">Излез</a>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li class="nav-item"><a class="nav-link" href="index.php?page=registration">Регистрирай се</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?page=login">Впиши се</a></li>
                        <?php } ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
    </div><!-- /.container-fluid -->
</div>
<?php if(!isset($_GET['page'])) : ?>
    <!-- Carousel
        ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>СЪБИТИЯТА НА КАЛЕНДАРА</h1>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.carousel -->
<?php endif; ?>
<div class="container">