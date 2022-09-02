<?php
   get_header();
   $uri_segments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>    
      <?php if($uri_segments[2] == "main") { ?>
         <style>
            .page-hero { margin-bottom: 0px; }
         </style>   
         <!-- note: need to add condition in order to show the main page or the category page -->
         <!-- main pages -->
         <input type="hidden" id="page-selected" value="front">
         <?php
            get_template_part('templates/main-page','main-page');
         ?>
         <!-- end of: main pages -->
      <?php } else { ?>
         <!-- note: need to add condition in order to show the main page or the category page -->
         <!-- subpages -->
         <input type="hidden" id="page-selected" value="single">
         <?php
            get_template_part('template-parts/center-wide-column-section','center-wide-column-section');
         ?>
         <div class="container container-page">
            <div class="row">
               <?php
                  get_template_part('template-parts/left-column-section','left-column-section');
               ?>
               <?php
                  get_template_part('template-parts/right-column-section','right-column-section');
               ?>
            </div>
         </div>
         <?php
            get_template_part('template-parts/lower-bread-crumb-section','lower-bread-crumb-section');
         ?>
         <!-- end of: subpages -->
      <?php } ?>
<?php
   get_footer();
?>