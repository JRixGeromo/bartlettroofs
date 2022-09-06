<section class="page-section services-section triggerAnimate fadeInUp">
   <div class="container">
      <div class="row">
         <div class="col-md-9 match-height triggerAnimate fadeInLeft delay-2ms">
            <h2 class="section-title"><?php echo the_field('main_services_section') ?></h2>
            <p class="lead"><?php echo the_field('main_services_section_content') ?></p>
         </div>
         <div class="col-md-3 match-height triggerAnimate fadeInRight delay-4ms">
            <div class="div-table">
               <div class="div-table-cell">
                  <a href="#price-quote" class="btn btn-primary btn-padding btn-lg scroll-to">Book Your Inspection</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php
      $uri_segments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
      if($uri_segments[3] == "residential-roofing") {
         get_template_part('template-parts/main-services-residential-roofing-section','main-services-residential-roofing-section');
      } else if($uri_segments[3] == "commercial-roofing") {
         get_template_part('template-parts/main-services-commercial-roofing-section','main-services-commercial-roofing-section');
      } else if($uri_segments[3] == "storm-damage-2") {
         get_template_part('template-parts/main-services-storm-damage-section','main-services-storm-damage-section');
      }
   ?>   
</section>