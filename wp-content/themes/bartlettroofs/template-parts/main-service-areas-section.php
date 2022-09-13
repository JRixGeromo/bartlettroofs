<section class="page-section service-areas-section">
   <div class="container">
      <div class="row">
         <div class="col-md-9 triggerAnimate fadeInLeft delay-2ms">
            <h2 class="section-title"><?php the_field('main_service_areas_section') ?></h2>
         </div>
         <div class="col-md-3 triggerAnimate fadeInRight delay-4ms">
            <a href="/bartlettroofs/service-areas/#" class="btn btn-info btn-lg btn-padding">View More</a>
         </div>
      </div>
      <?php
         get_template_part('template-parts/main-service-areas-map-section','main-service-areas-map-section');
      ?>
   </div>
</section>