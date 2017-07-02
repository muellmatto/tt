
    <?php
        Theme::plugins('pageBegin');
        $content = $Page->content();
        $title = $Page->title();


            // Returns the parent key, if the page doesn't have a parent returns FALSE
            if ( $Page->parentKey() !== false) {
                // we are a child!
                $Parent = buildPage($Page->parentKey());
                $children = $Page->parentMethod('children');
            } else {
                // we are parent!
                $Parent = $Page;
                $children = $Parent->children();
            }
            // add subpage navigation if necessary
            if ($children) {
                // at first add a parent link
                if ( $Page->slug() == $Parent->slug() ) {
                    $class = 'active';
                } else {
                    $class = '';
                }
                echo '<a href="'.$Parent->permalink().'">';
                echo '<h2 class="sub_navigation '.$class.'">'.$Parent->title().'</h2>';
                echo '</a>';
                // now add a link for every child
                foreach ($children as $ChildKey) {
                    $Child = buildPage($Parent->slug().'/'.$ChildKey);
                    if ( $Page->slug() == $Child->slug() ) {
                        $class = 'active';
                    } else {
                        $class = '';
                    }
                    echo '<a href="'.$Child->permalink().'">';
                    echo '<h2 class="sub_navigation '.$class.'">'.$Child->title().'</h2>';
                    echo '</a>';
                }
                echo '<div style="clear: both;"></div>';
            }









            // add content
            // echo '<div class="title">'.$title.'</div>';
            echo '<div class="content">'.$content.'</div>';
        Theme::plugins('pageEnd');
    ?>
