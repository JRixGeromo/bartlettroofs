<?php
   get_header();
   $uri_segments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>    
      <?php if(($uri_segments[2] == "roofing" || $uri_segments[2] == "commercial-roofing" || $uri_segments[2] == "storm-damage-restoration") && ($uri_segments[3] == ""))  { 
         ?>
         <style>
            .page-hero { margin-bottom: 0px; }
         </style>   
         <!-- note: need to add condition in order to show the main page or the category page -->
         <!-- main pages -->
         <input type="hidden" id="page-selected" value="front">
         <?php
            get_template_part('templates/main-pages','main-pages');
         ?>
         <!-- end of: main pages -->
      <?php } else { ?>         
         <!-- note: need to add condition in order to show the main page or the category page -->
         <!-- subpages -->
         <input type="hidden" id="page-selected" value="<?php echo ($uri_segments[2] == 'offer' ? 'front':'single') ?>">
         <?php
            get_template_part('templates/subpages','subpages');
         ?>
         <!-- end of: subpages -->
      <?php } ?>
<?php
   get_footer();
?>