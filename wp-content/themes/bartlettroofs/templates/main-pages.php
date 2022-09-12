<?php
   get_header();
?>
      <a href="#price-quote" class="btn btn-primary btn-quote-ft-mobile scroll-to showme">Book Your Inspection</a>
         <?php
            get_template_part('template-parts/main-header-section','main-header-section');
         ?>
      </div>
      <div class="hero-form">
         <?php
            get_template_part('template-parts/book-for-inspection-section','book-for-inspection-section');
         ?>
      </div>
      <div class="main-content">
         <?php
            get_template_part('template-parts/main-intro-section','main-intro-section');
         ?>
         <!-- intro section -->
         <?php
            get_template_part('template-parts/main-testimonial-section','main-testimonial-section');
         ?>
         <!-- testimonial section -->
         <?php
            get_template_part('template-parts/main-benefits-section','main-benefits-section');
         ?>
         <!-- benefits section -->
         <?php
            get_template_part('template-parts/main-services-section','main-services-section');
         ?>
         <!-- services section -->
         <?php
         $uri_segments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
         if($uri_segments[2] == 'main' && $uri_segments[3] == 'residential-roofing') { 
         ?>
         <section class="page-section">
            <div data-shingle="trudefinition-duration-designer"
               class="oc_shingle_view"></div>
            <script src="<?php echo get_template_directory_uri() ?>/assets/js/public-widget.js" async></script>
         </section>
         <?php
         }
         ?>
         <!-- OC widget section -->
         <?php
            get_template_part('template-parts/main-offers-section','main-offers-section');
         ?>
         <!-- offers section -->
         <?php
            get_template_part('template-parts/main-gallery-section','main-gallery-section');
         ?>
         <!-- gallery section -->
         <?php
            get_template_part('template-parts/main-service-areas-section','main-service-areas-section');
         ?>         
         <!-- service areas section -->
         <?php
            get_template_part('template-parts/main-cta-section','main-cta-section-');
         ?>           
         <!-- cta section -->
      </div>
<?php
   get_footer();
?>