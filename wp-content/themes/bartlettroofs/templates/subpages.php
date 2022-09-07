
<?php
   $uri_segments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

   if($uri_segments[2] == 'offers' && $uri_segments[3] == 'offers') { 
      get_template_part('template-parts/offers-content-section','offers-content-section');
   } else {
      get_template_part('template-parts/center-wide-column-section','center-wide-column-section');
      ?>
      <div class="container container-page">
         <div class="row">
            <?php
               get_template_part('template-parts/left-column-section','left-column-section');
            ?>
            <?php
               if($uri_segments[2] == 'offers') { 
                  get_template_part('template-parts/right-column-offers-section','right-column-offers-section');
               } else {
                  get_template_part('template-parts/right-column-section','right-column-section');
               }
            ?>
         </div>
      </div>
      <?php
      get_template_part('template-parts/lower-bread-crumb-section','lower-bread-crumb-section');
   }   
?>


