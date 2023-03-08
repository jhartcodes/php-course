<!DOCTYPE html>
<html <?php language_attributes();?>>


<head>
    <!--  viewport for dynamic website and blog info to set render the utf 8 https://developer.wordpress.org/reference/functions/bloginfo/-->
    <meta charset="<?php bloginfo('charset')?>">
    <meta name="viewport" content="width=device-width, intitial-scale=1">
    <?php wp_head(); ?>
</head>
<!-- body_class() displays the class and gives values depending on each page that we are on.  -->

<body <?php body_class()?>>
    <header class="site-header">
        <div class="container">

            <h1 class="school-logo-text float-left"><a href="<?php echo site_url() ?>"><strong>Fictional</strong>
                    University</a></h1>

            <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search"
                    aria-hidden="true"></i></span>
            <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
            <div class="site-header__menu group">
                <nav class="main-navigation">

                    <?php 
                // headerMenuLocation is set in functions wp_nav_menu needs an array with theme_location   
                wp_nav_menu(array(
                    'theme_location' => 'headerMenuLocation'
                ))
                ?>

                    <!-- nav links in code for one off client keep it here, however if you want to make a theme, you want it to be flexible and controllable -->
                    <!-- because local could have multiple sites instead of/aboutus  for links i use php function site_url -->

                    <!---
                    <ul>
                        <li><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
                        <li><a href="<?php site_url('/about-us') ?>">Programs</a></li>
                        <li><a href="<?php site_url('/about-us') ?>">Events</a></li>
                        <li><a href="#">Campuses</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                    --->

                </nav>
                <div class="site-header__util">
                    <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
                    <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
                    <span class="search-trigger js-search-trigger"><i class="fa fa-search"
                            aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </header>