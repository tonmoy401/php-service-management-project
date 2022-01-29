<?php
    session_start();
    require_once('../header.php');
    require_once('../db.php');
    require_once('navbar.php');
    if(!isset($_SESSION['user_status'])){
        header('location:../login.php');
    }
     //get data from form
    $get_query = "SELECT * FROM social_medias";
    $from_db = mysqli_query($db_connect,$get_query);
?>

<section>
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-capitalize">social media add form</h5>
                </div>
                <div class="card-body">
                                                    
                                                         <?php
                                                            if(isset($_SESSION['social_err_msg'])){
                                                        ?>
                                                            <div class="alert alert-danger" role="alert">
                                                            <?php
                                                               echo $_SESSION['social_err_msg'];
                                                               unset($_SESSION['social_err_msg']);
                                                            ?>
                                                            </div>
                                                            <?php 
                                                                }
                                                         ?> 

                    <form action="social_media_post.php" method="post">
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">page link</label>
                                <input type="url" class="form-control" name="page_link" value="<?=(isset($_SESSION['page_link_done'])) ? $_SESSION['page_link_done'] : ''?>">
                                <?php if(isset($_SESSION['page_link_err'])): ?>
                                <small class="text-danger"><?=$_SESSION['page_link_err']?></small>
                                <?php unset($_SESSION['page_link_err']) ?>
                                <?php endif ?>
                                 
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">icon class name</label>
                                <input type="text" class="form-control" name="social_icon" id="social_icon" value="<?=(isset($_SESSION['social_icon_done'])) ? $_SESSION['social_icon_done'] : ''?>" readonly>
                                <?php if(isset($_SESSION['social_icon_err'])): ?>
                                <small class="text-danger"><?=$_SESSION['social_icon_err']?></small>
                                <?php unset($_SESSION['social_icon_err']) ?>
                                <?php endif ?>
                                 
                            </div>
                            <div class="mb-3 overflow-scroll" style="height:200px;">
                                <?php
                                $icons = array("fa-500px","fa-address-book","fa-address-book-o","fa-address-card","fa-address-card-o","fa-adjust","fa-adn","fa-align-center","fa-align-justify","fa-align-left","fa-align-right",
                                "fa-amazon","fa-ambulance","fa-american-sign-language-interpreting","fa-anchor","fa-android","fa-angellist","fa-angle-double-down","fa-angle-double-left","fa-angle-double-right","fa-angle-double-up",
                                "fa-angle-down","fa-angle-left","fa-angle-right","fa-angle-up","fa-apple","fa-archive","fa-area-chart","fa-arrow-circle-down","fa-arrow-circle-left","fa-arrow-circle-o-down","fa-arrow-circle-o-left",
                                "fa-arrow-circle-o-right","fa-arrow-circle-o-up","fa-arrow-circle-right","fa-arrow-circle-up","fa-arrow-down","fa-arrow-left","fa-arrow-right","fa-arrow-up","fa-arrows","fa-arrows-alt","fa-arrows-h",
                                "fa-arrows-v","fa-assistive-listening-systems","fa-asterisk","fa-at","fa-audio-description","fa-backward","fa-balance-scale","fa-ban","fa-bandcamp","fa-bar-chart","fa-barcode","fa-bars","fa-bath",
                                "fa-battery-empty","fa-battery-full","fa-battery-half","fa-battery-quarter","fa-battery-three-quarters","fa-bed","fa-beer","fa-behance","fa-behance-square","fa-bell","fa-bell-o","fa-bell-slash",
                                "fa-bell-slash-o","fa-bicycle","fa-binoculars","fa-birthday-cake","fa-bitbucket","fa-bitbucket-square","fa-black-tie","fa-blind","fa-bluetooth","fa-bluetooth-b","fa-bold","fa-bolt","fa-bomb","fa-book",
                                "fa-bookmark","fa-bookmark-o","fa-braille","fa-briefcase","fa-btc","fa-bug","fa-building","fa-building-o","fa-bullhorn","fa-bullseye","fa-bus","fa-buysellads","fa-calculator","fa-calendar",
                                "fa-calendar-check-o","fa-calendar-minus-o","fa-calendar-o","fa-calendar-plus-o","fa-calendar-times-o","fa-camera","fa-camera-retro","fa-car","fa-caret-down","fa-caret-left","fa-caret-right",
                                "fa-caret-square-o-down","fa-caret-square-o-left","fa-caret-square-o-right","fa-caret-square-o-up","fa-caret-up","fa-cart-arrow-down","fa-cart-plus","fa-cc","fa-cc-amex","fa-cc-diners-club",
                                "fa-cc-discover","fa-cc-jcb","fa-cc-mastercard","fa-cc-paypal","fa-cc-stripe","fa-cc-visa","fa-certificate","fa-chain-broken","fa-check","fa-check-circle","fa-check-circle-o","fa-check-square",
                                "fa-check-square-o","fa-chevron-circle-down","fa-chevron-circle-left","fa-chevron-circle-right","fa-chevron-circle-up","fa-chevron-down","fa-chevron-left","fa-chevron-right","fa-chevron-up","fa-child",
                                "fa-chrome","fa-circle","fa-circle-o","fa-circle-o-notch","fa-circle-thin","fa-clipboard","fa-clock-o","fa-clone","fa-cloud","fa-cloud-download","fa-cloud-upload","fa-code","fa-code-fork","fa-codepen",
                                "fa-codiepie","fa-coffee","fa-cog","fa-cogs","fa-columns","fa-comment","fa-comment-o","fa-commenting","fa-commenting-o","fa-comments","fa-comments-o","fa-compass","fa-compress","fa-connectdevelop",
                                "fa-contao","fa-copyright","fa-creative-commons","fa-credit-card","fa-credit-card-alt","fa-crop","fa-crosshairs","fa-css3","fa-cube","fa-cubes","fa-cutlery","fa-dashcube","fa-database","fa-deaf",
                                "fa-delicious","fa-desktop","fa-deviantart","fa-diamond","fa-digg","fa-dot-circle-o","fa-download","fa-dribbble","fa-dropbox","fa-drupal","fa-edge","fa-eercast","fa-eject","fa-ellipsis-h","fa-ellipsis-v",
                                "fa-empire","fa-envelope","fa-envelope-o","fa-envelope-open","fa-envelope-open-o","fa-envelope-square","fa-envira","fa-eraser","fa-etsy","fa-eur","fa-exchange","fa-exclamation","fa-exclamation-circle",
                                "fa-exclamation-triangle","fa-expand","fa-expeditedssl","fa-external-link","fa-external-link-square","fa-eye","fa-eye-slash","fa-eyedropper","fa-facebook","fa-facebook-official","fa-facebook-square",
                                "fa-fast-backward","fa-fast-forward","fa-fax","fa-female","fa-fighter-jet","fa-file","fa-file-archive-o","fa-file-audio-o","fa-file-code-o","fa-file-excel-o","fa-file-image-o","fa-file-o","fa-file-pdf-o",
                                "fa-file-powerpoint-o","fa-file-text","fa-file-text-o","fa-file-video-o","fa-file-word-o","fa-files-o","fa-film","fa-filter","fa-fire","fa-fire-extinguisher","fa-firefox","fa-first-order","fa-flag",
                                "fa-flag-checkered","fa-flag-o","fa-flask","fa-flickr","fa-floppy-o","fa-folder","fa-folder-o","fa-folder-open","fa-folder-open-o","fa-font","fa-font-awesome","fa-fonticons","fa-fort-awesome","fa-forumbee",
                                "fa-forward","fa-foursquare","fa-free-code-camp","fa-frown-o","fa-futbol-o","fa-gamepad","fa-gavel","fa-gbp","fa-genderless","fa-get-pocket","fa-gg","fa-gg-circle","fa-gift","fa-git","fa-git-square",
                                "fa-github","fa-github-alt","fa-github-square","fa-gitlab","fa-glass","fa-glide","fa-glide-g","fa-globe","fa-google","fa-google-plus","fa-google-plus-official","fa-google-plus-square","fa-google-wallet",
                                "fa-graduation-cap","fa-gratipay","fa-grav","fa-h-square","fa-hacker-news","fa-hand-lizard-o","fa-hand-o-down","fa-hand-o-left","fa-hand-o-right","fa-hand-o-up","fa-hand-paper-o","fa-hand-peace-o",
                                "fa-hand-pointer-o","fa-hand-rock-o","fa-hand-scissors-o","fa-hand-spock-o","fa-handshake-o","fa-hashtag","fa-hdd-o","fa-header","fa-headphones","fa-heart","fa-heart-o","fa-heartbeat","fa-history",
                                "fa-home","fa-hospital-o","fa-hourglass","fa-hourglass-end","fa-hourglass-half","fa-hourglass-o","fa-hourglass-start","fa-houzz","fa-html5","fa-i-cursor","fa-id-badge","fa-id-card","fa-id-card-o",
                                "fa-ils","fa-imdb","fa-inbox","fa-indent","fa-industry","fa-info","fa-info-circle","fa-inr","fa-instagram","fa-internet-explorer","fa-ioxhost","fa-italic","fa-joomla","fa-jpy","fa-jsfiddle","fa-key",
                                "fa-keyboard-o","fa-krw","fa-language","fa-laptop","fa-lastfm","fa-lastfm-square","fa-leaf","fa-leanpub","fa-lemon-o","fa-level-down","fa-level-up","fa-life-ring","fa-lightbulb-o","fa-line-chart",
                                "fa-link","fa-linkedin","fa-linkedin-square","fa-linode","fa-linux","fa-list","fa-list-alt","fa-list-ol","fa-list-ul","fa-location-arrow","fa-lock","fa-long-arrow-down","fa-long-arrow-left",
                                "fa-long-arrow-right","fa-long-arrow-up","fa-low-vision","fa-magic","fa-magnet","fa-male","fa-map","fa-map-marker","fa-map-o","fa-map-pin","fa-map-signs","fa-mars","fa-mars-double","fa-mars-stroke",
                                "fa-mars-stroke-h","fa-mars-stroke-v","fa-maxcdn","fa-meanpath","fa-medium","fa-medkit","fa-meetup","fa-meh-o","fa-mercury","fa-microchip","fa-microphone","fa-microphone-slash","fa-minus",
                                "fa-minus-circle","fa-minus-square","fa-minus-square-o","fa-mixcloud","fa-mobile","fa-modx","fa-money","fa-moon-o","fa-motorcycle","fa-mouse-pointer","fa-music","fa-neuter","fa-newspaper-o",
                                "fa-object-group","fa-object-ungroup","fa-odnoklassniki","fa-odnoklassniki-square","fa-opencart","fa-openid","fa-opera","fa-optin-monster","fa-outdent","fa-pagelines","fa-paint-brush","fa-paper-plane",
                                "fa-paper-plane-o","fa-paperclip","fa-paragraph","fa-pause","fa-pause-circle","fa-pause-circle-o","fa-paw","fa-paypal","fa-pencil","fa-pencil-square","fa-pencil-square-o","fa-percent","fa-phone",
                                "fa-phone-square","fa-picture-o","fa-pie-chart","fa-pied-piper","fa-pied-piper-alt","fa-pied-piper-pp","fa-pinterest","fa-pinterest-p","fa-pinterest-square","fa-plane","fa-play","fa-play-circle",
                                "fa-play-circle-o","fa-plug","fa-plus","fa-plus-circle","fa-plus-square","fa-plus-square-o","fa-podcast","fa-power-off","fa-print","fa-product-hunt","fa-puzzle-piece","fa-qq","fa-qrcode","fa-question",
                                "fa-question-circle","fa-question-circle-o","fa-quora","fa-quote-left","fa-quote-right","fa-random","fa-ravelry","fa-rebel","fa-recycle","fa-reddit","fa-reddit-alien","fa-reddit-square","fa-refresh",
                                "fa-registered","fa-renren","fa-repeat","fa-reply","fa-reply-all","fa-retweet","fa-road","fa-rocket","fa-rss","fa-rss-square","fa-rub","fa-safari","fa-scissors","fa-scribd","fa-search","fa-search-minus",
                                "fa-search-plus","fa-sellsy","fa-server","fa-share","fa-share-alt","fa-share-alt-square","fa-share-square","fa-share-square-o","fa-shield","fa-ship","fa-shirtsinbulk","fa-shopping-bag","fa-shopping-basket",
                                "fa-shopping-cart","fa-shower","fa-sign-in","fa-sign-language","fa-sign-out","fa-signal","fa-simplybuilt","fa-sitemap","fa-skyatlas","fa-skype","fa-slack","fa-sliders","fa-slideshare","fa-smile-o",
                                "fa-snapchat","fa-snapchat-ghost","fa-snapchat-square","fa-snowflake-o","fa-sort","fa-sort-alpha-asc","fa-sort-alpha-desc","fa-sort-amount-asc","fa-sort-amount-desc","fa-sort-asc","fa-sort-desc",
                                "fa-sort-numeric-asc","fa-sort-numeric-desc","fa-soundcloud","fa-space-shuttle","fa-spinner","fa-spoon","fa-spotify","fa-square","fa-square-o","fa-stack-exchange","fa-stack-overflow","fa-star",
                                "fa-star-half","fa-star-half-o","fa-star-o","fa-steam","fa-steam-square","fa-step-backward","fa-step-forward","fa-stethoscope","fa-sticky-note","fa-sticky-note-o","fa-stop","fa-stop-circle",
                                "fa-stop-circle-o","fa-street-view","fa-strikethrough","fa-stumbleupon","fa-stumbleupon-circle","fa-subscript","fa-subway","fa-suitcase","fa-sun-o","fa-superpowers","fa-superscript","fa-table",
                                "fa-tablet","fa-tachometer","fa-tag","fa-tags","fa-tasks","fa-taxi","fa-telegram","fa-television","fa-tencent-weibo","fa-terminal","fa-text-height","fa-text-width","fa-th","fa-th-large","fa-th-list",
                                "fa-themeisle","fa-thermometer-empty","fa-thermometer-full","fa-thermometer-half","fa-thermometer-quarter","fa-thermometer-three-quarters","fa-thumb-tack","fa-thumbs-down","fa-thumbs-o-down",
                                "fa-thumbs-o-up","fa-thumbs-up","fa-ticket","fa-times","fa-times-circle","fa-times-circle-o","fa-tint","fa-toggle-off","fa-toggle-on","fa-trademark","fa-train","fa-transgender","fa-transgender-alt",
                                "fa-trash","fa-trash-o","fa-tree","fa-trello","fa-tripadvisor","fa-trophy","fa-truck","fa-try","fa-tty","fa-tumblr","fa-tumblr-square","fa-twitch","fa-twitter","fa-twitter-square","fa-umbrella",
                                "fa-underline","fa-undo","fa-universal-access","fa-university","fa-unlock","fa-unlock-alt","fa-upload","fa-usb","fa-usd","fa-user","fa-user-circle","fa-user-circle-o","fa-user-md","fa-user-o",
                                "fa-user-plus","fa-user-secret","fa-user-times","fa-users","fa-venus","fa-venus-double","fa-venus-mars","fa-viacoin","fa-viadeo","fa-viadeo-square","fa-video-camera","fa-vimeo","fa-vimeo-square","fa-vine",
                                "fa-vk","fa-volume-control-phone","fa-volume-down","fa-volume-off","fa-volume-up","fa-weibo","fa-weixin","fa-whatsapp","fa-wheelchair","fa-wheelchair-alt","fa-wifi","fa-wikipedia-w","fa-window-close",
                                "fa-window-close-o","fa-window-maximize","fa-window-minimize","fa-window-restore","fa-windows","fa-wordpress","fa-wpbeginner","fa-wpexplorer","fa-wpforms","fa-wrench","fa-xing","fa-xing-square",
                                "fa-y-combinator","fa-yahoo","fa-yelp","fa-yoast","fa-youtube","fa-youtube-play","fa-youtube-square");
                                ?>
                                <?php foreach ($icons as $icon): ?>
                                    <span id="fa <?=$icon?>" class="btn btn-dark m-2">
                                      <i class="fa <?=$icon?>"></i>
                                    </span>
                                  <?php endforeach ?>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add social_media</button>
                            </div>
                    </form>
                </div>
            </div>                
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-capitalize">social media list</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>SL</th>
                            <th>page link</th>
                            <th>icon class name</th>
                            <th>Active Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                              foreach($from_db AS $key => $social):
                            ?>
                           <tr>
                               <td><?=$key+1?></td>
                               <td><?=$social['page_link']?></td>
                               <td><?=$social['social_icon']?></td>
                               <td>
                                   <?php
                                   if($social['active_status'] == 1):
                                   ?>
                                    <span class="badge badge-sm bg-success">Active</span>
                                    <?php
                                     else:
                                   ?>
                                   <span class="badge badge-sm bg-warning">De-Active</span>
                                    <?php
                                   endif
                                   ?>
                                </td>
                               <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <?php
                                   if($social['active_status'] == 2):
                                   ?>
                                    <a href="social_active.php?social_id=<?=$social['id']?>"
                                    class="btn btn-sm btn-primary">Make Active</a>
                                    <?php
                                     else:
                                   ?>
                                   <a href="social_deactive.php?social_id=<?=$social['id']?>"
                                    class="btn btn-sm btn-warning">Make De-Active</a>
                                    <?php
                                   endif
                                   ?> 
                                    <a href="social_media_edit.php?social_id=<?=$social['id']?>" class="btn btn-sm btn-info">Edit</a>
                                    <button value="social_delete.php?social_id=<?=$social['id']?>" type="button" class="del-btn btn btn-sm btn-danger">Delete</button>
                                    </div>
                                </td>
                           </tr>
                           <?php
                             endforeach
                           ?>
                        </tbody>
                    </table>

                </div>
            </div>                
        </div>
    </div>
</div>
</section>

<?php
require_once('../footer.php');
?>



<script>
      //icon class select jq
  $('.btn-dark').click(function(){
    var id = $(this).attr('id');
      $('#social_icon').val(id);
  });
     
  //social delete jq
  $('.del-btn').click(function(){
    var link= $(this).val();
          Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
        }
      })
  });
</script>
<?php if(isset($_SESSION['social_success'])): ?>

<script>
  //social added success
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 1400,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: '<?=$_SESSION['social_success']?>'
})
</script>
<?php endif ?>
<?php unset($_SESSION['social_success']) ?>




<?php if(isset($_SESSION['social_edit'])): ?>

<script>
   ////social edit success jq
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Your work has been saved',
  showConfirmButton: false,
  timer: 1500
})

</script>
<?php endif ?>

<?php unset($_SESSION['social_edit']) ?>




