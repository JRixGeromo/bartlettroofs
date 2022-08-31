<div class="container position-relative">
   <div id="quote-form" class="quote-form panel panel-quote-form">
      <div class="panel-body">
         <div class="section-header">
            <p class="h2">Complimentary Roof Inspection</p>
         </div>
         <div class="mb-2">
            <div class="aggregate-reviews">
               <div class="credibility-description media d-inline-block mx-auto">
                  <div class="media-left hide"><i class='fab fa-google fa-2x'></i></div>
                  <div class="review-stars media-body vertical-align-middle">
                     <span class='fas fa-star fa-lg'></span> <span class='fas fa-star fa-lg'></span> <span class='fas fa-star fa-lg'></span> <span class='fas fa-star fa-lg'></span> <span class='fas fa-star fa-lg'></span> 
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
         <form id="price-quote" action="https://www.bartlettroofs.com/thank-you/quote-thank-you/?ref=pricing" method="post" role="form">
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
               <input id="g-address1" name="address1" type="hidden" autocomplete="none" />
               <input id="g-address2" name="address2" type="hidden" autocomplete="none" />
               <input id="g-city" name="city" type="hidden" autocomplete="none" />
               <input id="g-neighborhood" name="neighborhood" type="hidden" autocomplete="none" />
               <input id="g-state" name="state" type="hidden" autocomplete="none" />
               <input id="g-zip" name="zip" type="hidden" autocomplete="none" />
               <input id="g-county" name="county" type="hidden" autocomplete="none" />
               <input id="g-country" name="country" type="hidden" autocomplete="none" />
               <input id="g-latitude" name="latitude" type="hidden" autocomplete="none" />
               <input id="g-longitude" name="longitude" type="hidden" autocomplete="none" />
            </div>
            <div class="form-group">
               <label for="service" class="sr-only">Project Type</label>
               <select id="service" name="service" class="form-control">
                  <option value="">Project Type</option>
                  <option value="Roof Replacement" >Roof Replacement</option>
                  <option value="Residential Roofing" >Residential Roofing</option>
                  <option value="Commercial Roofing" >Commercial Roofing</option>
                  <option value="Storm Damage Restoration" >Storm Damage Restoration</option>
               </select>
            </div>
            <div class="form-group">
               <label for="details" class="sr-only">Project Description</label>
               <textarea id="details" name="details" class="form-control" placeholder="Project Description" rows="2" maxlength="3000"></textarea>
            </div>
            <input type="hidden" name="setappointment" value="false" autocomplete="off">
            <input id="price-quote-type" name="type" type="hidden" value="Quote">
            <input id="quoteToken" name="quoteToken" type="hidden" value="" />
            <input type="hidden" name="form" value="remodeler" />
            <input id="check" name="spamCheck" class="covered" value="" />
            <button id="price-quote-submit" class="btn btn-lg btn-block btn-primary btn-padding submit-form" type="button">
            Book Your Inspection
            </button>
         </form>
      </div>
   </div>
   <script defer src="<?php echo get_stylesheet_directory_uri();?>/assets/js/bundle/bundle.ui.quote.minb8cd.js?v=16.16.0"></script>
</div>