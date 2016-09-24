<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Crossinsider staat klaar voor al uw actie foto's!">
    <meta property="og:image" content="http://crossinsider.be/images/logo3.png">
    <meta property="og:title" content="Crossinsider">
    <meta property="og:description" content="Fotoreportages en interviews over cyclocross en motocross">
    <meta name="author" content="COODI">
    <!--title-->
    <title>Crossinsider</title>
    <!--CSS-->

    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/magnific-popup.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/owl.carousel.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/responsive.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/flexslider.css'); ?>" rel="stylesheet" type="text/css" media="screen" />


    <!--[favicon]-->
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/favcrossinsider.png'); ?>"/>

    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet">

    <!--Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>

</head><!--/head-->
<body>
<div id="main-wrapper">
    <header id="navigation">
        <div class="navbar" role="banner">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="/">
                        <img class="main-logo img-responsive" src="<?php echo base_url('assets/images/logo3.png'); ?>" alt="">
                    </a>
                </div>
                <nav id="mainmenu" class="navbar-left collapse navbar-collapse nav_header">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Home</a></li>
                        <?php
                        //print_r($menu_items);

                        foreach($menu_items as $menu_item)
                        {
                            if(empty($menu_item['children']))
                            {
                                $active = '';
                                if(($page->id == $menu_item['id']) || ($page->parent_id == $menu_item['id']))
                                {
                                    $active = 'active';
                                }
                                echo '<li class="'.$active.'"><a href="'.base_url('index.php/'.$menu_item['slug']).'">'.$menu_item['title'].'</a></li>';
                            }
                            else
                            {
                                $active = '';
                                if(($page->id == $menu_item['id']) || ($page->parent_id == $menu_item['id']))
                                {
                                    $active = 'active';
                                }
                                echo '
                                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">'.$menu_item['title'].' <span class="caret"></span></a>
                                    <ul class="dropdown-menu">';

                                foreach ($menu_item['children'] as $child)
                                {
                                    echo '<li><a href="'.base_url('index.php/'.$child['slug']).'">'.$child['title'].'</a></li>';
                                }

                                echo '
                                    </ul>
                                </li>';
                            }

                        }

                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header><!--/#navigation-->