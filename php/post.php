<?php

        Theme::plugins('postBegin');

        if ( !(empty( $_GET['fromTag'] )) ) {
            $fromTag = $_GET['fromTag'];
            echo '<h3>'.$fromTag.'</h3>';
        }
        echo '<h2>'.$Post->title().'</h2>';

        // show Prev / Next post-links
        echo '<div class="content">';
            // are we browsing on specific tag?
            if (isset($fromTag)) {
                echo '<a style="float: right;" href="'.$APL->getNextPostByTagList([$fromTag])->permalink().'?fromTag='.$fromTag.'">NEXT</a>';
                echo '<a style="float: left;" href="'.$APL->getPrevPostByTagList([$fromTag])->permalink().'?fromTag='.$fromTag.'">PREV</a>';
            // are we browsing all warks?
            } elseif ( $Post->tags() != 'news' ) {
                echo '<a style="float: right;" href="'.$APL->getNextPostByBlackList(['News'])->permalink().'">NEXT</a>';
                echo '<a style="float: left;" href="'.$APL->getPrevPostByBlackList(['News'])->permalink().'">PREV</a>';
            }
            echo '<div style="clear: both;"></div>';
        echo '</div>';

        echo '<div id="workDiv" class="content">';
        echo '<em>'.$Post->description().'</em>';
        echo '<br>';
	    echo $Post->content();
        echo '</div>';

        Theme::plugins('postEnd');
        
        // now add touchgestures wth hammer js!
?>
