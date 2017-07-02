<?php
        
        // list all tags
        global $dbTags;
        global $Url;

        $db = $dbTags->db['postsIndex'];
        $filter = $Url->filters('tag');

        $tagArray = array();

        foreach($db as $tagKey=>$fields)
        {
           $tagArray[] = array('tagKey'=>$tagKey, 'count'=>$dbTags->countPostsByTag($tagKey), 'name'=>$fields['name']);
        }

        usort($tagArray, function($a, $b) {
           return $b['count'] - $a['count'];
        });

        echo '<ul class="taglist">';
        $tag_order = ['mixed', 'painting', 'photonude', 'photoworld', 'photohumanz', 'grenznacht', '100schaft', 'media'];
        foreach($tag_order as $sort_tag) {
            echo '<li class="tagItem"><a href="'.$Site->url().'tag/'.$sort_tag.'">'.$sort_tag.' ('.count($APL->getPostsByTagList([$sort_tag])).')</a></li>';
        }
        foreach($tagArray as $tagKey=>$fields)
        {
            // Print the parent
            if ( $fields['name'] != 'news' && !(in_array($fields['name'] , $tag_order))) {
                echo '<li class="tagItem"><a href="'.HTML_PATH_ROOT.$filter.'/'.$fields['tagKey'].'">'.$fields['name'].' ('.$fields['count'].')</a></li>';
            }
        }
        echo '<li class="tagItem"><a href="'.$Site->url().'art">all ('.count($APL->getPostsByBlackList(['News'])).')</a></li>';
        echo '</ul>';
        echo '<div style="clear: both;"></div>';
        
        echo '<div class="worksListFrame">';

        if ($Url->whereAmI() == 'blog') {
            $posts = $APL->getPostsByBlackList(['News']);
            $toTag = '';
        } elseif ($Url->whereAmI() == 'tag') {
            $posts = $APL->getPostsByTagList([$Url->slug()]);
            $toTag = '?fromTag='.$Url->slug();
        }
        foreach ($posts as $Post) {
            echo '<div class="artlist">';
            echo '<a href="'.$Post->permalink().$toTag.'">';
            if($Post->coverImage()) {
                echo '<img src="'.$Post->coverImage().'" alt="Cover Image">';
            } else {
                echo '<h4>'.$Post->title().'</h4>';
            }
            echo '</a>';
            echo '</div>';
        }
        echo '<div style="clear: both;"></div>';
        echo '</div>';
?>
