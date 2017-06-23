<?php
            echo $treadmill->get();

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




<script>


"use strict";


function datumString(datum) {
        var datumString = '';
        var now = new Date();
        var diff = now.valueOf() - datum.valueOf();
        if (Math.floor(diff/(1000*60)) == 0) {
            datumString = 'vor ' + Math.floor(diff/(1000)).toString() + 's';
        } else if (Math.floor(diff/(1000*60*60)) == 0) {
            datumString = 'vor ' + Math.floor(diff/(1000*60)).toString() + 'min';
        } else if (Math.floor(diff/(1000*60*60* 24)) == 0) {
            datumString =  'vor ' + Math.floor(diff/(1000*60*60)).toString() + 'h';
        } else if ( Math.floor(diff/(1000*60*60* 24)) == 1 ) {
            datumString = 'gestern';
        } else {
            var m = datum.getMonth();
            var d = datum.getDate();
            var month_names = [
                                "Januar",
                                "Februar",
                                "März",
                                "April",
                                "Mai",
                                "Juni",
                                "Juli",
                                "August",
                                "September",
                                "Oktober",
                                "November",
                                "Dezember",
                                ];
            datumString = d.toString() + '. ' + month_names[m] ;
        }
        return datumString;
}




function fillGallery(data) {
    var template = document.getElementById('gallerytemplate').innerHTML;
    for (var i = 0; i < data.data.length; i++) {
        var datum = datumString(new Date(parseInt(data.data[i].created_time) * 1000));
        var rendered = template
                            .replace('{{image}}',data.data[i].images.low_resolution.url)
                            .replace('{{link}}',data.data[i].link)
                            .replace('{{datum}}',datum);
        document.getElementById('media').innerHTML += rendered;
     }
}




// var instagramGallery = document.createElement('script');
// instagramGallery.src = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=328950673.93e3299.50f6a823351144fa89ff552524d343c6&count=18&callback=fillGallery';


// document.getElementsByTagName('head')[0].appendChild(instagramGallery);

</script>
