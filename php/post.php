<?php

        Theme::plugins('postBegin');

        if ( !(empty( $_GET['fromTag'] )) ) {
            $fromTag = $_GET['fromTag'];
            echo '<a href="'.$Site->url().'tag/'.$fromTag.'"><h3>'.$fromTag.'</h3></a>';
        }
        echo '<h2>'.$Post->title().'</h2>';

        // show Prev / Next post-links
        echo '<div class="content">';
            // are we browsing on specific tag?
            if (isset($fromTag)) {
                echo '<a style="float: right; font-size: 2rem;" href="'.$APL->getNextPostByTagList([$fromTag])->permalink().'?fromTag='.$fromTag.'">>>></a>';
                echo '<a style="float: left; font-size: 2rem;" href="'.$APL->getPrevPostByTagList([$fromTag])->permalink().'?fromTag='.$fromTag.'"><<<</a>';
            // are we browsing all warks?
            } elseif ( $Post->tags() != 'news' ) {
                echo '<a style="float: right; font-size: 2rem;" href="'.$APL->getNextPostByBlackList(['News'])->permalink().'">>>></a>';
                echo '<a style="float: left; font-size: 2rem;" href="'.$APL->getPrevPostByBlackList(['News'])->permalink().'"><<<</a>';
            }
            echo '<div style="clear: both;"></div>';
        echo '</div>';

        echo '<div id="workDiv" class="content">';
	    echo $Post->content();
        echo '</div>';

        Theme::plugins('postEnd');
        
        // now add touchgestures wth hammer js!
?>
