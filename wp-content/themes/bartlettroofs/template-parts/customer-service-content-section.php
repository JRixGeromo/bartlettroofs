<div class="container">
   <div class="page-header text-center">
      <h1>Bartlett Roofing Customer Service</h1>
      <p class="lead "></p>
   </div>
</div>
<div class="container container-page">
   <div class="row">
      <div class="col-sm-6 col-md-offset-3">
         <div class="panel panel-default">
            <form id="service-request-form" action="/thank-you/?service-request=1" method="post" role="form">
               <div class="panel-body">
                  <h4 class="form-title bold">How can we help you?</h4>
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
                     <label>Full Address</label>
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
                     <label for="serviceArea">Service Area</label>
                     <select name="serviceArea" id="serviceArea" class="form-control">
                        <option value="">Select Service Area</option>
                        <option value="Idaho">Idaho</option>
                        <option value="Utah">Utah</option>
                        <option value="Washington">Washington</option>
                        <option value="Montana">Montana</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="details">Comments</label>
                     <textarea id="details" name="details" class="form-control" rows="3" maxlength="3000"></textarea>
                  </div>
                  <input type="hidden" id="form" name="form" value="servicerequest">
                  <input id="check" name="spamCheck" class="covered" value="">
                  <button id="button-submit-form" class="btn btn-lg btn-block btn-info btn-padding submit-form" type="submit">
                  Send Message
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- /row -->
   <script defer="" src="/js/bundle/bundle.ui.service-request.min.js?v=16.19.1"></script>
</div>
<div class="breadcrumbs">
   <div class="container">
      <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
         <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="/">
            <span class="hidden-lg">
            <i class="fas fa-home" aria-hidden="true"></i>
            </span>
            <span class="visible-lg" itemprop="name">Home</span>
            </a>
            <meta itemprop="position" content="1">
         </li>
         <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="/customer-service/">
            <span itemprop="name">Customer Service</span>
            </a>
            <meta itemprop="position" content="2">
         </li>
      </ol>
   </div>
</div>