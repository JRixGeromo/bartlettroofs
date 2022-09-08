<section class="intro-section">
   <div class="container-fluid">
      <div class="row">
         <?php
            $uri_segments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
            $cls = "";
            if($uri_segments[3] == "residential-roofing") {
               $cls = "roofing-intro-bg";
            } else if($uri_segments[3] == "commercial-roofing") {
               $cls = "commercial-roofing-intro-bg";
            } else if($uri_segments[3] == "storm-damage-2") {
               $cls = "storm-damage-intro-bg";
            }
         ?>
         <div class="col-md-5 intro-bg <?php echo $cls ?> match-height"></div>
         <div class="col-md-7 match-height">
            <div class="row intro-content">
               <h1><?php the_field('main_intro_section') ?></h1>
               <p><?php the_field('main_intro_section_content') ?></p>
            </div>
         </div>
      </div>
   </div>
</section>