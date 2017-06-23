
    <?php
        Theme::plugins('pageBegin');
        $content = $Page->content();
        $title = $Page->title();
            // add content
            echo '<div class="title">'.$title.'</div>';
            echo '<div class="content">'.$content.'</div>';
        Theme::plugins('pageEnd');
    ?>
