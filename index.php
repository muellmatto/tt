<!DOCTYPE html>
<html>
    <head>
        <!-- t -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title><?php echo $Site->title() ?></title>
        <script src="https://use.fontawesome.com/d1bee5c0c4.js"></script>
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

        <?php 
                        if ($Url->whereAmI() == "home"){
                                $active_class_home = "active";
                            } else {
                                $active_class_home = "";
                            }
        ?>

        <div class="menu-left <?php echo $active_class_home ?>">
            <a href="/">
                <?php echo $Site->title() ?>
            </a>
        </div>
                <?php
                    $parents = $pagesParents[NO_PARENT_CHAR];
                    foreach($parents as $Parent):

                        if ( strpos($Url->slug(), $Parent->slug() ) !== false) {
                                $active_class = "active";
                            } else {
                                $active_class = "";
                            }

                ?>
                    <div class="menu-right <?php echo $active_class?>">
                        <a href="<?php echo $Parent->permalink() ?>">
                            <?php echo $Parent->title(); ?>
                        </a>
                    </div>
                <?php endforeach; ?>

                <?php 
                                if ($Url->whereAmI() == "blog" || $Url->whereAmI() == 'tag' || $Url->whereAmI() == "post"){
                                        $active_class_art = "active";
                                    } else {
                                        $active_class_art = "";
                                    }
                ?>
                <div class="menu-right <?php echo $active_class_art ?>">
                    <a href="<?php echo $Site->uriFilters('tag')?>mixed">
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
