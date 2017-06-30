<!DOCTYPE html>
<html>
    <head>
        <!-- t -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title><?php echo $Site->title() ?></title>
        <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
        <?php Theme::favicon('favicon.ico'); ?>
        <?php Theme::css('normalize.css') ?>
        <?php Theme::css('tt.css') ?>
        <?php Theme::plugins('siteHead'); ?>
        <style>
        </style>
    </head>
    <body>
    <div class="frame">
        <?php Theme::plugins('siteBodyBegin') ?>

        <div class="menu-left">
            <a href="/">
                TIM THOMCZYK
            </a>
        </div>
                <?php
                    $parents = $pagesParents[NO_PARENT_CHAR];
                    foreach($parents as $Parent):
                ?>
                    <div class="menu-right">
                        <a href="<?php echo $Parent->permalink() ?>">
                            <?php echo $Parent->title(); ?>
                        </a>
                    </div>
                <?php endforeach; ?>

                <div class="menu-right">
                    <a href="<?php echo $Site->uriFilters('blog')?>">
                        ART
                    </a>
                </div>
        <div style="clear: both;"></div>

                <?php 

                    if ($Url->whereAmI() == "home"){
                        include(THEME_DIR_PHP.'news.php');
                    }elseif ($Url->whereAmI() == 'page') {
                        include(THEME_DIR_PHP.'page.php');
                    } elseif ($Url->whereAmI() == 'post')  {
                        include(THEME_DIR_PHP.'post.php');
                    } elseif ( ($Url->whereAmI()=='blog') || ($Url->whereAmI()=='tag') )  {
                        include(THEME_DIR_PHP.'works.php');
                    }
                ?>
    </div>
    </body>
</html>
