<div class="page-section benefits-section triggerAnimate fadeInUp">
   <div class="section-header">
      <h2 class="section-title"><?php the_field('main_benefits_section') ?></h2>
   </div>
   <?php
      $uri_segments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
      if($uri_segments[3] == "residential-roofing") {
         get_template_part('template-parts/gallery-section-residential-roofing-section','gallery-section-residential-roofing-section');
      } else if($uri_segments[3] == "commercial-roofing") {
         get_template_part('template-parts/gallery-section-commercial-roofing-section','gallery-section-commercial-roofing-section');
      } else if($uri_segments[3] == "storm-damage-2") {
         get_template_part('template-parts/gallery-section-storm-damage-section','gallery-section-storm-damage-section');
      }
   ?>
</div>