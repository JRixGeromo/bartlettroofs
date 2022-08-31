<?php
   get_header();
?>
      <!-- note: need to add condition in order to show the main page or the category page -->
      <!-- main pages -->
      <?php
         get_template_part('template-parts/main-roofing-section','main-roofing-section');
      ?>
      <!-- end of: main pages -->


        
      <!-- note: need to add condition in order to show the main page or the category page -->
      <!-- subpages -->
      <input type="hidden" id="page-selected" value="single">
      <a href="#price-quote" class="btn btn-primary btn-quote-ft-mobile scroll-to showme">Book Your Inspection</a>
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

<?php
   get_footer();
?>