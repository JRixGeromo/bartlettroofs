<?php
   get_header();
?>
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
<!-- /wrapper -->
<?php
   get_footer();
?>