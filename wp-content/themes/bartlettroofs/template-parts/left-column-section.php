<div class="col-md-6 format-page">
   <div class="bs-gallery" data-galleryid="" tabindex="1">
      <div class="modal">
         <div class="modal-dialog">
            <a href="#" data-toggle="collapse" data-target=".modal-dock" aria-expanded="false" aria-controls="modal-dock" class="modal-dock-overlay">
            <span class="sr-only">Enlarge Image</span>
            </a>
            <div class="row modal-row">
               <div class="col-md-9 modal-col modal-col-canvas">
                  <div class="modal-canvas-body">
                     <div class="overlay-label"></div>
                     <a href="#" class="btn btn-close" data-dismiss="modal" aria-hidden="true">
                     <span class="sr-only">Close</span>
                     <i class="fal fa-times" aria-hidden="true"></i>
                     </a>
                     <div class="modal-canvas">
                        <div class="modal-media">
                           <span class="modal-media-helper"></span>
                        </div>
                     </div>
                     <div class="modal-controls">
                        <button type="button" class="btn btn-link btn-prev">
                        <span class="sr-only">Previous Image</span>
                        <i class="fal fa-chevron-left fa-fw" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-link btn-thumbnails" data-toggle="collapse" data-target=".modal-dock" aria-expanded="false" aria-controls="modal-dock">
                        <span class="sr-only">All Images</span>
                        <i class="fas fa-th fa-fw" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-link btn-next">
                        <span class="sr-only">Next Image</span>
                        <i class="fal fa-chevron-right fa-fw" aria-hidden="true"></i>
                        </button>
                        <span class="media-count"><span class="current-count count">1</span><small class="text-muted count">of</small><span class="total-count count">1</span></span>
                     </div>
                     <div class="modal-dock collapse">
                        <div class="dock-title">
                           <button type="button" class="btn btn-link btn-close" data-toggle="collapse" data-target=".modal-dock" aria-expanded="false" aria-controls="modal-dock">
                           <span class="sr-only">Close</span>
                           <i class="fal fa-times" aria-hidden="true"></i>
                           </button>
                           <span class="gallery-label gallery-title ellipsis"></span>
                        </div>
                        <div class="modal-thumbnails">
                        </div>
                     </div>
                  </div>
                  <!-- /.modal-canvas -->
               </div>
               <!-- /.col-md-8 -->
               <div class="col-md-3 modal-col modal-col-content">
                  <div class="modal-content">
                     <span class="gallery-label gallery-title"></span>
                     <a class="original-img-link" href="#" target="_blank">
                     View Original Image
                     <i class="fas fa-external-link mr-2-left" aria-hidden="true"></i>
                     </a>
                     <p class="modal-title"></p>
                     <p class="modal-caption"></p>
                  </div>
                  <div class="bs-gallery-btn-group-share">
                     <p class="gallery-label">Share This</p>
                     <a class="btn btn-link" href="https://www.facebook.com/sharer/sharer.php?u=https%3a%2f%2fwww.bartlettroofs.com%2fcommercial-roofing%2frepair%2f" target="_blank">
                     <span class="sr-only">Facebook</span>
                     <i class="fab fa-facebook-f fa-fw" aria-hidden="true"></i>
                     </a>
                     <a class="btn btn-link" href="https://twitter.com/home?status=Thought%20you%20might%20like%20this https%3a%2f%2fwww.bartlettroofs.com%2fcommercial-roofing%2frepair%2f" target="_blank">
                     <span class="sr-only">Twitter</span>
                     <i class="fab fa-twitter fa-fw" aria-hidden="true"></i>
                     </a>
                     <a class="btn btn-link" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3a%2f%2fwww.bartlettroofs.com%2fcommercial-roofing%2frepair%2f" target="_blank">
                     <span class="sr-only">LinkedIn</span>
                     <i class="fab fa-linkedin-in fa-fw" aria-hidden="true"></i>
                     </a>
                     <a class="btn btn-link" href="https://pinterest.com/pin/create/button/?url=https%3a%2f%2fwww.bartlettroofs.com%2fcommercial-roofing%2frepair%2f&amp;media=#MEDIA#" target="_blank">
                     <span class="sr-only">Pinterest</span>
                     <i class="fab fa-pinterest-p fa-fw" aria-hidden="true"></i>
                     </a>
                     <a class="btn btn-link" href="mailto:?subject=Thought%20you%20might%20like%20this%20from Bartlett%20Roofing%20&amp;body=Check%20this%20out%20from Bartlett%20Roofing https%3a%2f%2fwww.bartlettroofs.com%2fcommercial-roofing%2frepair%2f" target="_blank">
                     <span class="sr-only">Email</span>
                     <i class="fas fa-envelope fa-fw" aria-hidden="true"></i>
                     </a>
                  </div>
                  <!-- /.modal-content -->
               </div>
               <!-- /.col-md-4 -->
            </div>
            <!-- /.row -->
         </div>
         <!-- /.modal-dialog -->
      </div>
   </div>
   <script defer="" src="<?php echo get_stylesheet_directory_uri();?>/assets/js/bundle/bundle.ui.gallery.min.js?v=16.19.1"></script>
   <h1><?php echo  the_field('left_content_header_1') ?></h1>
   <div class="page-content">
      <p><?php the_field('left_content_1') ?></p>
      <h2><?php the_field('left_content_header_2') ?></h2>
      <p><?php the_field('left_content_2') ?></p>
      <h2><?php the_field('left_content_header_3') ?></h2>
      <p><?php the_field('left_content_3') ?></p>
      <h2><?php the_field('left_content_header_4') ?></h2>
      <p><?php the_field('left_content_4') ?></p>
      <h2><?php the_field('left_content_header_5') ?></h2>
      <p><?php the_field('left_content_5') ?></p>      
      <h2><?php the_field('left_content_header_6') ?></h2>
      <p><?php the_field('left_content_6') ?></p>      
      <?php
         $uri_segments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
         if($uri_segments[2]=='about-us') {
            get_template_part('template-parts/left-column-google-section','left-column-google-section');
         }
      ?>
      <?php // the_field('residential_roofing_bread_crumb') ?>
   </div>
</div>`