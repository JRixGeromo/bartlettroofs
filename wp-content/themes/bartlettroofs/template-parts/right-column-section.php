<div class="col-md-6 sticky-sidebar">
   <div id="quote-form" class="quote-form panel panel-quote-form">
      <div class="panel-body">
         <div class="section-header text-center">
            <p class="h2">Complimentary Roof Inspection</p>
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
   <script defer="" src="<?php echo get_stylesheet_directory_uri();?>/assets/js/bundle/bundle.ui.quote.min.js?v=16.19.1"></script>
   <div class="offer-panel text-center">
      <div class="panel panel-default">
         <div class="panel-hero">
            <a href="/bartlettroofs/offers/warranty">
            <img class="img-responsive" src="https://cmsplatform.blob.core.windows.net/wwwbartlettroofscom/offers/images/medium/6b0e9ace-a903-4d69-b6ee-8a1042b16b07.png" alt="Get 100% Warranty Coverage on Labor for 5 Years!">
            </a>
         </div>
         <div class="panel-body">
            <a href="/bartlettroofs/offers/warranty">
               <p class="offer-title h3">Get 100% Warranty Coverage on Labor for 5 Years!</p>
            </a>
            <p>Enjoy our comprehensive workmanship warranty from day one of project completion.</p>
            <p>
               <a href="#" class="share-offer" data-toggle="modal" data-target="#offer-f5555d5d-969a-46d3-8b25-f8c215058f8d" data-backdrop="static">Share</a>
            </p>
         </div>
         <div class="panel-footer">
            <a class="btn btn-info btn-padding btn-block" href="/bartlettroofs/offers/warranty">Learn More</a>
         </div>
      </div>
   </div>
   <div id="offer-f5555d5d-969a-46d3-8b25-f8c215058f8d" class="modal fade modal-share text-center share-f5555d5d-969a-46d3-8b25-f8c215058f8d">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <p class="modal-title">Get 100% Warranty Coverage on Labor for 5 Years!</p>
            </div>
            <div class="modal-body">
               <span class="modal-label">Share</span>
               <div class="btn-group-social-media">
                  <a class="btn btn-facebook" href="https://www.facebook.com/sharer/sharer.php?u=http%3a%2f%2fwww.bartlettroofs.com%2foffers%2fwarranty%2f" target="_blank">
                  <span class="sr-only">Share on Facebook</span>
                  <i class="fab fa-facebook-f fa-fw" aria-hidden="true"></i>
                  </a>
                  <a class="btn btn-twitter" href="https://twitter.com/home?status=Thought%20you%20might%20like%20this http%3a%2f%2fwww.bartlettroofs.com%2foffers%2fwarranty%2f" target="_blank">
                  <span class="sr-only">Share on Twitter</span>
                  <i class="fab fa-twitter fa-fw" aria-hidden="true"></i>
                  </a>
                  <a class="btn btn-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=http%3a%2f%2fwww.bartlettroofs.com%2foffers%2fwarranty%2f" target="_blank">
                  <span class="sr-only">Share on LinkedIn</span>
                  <i class="fab fa-linkedin-in fa-fw" aria-hidden="true"></i>
                  </a>
                  <a class="btn btn-pinterest" href="https://pinterest.com/pin/create/button/?url=http%3a%2f%2fwww.bartlettroofs.com%2foffers%2fwarranty%2f&amp;media=https%3a%2f%2fcmsplatform.blob.core.windows.net%2fwwwbartlettroofscom%2foffers%2fimages%2flarge%2f6b0e9ace-a903-4d69-b6ee-8a1042b16b07.png&amp;description=Get 100% Warranty Coverage on Labor for 5 Years!" target="_blank">
                  <span class="sr-only">Share on Pinterest</span>
                  <i class="fab fa-pinterest-p fa-fw" aria-hidden="true"></i>
                  </a>
                  <a class="btn btn-warning" href="mailto:?subject=Thought%20you%20might%20like%20this%20from Bartlett%20Roofing%20&amp;body=Check%20this%20out%20from Bartlett%20Roofing Get 100% Warranty Coverage on Labor for 5 Years! http%3a%2f%2fwww.bartlettroofs.com%2foffers%2fwarranty%2f" target="_blank">
                  <span class="sr-only">Share via Email</span>
                  <i class="fas fa-envelope fa-fw" aria-hidden="true"></i>
                  </a>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-outline btn-modal-share-close" data-dismiss="modal">Close</button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <div class="panel panel-default panel-latest-review">
      <div class="panel-body p-4">
         <div>
            <div class="rating" title="5 Stars">
               <span class="fas fa-star fa-lg" aria-hidden="true"></span> <span class="fas fa-star fa-lg" aria-hidden="true"></span> <span class="fas fa-star fa-lg" aria-hidden="true"></span> <span class="fas fa-star fa-lg" aria-hidden="true"></span> <span class="fas fa-star fa-lg" aria-hidden="true"></span> 
            </div>
            <p class="small">
               <span class="review-author bold">
               Kerri L.
               </span>
               <time class="review-date">
               <span class="text-muted">1 week ago</span>
               </time>
            </p>
         </div>
         <p class="h4 mt-0 mb-1">Highly Recommend Taylor Batchelor as Project Mgr</p>
         <p class="review-body">I had gotten a lot of door knockers wanting to inspect my roof due to wind damage.  I always said no until I talked to Taylor.  He was different – very professional and knowledgeable – so I agreed to let him on my roof.  He spent a considerable amoun...</p>
         <p class="link-reviews"><a href="/bartlettroofs/reviews">Read all reviews</a></p>
      </div>
   </div>
</div>