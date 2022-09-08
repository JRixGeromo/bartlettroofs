<div class="col-md-6">
   <div id="quote-form" class="quote-form panel panel-quote-form">
      <div class="panel-body">
         <div class="section-header text-center">
            <p class="h2">Let’s Get You A Free Quote</p>
         </div>
         <div class="row">
            <div class="col-sm-5 credibility text-center">
               <div class="item">
                  <div class="aggregate-reviews">
                     <div class="credibility-description media d-inline-block mx-auto">
                        <div class="media-left hide"><i class="fab fa-google fa-2x" aria-hidden="true"></i></div>
                        <div class="review-stars media-body vertical-align-middle">
                           <span class="fas fa-star fa-lg" aria-hidden="true"></span> <span class="fas fa-star fa-lg" aria-hidden="true"></span> <span class="fas fa-star fa-lg" aria-hidden="true"></span> <span class="fas fa-star fa-lg" aria-hidden="true"></span> <span class="fas fa-star fa-lg" aria-hidden="true"></span> 
                        </div>
                     </div>
                     <div>
                        <div class="rating">
                           <span class="average">4.7</span> out of <span class="best">5</span>
                        </div>
                        Out of <span class="votes">505</span> Reviews
                     </div>
                  </div>
               </div>
               <div class="item">
                  <img class="img-responsive center-block hvr-float filter-none" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/brand-inc.svg" alt="Inc 500">
               </div>
               <div class="item">
                  <img class="img-responsive center-block hvr-float" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/brand-bbb.svg" alt="BBB">
               </div>
               <div class="item">
                  <img class="img-responsive center-block hvr-float" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/brand-owenscorning.svg" alt="Owens Corning">
               </div>
            </div>
            <!-- /col -->
            <div class="col-sm-7">
               <form id="price-quote" action="/thank-you/quote-thank-you/?ref=pricing" method="post" role="form">
                  <div class="form-group">
                     <label for="name" class="sr-only">Full Name</label>
                     <input id="name" name="name" class="form-control" type="text" placeholder="Full Name" maxlength="50">
                  </div>
                  <div class="form-group">
                     <label for="email" class="sr-only">Email Address</label>
                     <input id="email" name="email" class="form-control" type="email" placeholder="Email Address" maxlength="50">
                  </div>
                  <div class="form-group">
                     <label for="phone" class="sr-only">Phone Number</label>
                     <input id="phone" name="phone" class="form-control" type="tel" placeholder="Phone Number" maxlength="14">
                  </div>
                  <div class="form-group">
                     <label for="address" class="sr-only">Full Address</label>
                     <input id="address" name="address" class="form-control" type="text" placeholder="Full Address" autocomplete="none">
                     <input id="g-address1" name="address1" type="hidden" autocomplete="none">
                     <input id="g-address2" name="address2" type="hidden" autocomplete="none">
                     <input id="g-city" name="city" type="hidden" autocomplete="none">
                     <input id="g-neighborhood" name="neighborhood" type="hidden" autocomplete="none">
                     <input id="g-state" name="state" type="hidden" autocomplete="none">
                     <input id="g-zip" name="zip" type="hidden" autocomplete="none">
                     <input id="g-county" name="county" type="hidden" autocomplete="none">
                     <input id="g-country" name="country" type="hidden" autocomplete="none">
                     <input id="g-latitude" name="latitude" type="hidden" autocomplete="none">
                     <input id="g-longitude" name="longitude" type="hidden" autocomplete="none">
                  </div>
                  <div class="form-group">
                     <label for="service" class="sr-only">Project Type</label>
                     <select id="service" name="service" class="form-control">
                        <option value="">Project Type</option>
                        <option value="Roof Replacement">Roof Replacement</option>
                        <option value="Residential Roofing">Residential Roofing</option>
                        <option value="Commercial Roofing">Commercial Roofing</option>
                        <option value="Storm Damage Restoration">Storm Damage Restoration</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="details" class="sr-only">Project Description</label>
                     <textarea id="details" name="details" class="form-control" placeholder="Project Description" rows="2" maxlength="3000"></textarea>
                  </div>
                  <input type="hidden" name="setappointment" value="false" autocomplete="off">
                  <input id="price-quote-type" name="type" type="hidden" value="Quote">
                  <input id="quoteToken" name="quoteToken" type="hidden" value="">
                  <input type="hidden" name="form" value="remodeler">
                  <input id="check" name="spamCheck" class="covered" value="">
                  <button id="price-quote-submit" class="btn btn-lg btn-block btn-primary btn-padding submit-form" type="button">
                  Book Your Inspection
                  </button>
               </form>
            </div>
            <!-- /col -->
         </div>
         <!-- /row -->
      </div>
   </div>
   <!-- /.quote-form -->
   <script defer="" src="/js/bundle/bundle.ui.quote.min.js?v=16.19.1"></script>
   <div id="Headquarters" class="panel panel-default company-location-panel">
      <div class="panel-hero half-hero google-map" style="background-image: url(https://maps.google.com/maps/api/staticmap?&amp;zoom=14&amp;size=640x480&amp;maptype=roadmap&amp;markers=color:red|370+N+Mitchell+St.%20Boise,%20ID&amp;sensor=false&amp;key=AIzaSyAtavuCH8fW-A59I_FFVDezYSd2gfzN55k)">
         <a href="https://g.page/r/CYaHXbgOQ2c2EBM" target="_blank">
         <img class="img-responsive" alt="Bartlett Roofing location" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/google-static-map-placeholder.gif">
         </a>
      </div>
      <div class="panel-body match-height">
         <h4 class="company-location-heading">
            Headquarters
            <small class="text-muted">Bartlett Roofing</small>
         </h4>
         <hr>
         <ul class="fa-ul">
            <li class="mb-1">
               <i class="fas fa-map-marker-alt fa-li" aria-hidden="true"></i>
               370 N Mitchell St. Boise, ID 83704
            </li>
            <li>
               <i class="fas fa-phone fa-li" aria-hidden="true"></i>
               (208) 273-4277
            </li>
         </ul>
      </div>
      <div class="panel-footer">
         <div class="btn-group btn-group-justified" role="toolbar" aria-label="Contact Page Toolbar">
            <div class="btn-group" role="group" aria-label="Send a Message">
               <button class="btn btn-block btn-info btn-padding" data-toggle="modal" data-target=".modal-send-message" data-backdrop="static" data-location="Headquarters" data-locationid="24274fc3-1830-484c-ae52-e2df8e9949e9">
               Send Message
               </button>
            </div>
            <div class="btn-group" role="group" aria-label="Get Driving Directions">
               <a class="btn btn-block btn-info btn-padding" href="https://g.page/r/CYaHXbgOQ2c2EBM" target="_blank">
               Get Directions
               </a>
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade modal-send-message">
      <div class="modal-dialog modal-form">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">
               <span class="sr-only">Close</span>
               <i class="fal fa-times" aria-hidden="true"></i>
               </button>
               <p class="modal-title">Send a Message</p>
            </div>
            <form id="contact-form" action="/thank-you/?contact=1" method="post" role="form">
               <div class="modal-body">
                  <p>We are here to help answer any questions, comments or concerns you may have. Send us a message and we will respond as soon as we can.</p>
                  <div class="form-group">
                     <label for="name">Full Name</label>
                     <input id="name" name="name" class="form-control" type="text" placeholder="John Doe" maxlength="50">
                  </div>
                  <div class="form-group">
                     <label for="phone">Phone Number</label>
                     <input id="phone" name="phone" class="form-control" type="tel" placeholder="555-555-5555" maxlength="14">
                  </div>
                  <div class="form-group">
                     <label for="email">Email Address</label>
                     <input id="email" name="email" class="form-control" type="email" placeholder="email@example.com" maxlength="50">
                  </div>
                  <div class="form-group">
                     <input id="service" name="service" type="hidden" value="default">
                  </div>
                  <div class="form-group">
                     <label for="details">Comments</label>
                     <textarea id="details" name="details" class="form-control" rows="3" maxlength="3000"></textarea>
                  </div>
                  <input type="hidden" name="location" id="input-location" value="">
                  <input type="hidden" name="locationId" id="input-locationId" value="">
                  <input type="hidden" name="form" value="contact">
                  <input id="check" name="spamCheck" class="covered" value="">
                  <button id="button-submit-form" class="btn btn-block btn-lg btn-primary btn-padding submit-form" type="submit">
                  Send Message
                  </button>
               </div>
            </form>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <script defer="" src="/js/bundle/bundle.ui.contact.min.js?v=16.19.1"></script>
</div>