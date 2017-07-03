<?php
            echo $treadmill->get();
?>
        <div style="clear: both;"></div>
        <a href="https://facebook.com/tim.thomczyk">
            <i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
        </a>
        <a href="https://instagram.com/timthomczyk">
            <i style="float: right;" class="fa fa-instagram fa-2x" aria-hidden="true"></i>
        </a>
        <div style="clear: both;"></div>

<?php
            $newsExhiPosts = $APL->getPostsByTaglist(['News']);
            
            foreach ($newsExhiPosts as $i) {
                echo '<div class="newslist">';
                echo '<a href="'.$i->permalink() .'">';
                echo '<h3>'.$i->title().'</h3>';
                if($i->coverImage()) {
                    echo '<img src="'.$i->coverImage().'" alt="Cover Image">';
                }
                echo '<h6>'.$i->description().'</h6>';
                echo '<h6>'.$i->date().'</h5>';
                echo '</a>';
                echo '</div>';
            }
            echo '<div style="clear: both;"></div>';
?>





                        <div class="mdl-grid" id="media">
                            <script id="gallerytemplate" type="no-brainer-template">
                                <div class="mdl-cell mdl-cell--2-col mdl-cell--2-col-phone  mdl-cell--2-col-tablet">
                                <a href='{{link}}' target='_blank' style="text-decoration: none;">
                                    <div class="mdl-card"
                                                    style="width: auto; height: auto; background:url('{{image}}') center center; background-size: inherit;">
                                        <div class="mdl-card__title mdl-card--expand">
                                            <div style="width: 100%;"> <!-- seltsam, aber nötig -->
                                            </div>
                                        </div>
                                        <div class="mdl-card__actions mdl-card--border" 
                                            style="background: rgba(0,0,0,0.2); color: white; font-weight: 900; text-align: right;">
                                                {{datum}}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                                </div> <!-- cell-->
                            </script>
                        </div> <!-- media grid -->




