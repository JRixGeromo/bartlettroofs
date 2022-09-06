<section class="page-section gallery-section">
   <div class="container">
      <div class="row">
         <div class="col-md-9 triggerAnimate fadeInLeft delay-2ms">
            <h2 class="section-title"><?php echo the_field('main_gallery_section') ?></h2>
            <p class="lead"><?php echo the_field('main_gallery_section_content') ?>.</p>
         </div>
         <div class="col-md-3 triggerAnimate fadeInRight delay-4ms">
            <a href="../gallery/index.html" class="btn btn-info btn-lg btn-padding">Explore</a>
         </div>
      </div>
   </div>
   <?php
      $uri_segments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
      if($uri_segments[3] == "residential-roofing") {
         get_template_part('template-parts/main-gallery-residential-roofing-section','main-gallery-residential-roofing-section');
      } else if($uri_segments[3] == "commercial-roofing") {
         get_template_part('template-parts/main-gallery-commercial-roofing-section','main-gallery-commercial-roofing-section');
      } else if($uri_segments[3] == "storm-damage-2") {
         get_template_part('template-parts/main-gallery-storm-damage-section','main-gallery-storm-damage-section');
      }
   ?>  
</section>