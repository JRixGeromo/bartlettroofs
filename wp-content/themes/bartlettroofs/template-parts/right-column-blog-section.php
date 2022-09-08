<div class="col-md-6">
   <form id="search-blog-form" class="mb-4">
      <label for="search-blog" class="sr-only">Search Blog</label>
      <div class="input-group">
         <input id="search-blog" class="form-control" placeholder="Search blog" type="search" style="border-right:0;">
         <div class="input-group-btn">
            <button id="btn-submit-search" class="btn btn-default" type="button" style="border-left:0;">
            <span class="sr-only">Search</span>
            <i class="fal fa-search" aria-hidden="true"></i>
            </button>
         </div>
      </div>
   </form>
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
   <!-- Nav tabs -->
   <ul class="nav nav-tabs blog-tabs">
      <li role="presentation" class="active"><a href="#recent" data-toggle="tab">Recent</a></li>
      <li role="presentation"><a href="#categories" data-toggle="tab">Categories</a></li>
      <li role="presentation"><a href="#archives" data-toggle="tab">Archives</a></li>
   </ul>
   <!-- Tab panes -->
   <div class="tab-content blog-tab-content panel panel-default">
      <div role="tabpanel" class="tab-pane active" id="recent">
         <div class="list-group blog-list-group list-group-with-images">
            <a href="/blog/p.220819000/why-now-is-the-best-time-to-join-the-roofing-industry/" class="list-group-item">
               <h4 class="list-group-item-heading">Why Now is the Best Time to Join the Roofing Industry</h4>
            </a>
            <a href="/blog/p.220307000/how-to-know-its-time-for-a-roof-inspection/" class="list-group-item">
               <div class="list-group-item-img">
                  <img src="https://cmsplatform.blob.core.windows.net/wwwbartlettroofscom/blog-images/8dfa6dc0-94da-48b3-88fe-62372c81372c.jpg" alt="How To Know It's Time for a Roof Inspection">
               </div>
               <h4 class="list-group-item-heading">How To Know It's Time for a Roof Inspection</h4>
            </a>
            <a href="/blog/p.211206010/bartlett-roofing-ranks-no-585-on-the-2021-inc-5000/" class="list-group-item">
               <div class="list-group-item-img">
                  <img src="https://cmsplatform.blob.core.windows.net/wwwbartlettroofscom/blog-images/e4df9e00-c84e-411f-9c46-35c34c27533a.jpg" alt="Bartlett Roofing Ranks No. 585 on the 2021 Inc. 5000">
               </div>
               <h4 class="list-group-item-heading">Bartlett Roofing Ranks No. 585 on the 2021 Inc. 5000</h4>
            </a>
            <a href="/blog/p.211206009/what-is-a-roof-overlay/" class="list-group-item">
               <div class="list-group-item-img">
                  <img src="https://cmsplatform.blob.core.windows.net/wwwbartlettroofscom/blog-images/604179e4-f942-45eb-9921-09f193aad110.jpg" alt="What Is A Roof Overlay?">
               </div>
               <h4 class="list-group-item-heading">What Is A Roof Overlay?</h4>
            </a>
            <a href="/blog/p.211206008/when-is-the-best-time-to-repair-my-roof/" class="list-group-item">
               <div class="list-group-item-img">
                  <img src="https://cmsplatform.blob.core.windows.net/wwwbartlettroofscom/blog-images/34582920-045f-4a68-988c-7d8f0cf72d79.jpg" alt="When Is The Best Time To Repair My Roof?">
               </div>
               <h4 class="list-group-item-heading">When Is The Best Time To Repair My Roof?</h4>
            </a>
         </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="categories">
         <div class="list-group blog-list-group">
         </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="archives">
         <div class="list-group blog-list-group">
            <a class="list-group-item" href="/blog/d.2208/">August 2022</a>
            <a class="list-group-item" href="/blog/d.2203/">March 2022</a>
            <a class="list-group-item" href="/blog/d.2112/">December 2021</a>
         </div>
      </div>
   </div>
   <!-- /right column -->
</div>