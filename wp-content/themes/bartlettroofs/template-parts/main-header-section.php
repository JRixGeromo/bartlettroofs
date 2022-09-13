<figure class="page-hero page-hero-form">
   <div class="div-table">
      <div class="div-table-cell">
         <div class="container">
            <figcaption class="hero-inner">
               <div class="h1"><?php the_field('main_header_section') ?></div>
               <div class="lead"><?php the_field('main_header_section_content') ?></div>
            </figcaption>
         </div>
      </div>
   </div>
   <picture>
      <?php
         $uri_segments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
         $image = "";
         if($uri_segments[2] == "roofing") {
            $image = "hero-roofing.jpg";
         } else if($uri_segments[2] == "commercial-roofing") {
            $image = "hero-commercial-roofing.jpg";
         } else if($uri_segments[2] == "storm-damage-restoration") {
            $image = "hero-storm-damage.jpg";
         }         
      ?>

      <img class="page-hero-bg" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/page/<?php echo $image ;?>" alt="Background Photo" />

   </picture>
</figure>