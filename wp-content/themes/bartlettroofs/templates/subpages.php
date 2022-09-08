
<?php
   $uri_segments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

   if($uri_segments[2] == 'offers' && $uri_segments[3] == 'offers') { 
      get_template_part('template-parts/offers-content-section','offers-content-section');
   } else if($uri_segments[2] == 'gallery' && $uri_segments[3] == 'gallery') { 
      get_template_part('template-parts/gallery-content-section','gallery-content-section');
   } else if($uri_segments[2] == 'careers' && $uri_segments[3] == 'careers') { 
      get_template_part('template-parts/careers-content-section','careers-content-section');
   } else if($uri_segments[2] == 'contact-us' && $uri_segments[3] == 'contact-us') { 
      get_template_part('template-parts/contact-us-content-section','contact-us-content-section');
   } else if($uri_segments[2] == 'customer-service' && $uri_segments[3] == 'customer-service') { 
      get_template_part('template-parts/customer-service-content-section','customer-service-content-section');
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
               } else if($uri_segments[2] == 'blog') { 
                  get_template_part('template-parts/right-column-blog-section','right-column-blog-section');
               } else if($uri_segments[2] == 'reviews') { 
                  get_template_part('template-parts/right-column-reviews-section','right-column-reviews-section');
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


