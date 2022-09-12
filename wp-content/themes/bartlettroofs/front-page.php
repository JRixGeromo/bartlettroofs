<?php
   get_header();
?>
   <input type="hidden" id="page-selected" value="front">
   <a href="#price-quote" class="btn btn-primary btn-quote-ft-mobile scroll-to showme">Book Your Inspection</a>
   <div class="hero page-hero-form">
      <div class="div-table">
         <div class="div-table-cell">
            <div class="container">
               <div class="hero-inner">
                  <div class="h1">Local Roofing &amp; Storm Restoration Contractors</div>
                  <div class="lead">Our business offers superior customer service and no-obligation inspections!</div>
                  <div class="row mt-3">
                     <div class="col-xs-4 match-height">
                        <div class="div-table brands">
                           <div class="div-table-cell">
                              <img class="img-responsive center-block hvr-float" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/brand-owenscorning.svg" alt="Owens Corning">
                           </div>
                        </div>
                     </div>
                     <div class="col-xs-4 match-height">
                        <div class="div-table brands">
                           <div class="div-table-cell">
                              <img class="img-responsive center-block hvr-float" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/brand-inc.svg" alt="Inc 500">
                           </div>
                        </div>
                     </div>
                     <div class="col-xs-4 match-height">
                        <div class="div-table brands">
                           <div class="div-table-cell">
                              <img class="img-responsive center-block hvr-float" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/brand-bbb.svg" alt="BBB">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="hero-form">
      <?php
         get_template_part('template-parts/book-for-inspection-section','book-for-inspection-section');
      ?>
   </div>
   <div class="home-content">
      <section class="intro-section">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-5 intro-bg match-height"></div>
               <div class="col-md-7 match-height">
                  <div class="row intro-content">
                     <h1>Roofing and Storm Restoration Contractors</h1>
                     <p>Bartlett Roofing is a professional restoration and roofing company serving homeowners and businesses with 25+ years of experience. With certifications from top brands like GAF, Owens Corning, and CertainTeed, our roofers are ready to tackle your project as soon as you need us.</p>
                     <p>Our customers are at the core of what we do, which is why our roofing contractors offer superior customer service, including a no-obligation inspection and an educational, stress-free process. As a highly rated business, our mission is to transform homes and commercial properties with the best products and the highest-quality service!</p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- intro section -->
      <section class="testimonial-section triggerAnimate fadeInUp">
         <div class="container-fluid">
            <div class="row no-gutter">
               <div class="col-md-6 match-height text-center triggerAnimate fadeInUp delay-2ms">
                  <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
                     <!-- Wrapper for slides -->
                     <h2 class="section-title">See What Our Clients Say</h2>
                     <div class="carousel-inner" role="listbox">
                        <div class="item active">
                           <div class="testimonial-content">
                              <div class="stars">
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                              </div>
                              <p>I had the best experience from the very first contact with Dillon Johnson. He made the whole process so easy. He was very nice and knowledgeable of how to deal with the insurance and of the products available. We really needed a new roof but were putting it off due to not wanting to deal with everything that he took care of for us. Thank you for having such a great salesman. Our roof looks awesome and was done in such a clean and fast manner. I would highly recommend this company. Ask for Dillon if you would like the best help.</p>
                              <p class="h4">James Crouter</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="testimonial-content">
                              <div class="stars">
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                              </div>
                              <p>We had the pleasure of Bartlett Roofing tearing off our old roof and installing a new roof this week. Professional, professional, professional. Ortega Roofing installed our roof in one day. Dillon was our construction manager. Dillon was first class. We would be proud to recommend Bartlett Roofing to anybody. Thanks so much for the service.</p>
                              <p class="h4">Greg Lee</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="testimonial-content">
                              <div class="stars">
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                              </div>
                              <p>Sara Lindsey is a wonderful girl to work with. She has been incredibly helpful and I could always count on her to get the job done and handled properly. I felt as if she treated me like family and is a beautiful person inside and out. I would use Bartlett roofing all over agin after the 50year shingles finally give out! She walked me through every step and saw me through every detail start to finish. I absolutely recommend Bartlett Roofing and Sara Lindsey as your roof guru.</p>
                              <p class="h4">Linda Quick</p>
                           </div>
                        </div>
                     </div>
                     <!-- Controls -->
                     <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                     <i class="fas fa-chevron-left"></i>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                     <i class="fas fa-chevron-right"></i>
                     <span class="sr-only">Next</span>
                     </a>
                     <div>
                        <a href="/bartlettroofs/reviews/reviews" class="btn btn-info btn-padding">Read All Reviews</a>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 match-height triggerAnimate fadeInUp delay-4ms">
                  <div id="carousel-videos" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#carousel-videos" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-videos" data-slide-to="1"></li>
                        <li data-target="#carousel-videos" data-slide-to="2"></li>
                        <li data-target="#carousel-videos" data-slide-to="3"></li>
                        <li data-target="#carousel-videos" data-slide-to="4"></li>
                     </ol>
                     <div class="carousel-inner" role="listbox">
                        <div class="item active">
                           <a class="activate-video" href="#modal-video" data-toggle="modal" data-thevideo="//www.youtube.com/embed/l-a19Tdf7RM?autoplay=1&modestbranding=1&autohide=1&showinfo=0&rel=0">
                              <img class="img-responsive lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/testimonial-video-one.jpg" alt="Customer Testimonial">
                              <div class="video-icon"><i class="fas fa-play-circle"></i></div>
                           </a>
                        </div>
                        <div class="item">
                           <a class="activate-video" href="#modal-video" data-toggle="modal" data-thevideo="//www.youtube.com/embed/N3Lvff81hMM?autoplay=1&modestbranding=1&autohide=1&showinfo=0&rel=0">
                              <img class="img-responsive lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/testimonial-video-two.jpg" alt="Customer Testimonial">
                              <div class="video-icon"><i class="fas fa-play-circle"></i></div>
                           </a>
                        </div>
                        <div class="item">
                           <a class="activate-video" href="#modal-video" data-toggle="modal" data-thevideo="//www.youtube.com/embed/BPtPBrOlw0Y?autoplay=1&modestbranding=1&autohide=1&showinfo=0&rel=0">
                              <img class="img-responsive lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/testimonial-video-three.jpg" alt="Customer Testimonial">
                              <div class="video-icon"><i class="fas fa-play-circle"></i></div>
                           </a>
                        </div>
                        <div class="item">
                           <a class="activate-video" href="#modal-video" data-toggle="modal" data-thevideo="//www.youtube.com/embed/Rz6adxzzGQQ?autoplay=1&modestbranding=1&autohide=1&showinfo=0&rel=0">
                              <img class="img-responsive lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/testimonial-video-four.jpg" alt="Customer Testimonial">
                              <div class="video-icon"><i class="fas fa-play-circle"></i></div>
                           </a>
                        </div>
                        <div class="item">
                           <a class="activate-video" href="#modal-video" data-toggle="modal" data-thevideo="//www.youtube.com/embed/2bYlG9FLyLg?autoplay=1&modestbranding=1&autohide=1&showinfo=0&rel=0">
                              <img class="img-responsive lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/testimonial-video-five.jpg" alt="Customer Testimonial">
                              <div class="video-icon"><i class="fas fa-play-circle"></i></div>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- testimonial section -->
      <div class="page-section benefits-section triggerAnimate fadeInUp">
         <div class="section-header">
            <h2 class="section-title">What Makes Our Experts the Best?</h2>
         </div>
         <div class="container">
            <div class="row scroll-row">
               <div class="col-sm-6 benefits match-height triggerAnimate fadeInUp delay-2ms">
                  <div class="row">
                     <div class="col-md-2">
                        <div class="icon hvr-float">
                           <i class="fas fa-star"></i>
                        </div>
                     </div>
                     <div class="col-md-10">
                        <p class="h4">25+ Years of Roofing & Restoration Care</p>
                        <p>We’ve dealt with many different types of roofing projects for homes and businesses of all shapes and sizes.</p>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 benefits match-height triggerAnimate fadeInUp delay-4ms">
                  <div class="row">
                     <div class="col-md-2">
                        <div class="icon hvr-float">
                           <i class="fas fa-th"></i>
                        </div>
                     </div>
                     <div class="col-md-10">
                        <p class="h4">A Wide Range of Products</p>
                        <p>Our team has earned an A+ rating and accreditation with the Better Business Bureau thanks to our professional training and reliable expertise.</p>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 benefits match-height triggerAnimate fadeInUp delay-6ms">
                  <div class="row">
                     <div class="col-md-2">
                        <div class="icon hvr-float">
                           <i class="fas fa-thumbs-up"></i>
                        </div>
                     </div>
                     <div class="col-md-10">
                        <p class="h4">Stress-Free, No-Obligation Process</p>
                        <p>We care about our customers, which is why we offer superior service and a no-obligation inspection process with no hard sells.</p>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 benefits match-height triggerAnimate fadeInUp delay-8ms">
                  <div class="row">
                     <div class="col-md-2">
                        <div class="icon hvr-float">
                           <i class="fas fa-trophy-alt"></i>
                        </div>
                     </div>
                     <div class="col-md-10">
                        <p class="h4">Top Ratings from Customers</p>
                        <p>Over the years, we have earned high ratings on Google and Facebook from our happy customers, and we’re excited to help you, too.</p>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 benefits match-height triggerAnimate fadeInUp delay-10ms">
                  <div class="row">
                     <div class="col-md-2">
                        <div class="icon hvr-float">
                           <i class="fas fa-user-hard-hat"></i>
                        </div>
                     </div>
                     <div class="col-md-10">
                        <p class="h4">Trained and Certified Experts</p>
                        <p>Our team is an Owens Corning Preferred Contractor, a CertainTeed Master Shingle Applicator, a GAF Certified business, and an A+ rated BBB-accredited business.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- benefits section -->
      <section class="page-section services-section triggerAnimate fadeInUp">
         <div class="container">
            <div class="row">
               <div class="col-md-9 match-height triggerAnimate fadeInLeft delay-2ms">
                  <h2 class="section-title">Professional Roofing and Restoration Care</h2>
                  <p class="lead">When it comes to keeping your property in peak condition, there’s no one better to have on your side than Bartlett Roofing. Our roofers have over 25 years of experience working on roof systems, and we’re ready to help you!</p>
               </div>
               <div class="col-md-3 match-height triggerAnimate fadeInRight delay-4ms">
                  <div class="div-table">
                     <div class="div-table-cell">
                        <a href="#price-quote" class="btn btn-primary btn-padding btn-lg scroll-to">Book Your Inspection</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="row scroll-row">
               <div class="col-md-4 triggerAnimate fadeInUp delay-2ms">
                  <div class="services-outer">
                     <a href="/bartlettroofs/main/residential-roofing">
                        <img class="img-responsive center-block lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/roofing.jpg" alt="Residential Roofing">
                        <div class="services match-height">
                           <p class="h4">Residential Roofing</p>
                           <span class="btn btn-info btn-padding">Learn More</span>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-md-4 triggerAnimate fadeInUp delay-4ms">
                  <div class="services-outer">
                     <a href="/bartlettroofs/main/commercial-roofing">
                        <img class="img-responsive center-block lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/commercial-roofing.jpg" alt="Residential Roofing">
                        <div class="services match-height">
                           <p class="h4">Commercial Roofing</p>
                           <span class="btn btn-info btn-padding">Learn More</span>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-md-4 triggerAnimate fadeInUp delay-6ms">
                  <div class="services-outer">
                     <a href="/bartlettroofs/main/storm-damage-2">
                        <img class="img-responsive center-block lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/storm-damage.jpg" alt="Storm Damage">
                        <div class="services match-height">
                           <p class="h4">Storm Damage</p>
                           <span class="btn btn-info btn-padding">Learn More</span>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- services section -->
      <div class="page-section home-promotions triggerAnimate fadeInUp">
         <div class="section-header text-center">
            <h2 class="section-title">Limited Time Offers</h2>
         </div>
         <div class="container">
            <div class="row scroll-row">
               <div class="col-sm-4 offers hvr-float triggerAnimate fadeInUp">
                  <div class="offer-panel">
                     <div class="panel panel-default">
                        <div class="panel-hero">
                           <a href="/bartlettroofs/offers/financing" >
                           <img class="img-responsive lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="https://cmsplatform.blob.core.windows.net/wwwbartlettroofscom/offers/images/medium/355b1897-0811-473a-b697-01fd19b3a72d.png" alt="Quick Apply Now: One-Step Financing Applications!">
                           </a>
                        </div>
                        <div class="panel-body match-height">
                           <a href="/bartlettroofs/offers/financing" >
                              <p class="offer-title h3">Quick Apply Now: One-Step Financing Applications!</p>
                           </a>
                           <p>We offer flexible financing plans with excellent benefits for customers.</p>
                           <p>
                           </p>
                        </div>
                        <div class="panel-footer">
                           <a class="btn btn-info btn-padding btn-block ellipsis" href="/bartlettroofs/offers/financing" >Learn More</a>
                        </div>
                     </div>
                  </div>
                  <div id="offer-096f218e-a794-4cf9-b226-c45808fa9a8a" class="modal fade modal-share text-center share-096f218e-a794-4cf9-b226-c45808fa9a8a">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <p class="modal-title">Quick Apply Now: One-Step Financing Applications!</p>
                           </div>
                           <div class="modal-body">
                              <span class="modal-label">Share</span>
                              <div class="btn-group-social-media">
                                 <a class="btn btn-facebook" href="https://www.facebook.com/sharer/sharer.php?u=http%3a%2f%2fwww.bartlettroofs.com%2foffers%2ffinancing%2f" target="_blank">
                                 <span class="sr-only">Share on Facebook</span>
                                 <i class="fab fa-facebook-f fa-fw"></i>
                                 </a>
                                 <a class="btn btn-twitter" href="https://twitter.com/home?status=Thought%20you%20might%20like%20this%20http%3a%2f%2fwww.bartlettroofs.com%2foffers%2ffinancing%2f" target="_blank">
                                 <span class="sr-only">Share on Twitter</span>
                                 <i class="fab fa-twitter fa-fw"></i>
                                 </a>
                                 <a class="btn btn-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=http%3a%2f%2fwww.bartlettroofs.com%2foffers%2ffinancing%2f" target="_blank">
                                 <span class="sr-only">Share on LinkedIn</span>
                                 <i class="fab fa-linkedin-in fa-fw"></i>
                                 </a>
                                 <a class="btn btn-pinterest" href="https://pinterest.com/pin/create/button/?url=http%3a%2f%2fwww.bartlettroofs.com%2foffers%2ffinancing%2f&amp;media=https%3a%2f%2fcmsplatform.blob.core.windows.net%2fwwwbartlettroofscom%2foffers%2fimages%2flarge%2f355b1897-0811-473a-b697-01fd19b3a72d.png&amp;description=Quick%20Apply%20Now:%20One-Step%20Financing%20Applications!" target="_blank">
                                 <span class="sr-only">Share on Pinterest</span>
                                 <i class="fab fa-pinterest-p fa-fw"></i>
                                 </a>
                                 <a class="btn btn-warning" href="mailto:?subject=Thought%20you%20might%20like%20this%20from Bartlett%20Roofing%20&body=Check%20this%20out%20from Bartlett%20Roofing Quick Apply Now: One-Step Financing Applications! http%3a%2f%2fwww.bartlettroofs.com%2foffers%2ffinancing%2f" target="_blank">
                                 <span class="sr-only">Share via Email</span>
                                 <i class="fas fa-envelope fa-fw"></i>
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
               </div>
               <div class="col-sm-4 offers hvr-float triggerAnimate fadeInUp">
                  <div class="offer-panel">
                     <div class="panel panel-default">
                        <div class="panel-hero">
                           <a href="/bartlettroofs/offers/referral-bonus" >
                           <img class="img-responsive lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="https://cmsplatform.blob.core.windows.net/wwwbartlettroofscom/offers/images/medium/e89c9047-ae91-43e5-9351-c955ba5e4fa5.png" alt="Earn up to $1,000 in Referrals From Bartlett Roofing">
                           </a>
                        </div>
                        <div class="panel-body match-height">
                           <a href="/bartlettroofs/offers/referral-bonus" >
                              <p class="offer-title h3">Earn up to $1,000 in Referrals From Bartlett Roofing</p>
                           </a>
                           <p>Make some cash while letting friends and family know about our roofing services.</p>
                           <p>
                           </p>
                        </div>
                        <div class="panel-footer">
                           <a class="btn btn-info btn-padding btn-block ellipsis" href="/bartlettroofs/offers/referral-bonus" >Learn More</a>
                        </div>
                     </div>
                  </div>
                  <div id="offer-bdc2ae3a-32e4-42c0-be6f-8d88da3c5fac" class="modal fade modal-share text-center share-bdc2ae3a-32e4-42c0-be6f-8d88da3c5fac">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <p class="modal-title">Earn up to $1,000 in Referrals From Bartlett Roofing</p>
                           </div>
                           <div class="modal-body">
                              <span class="modal-label">Share</span>
                              <div class="btn-group-social-media">
                                 <a class="btn btn-facebook" href="https://www.facebook.com/sharer/sharer.php?u=http%3a%2f%2fwww.bartlettroofs.com%2foffers%2freferral-bonus%2f" target="_blank">
                                 <span class="sr-only">Share on Facebook</span>
                                 <i class="fab fa-facebook-f fa-fw"></i>
                                 </a>
                                 <a class="btn btn-twitter" href="https://twitter.com/home?status=Thought%20you%20might%20like%20this%20http%3a%2f%2fwww.bartlettroofs.com%2foffers%2freferral-bonus%2f" target="_blank">
                                 <span class="sr-only">Share on Twitter</span>
                                 <i class="fab fa-twitter fa-fw"></i>
                                 </a>
                                 <a class="btn btn-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=http%3a%2f%2fwww.bartlettroofs.com%2foffers%2freferral-bonus%2f" target="_blank">
                                 <span class="sr-only">Share on LinkedIn</span>
                                 <i class="fab fa-linkedin-in fa-fw"></i>
                                 </a>
                                 <a class="btn btn-pinterest" href="https://pinterest.com/pin/create/button/?url=http%3a%2f%2fwww.bartlettroofs.com%2foffers%2freferral-bonus%2f&amp;media=https%3a%2f%2fcmsplatform.blob.core.windows.net%2fwwwbartlettroofscom%2foffers%2fimages%2flarge%2fe89c9047-ae91-43e5-9351-c955ba5e4fa5.png&amp;description=Earn%20up%20to%20$1,000%20in%20Referrals%20From%20Bartlett%20Roofing" target="_blank">
                                 <span class="sr-only">Share on Pinterest</span>
                                 <i class="fab fa-pinterest-p fa-fw"></i>
                                 </a>
                                 <a class="btn btn-warning" href="mailto:?subject=Thought%20you%20might%20like%20this%20from Bartlett%20Roofing%20&body=Check%20this%20out%20from Bartlett%20Roofing Earn up to $1,000 in Referrals From Bartlett Roofing http%3a%2f%2fwww.bartlettroofs.com%2foffers%2freferral-bonus%2f" target="_blank">
                                 <span class="sr-only">Share via Email</span>
                                 <i class="fas fa-envelope fa-fw"></i>
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
               </div>
               <div class="col-sm-4 offers hvr-float triggerAnimate fadeInUp">
                  <div class="offer-panel">
                     <div class="panel panel-default">
                        <div class="panel-hero">
                           <a href="/bartlettroofs/offers/warranty" >
                           <img class="img-responsive lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="https://cmsplatform.blob.core.windows.net/wwwbartlettroofscom/offers/images/medium/6b0e9ace-a903-4d69-b6ee-8a1042b16b07.png" alt="Get 100% Warranty Coverage on Labor for 5 Years!">
                           </a>
                        </div>
                        <div class="panel-body match-height">
                           <a href="/bartlettroofs/offers/warranty" >
                              <p class="offer-title h3">Get 100% Warranty Coverage on Labor for 5 Years!</p>
                           </a>
                           <p>Enjoy our comprehensive workmanship warranty from day one of project completion.</p>
                           <p>
                           </p>
                        </div>
                        <div class="panel-footer">
                           <a class="btn btn-info btn-padding btn-block ellipsis" href="/bartlettroofs/offers/warranty" >Learn More</a>
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
                                 <i class="fab fa-facebook-f fa-fw"></i>
                                 </a>
                                 <a class="btn btn-twitter" href="https://twitter.com/home?status=Thought%20you%20might%20like%20this%20http%3a%2f%2fwww.bartlettroofs.com%2foffers%2fwarranty%2f" target="_blank">
                                 <span class="sr-only">Share on Twitter</span>
                                 <i class="fab fa-twitter fa-fw"></i>
                                 </a>
                                 <a class="btn btn-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=http%3a%2f%2fwww.bartlettroofs.com%2foffers%2fwarranty%2f" target="_blank">
                                 <span class="sr-only">Share on LinkedIn</span>
                                 <i class="fab fa-linkedin-in fa-fw"></i>
                                 </a>
                                 <a class="btn btn-pinterest" href="https://pinterest.com/pin/create/button/?url=http%3a%2f%2fwww.bartlettroofs.com%2foffers%2fwarranty%2f&amp;media=https%3a%2f%2fcmsplatform.blob.core.windows.net%2fwwwbartlettroofscom%2foffers%2fimages%2flarge%2f6b0e9ace-a903-4d69-b6ee-8a1042b16b07.png&amp;description=Get%20100%%20Warranty%20Coverage%20on%20Labor%20for%205%20Years!" target="_blank">
                                 <span class="sr-only">Share on Pinterest</span>
                                 <i class="fab fa-pinterest-p fa-fw"></i>
                                 </a>
                                 <a class="btn btn-warning" href="mailto:?subject=Thought%20you%20might%20like%20this%20from Bartlett%20Roofing%20&body=Check%20this%20out%20from Bartlett%20Roofing Get 100% Warranty Coverage on Labor for 5 Years! http%3a%2f%2fwww.bartlettroofs.com%2foffers%2fwarranty%2f" target="_blank">
                                 <span class="sr-only">Share via Email</span>
                                 <i class="fas fa-envelope fa-fw"></i>
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
               </div>
            </div>
         </div>
      </div>
      <!-- offers section -->
      <section class="about-section">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6 about-bg match-height triggerAnimate fadeInRight delay-2ms"></div>
               <div class="col-md-6 match-height triggerAnimate fadeInLeft delay-4ms">
                  <div class="about-content">
                     <h2 class="section-title">What Makes Our Remodelers the Best?</h2>
                     <p>Bartlett Roofing is a professional roofing and restoration company headquartered in Boise, ID. A proudly local business, Bartlett Roofing began with Doug Bartlett’s family-owned framing crew back in the early ‘90s. Today, we are a full-scale operation with a team large enough to serve homeowners and businesses in cities across multiple states, including Idaho, Montana, Nevada, Oregon, Utah, Washington, and Wyoming.</p>
                     <p>Since we have such a large team, we are able to provide a wide range of offerings from affordable to high-end. Whether you’re in need of roof maintenance, replacement, or storm damage restoration, you can count on us to provide the best products and services—with no hard sales and no obligation!</p>
                     <a class="btn btn-info btn-padding" href="/bartlettroofs/about-us/about-us">Learn More</a>
                     <a href="#price-quote" class="btn btn-primary btn-padding scroll-to">Book Your Inspection</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- about section -->
      <section class="page-section careers-section text-center triggerAnimate fadeInUp">
         <div class="container">
            <div class="section-header triggerAnimate fadeInLeft delay-2ms">
               <span class="subhead">Careers</span>
               <h2 class="section-title">Interested In Joining Our Team?</h2>
            </div>
            <a href="/bartlettroofs/careers/careers" class="btn btn-info btn-padding">View Open Positions</a>
         </div>
      </section>
      <!-- careers section -->
      <section class="page-section gallery-section">
         <div class="container">
            <div class="row">
               <div class="col-md-9 triggerAnimate fadeInLeft delay-2ms">
                  <h2 class="section-title">Explore Our Past Work in Our Gallery</h2>
                  <p class="lead">Get inspired for your own upcoming project.</p>
               </div>
               <div class="col-md-3 triggerAnimate fadeInRight delay-4ms">
                  <a href="/bartlettroofs/gallery/gallery" class="btn btn-info btn-lg btn-padding">Explore</a>
               </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="page-gallery">
               <div class="row mb-2">
                  <div class="col-xs-3">
                     <div class="page-gallery-thumbnail">
                        <a href="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/a02c02f9-88ab-4ec9-91a2-b51e9eba2fdf.jpg" data-bsgallery="Home Gallery" data-galleryid="788793809084143" data-itemid="788793809084143-788792785666799" data-description="" data-gallerytype="image" data-thumb-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/a02c02f9-88ab-4ec9-91a2-b51e9eba2fdf.jpg" data-backdrop="static">
                        <img class="lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/a02c02f9-88ab-4ec9-91a2-b51e9eba2fdf.jpg" alt="Home Gallery Photo 1" />
                        </a>
                     </div>
                  </div>
                  <div class="col-xs-3">
                     <div class="page-gallery-thumbnail">
                        <a href="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/4cab665a-c389-41f8-bcb2-50a8c1c74a66.jpg" data-bsgallery="Home Gallery" data-galleryid="788793809084143" data-itemid="788793809084143-788792785659449" data-description="" data-gallerytype="image" data-thumb-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/4cab665a-c389-41f8-bcb2-50a8c1c74a66.jpg" data-backdrop="static">
                        <img class="lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/4cab665a-c389-41f8-bcb2-50a8c1c74a66.jpg" alt="Home Gallery Photo 2" />
                        </a>
                     </div>
                  </div>
                  <div class="col-xs-3">
                     <div class="page-gallery-thumbnail">
                        <a href="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/f35d0735-727f-4a0d-99d8-a7d78eada572.jpg" data-bsgallery="Home Gallery" data-galleryid="788793809084143" data-itemid="788793809084143-788792785664507" data-description="" data-gallerytype="image" data-thumb-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/f35d0735-727f-4a0d-99d8-a7d78eada572.jpg" data-backdrop="static">
                        <img class="lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/f35d0735-727f-4a0d-99d8-a7d78eada572.jpg" alt="Home Gallery Photo 3" />
                        </a>
                     </div>
                  </div>
                  <div class="col-xs-3">
                     <div class="page-gallery-thumbnail">
                        <a href="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/5a0cd22a-d98f-4007-ad44-0bfe2be50e3f.jpg" data-bsgallery="Home Gallery" data-galleryid="788793809084143" data-itemid="788793809084143-788792785661471" data-description="" data-gallerytype="image" data-thumb-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/5a0cd22a-d98f-4007-ad44-0bfe2be50e3f.jpg" data-backdrop="static">
                        <img class="lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/5a0cd22a-d98f-4007-ad44-0bfe2be50e3f.jpg" alt="Home Gallery Photo 4" />
                        </a>
                     </div>
                  </div>
                  <div class="col-xs-3">
                     <div class="page-gallery-thumbnail">
                        <a href="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/10ddd27d-4887-4923-9ee7-6c610d549260.jpg" data-bsgallery="Home Gallery" data-galleryid="788793809084143" data-itemid="788793809084143-788792785662483" data-description="" data-gallerytype="image" data-thumb-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/10ddd27d-4887-4923-9ee7-6c610d549260.jpg" data-backdrop="static">
                        <img class="lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/10ddd27d-4887-4923-9ee7-6c610d549260.jpg" alt="Home Gallery Photo 5" />
                        </a>
                     </div>
                  </div>
                  <div class="col-xs-3">
                     <div class="page-gallery-thumbnail">
                        <a href="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/7c6db774-3ea5-42d0-915d-6ab28b530ca0.jpg" data-bsgallery="Home Gallery" data-galleryid="788793809084143" data-itemid="788793809084143-788792785663495" data-description="" data-gallerytype="image" data-thumb-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/7c6db774-3ea5-42d0-915d-6ab28b530ca0.jpg" data-backdrop="static">
                        <img class="lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/7c6db774-3ea5-42d0-915d-6ab28b530ca0.jpg" alt="Home Gallery Photo 6" />
                        </a>
                     </div>
                  </div>
                  <div class="col-xs-3">
                     <div class="page-gallery-thumbnail">
                        <a href="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/41507112-9b9d-4cb8-83df-c1031d73d9a6.jpg" data-bsgallery="Home Gallery" data-galleryid="788793809084143" data-itemid="788793809084143-788792785660462" data-description="" data-gallerytype="image" data-thumb-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/41507112-9b9d-4cb8-83df-c1031d73d9a6.jpg" data-backdrop="static">
                        <img class="lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/41507112-9b9d-4cb8-83df-c1031d73d9a6.jpg" alt="Home Gallery Photo 7" />
                        </a>
                     </div>
                  </div>
                  <div class="col-xs-3">
                     <div class="page-gallery-thumbnail">
                        <a href="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/659035b0-6a42-4400-a556-8effc5578472.jpg" data-bsgallery="Home Gallery" data-galleryid="788793809084143" data-itemid="788793809084143-788792785665522" data-description="" data-gallerytype="image" data-thumb-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/659035b0-6a42-4400-a556-8effc5578472.jpg" data-backdrop="static">
                        <img class="lazyload" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ph-rectangle.png" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/images/home/659035b0-6a42-4400-a556-8effc5578472.jpg" alt="Home Gallery Photo 8" />
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bs-gallery" data-galleryid="788793809084143">
               <div class="modal">
                  <div class="modal-dialog">
                     <a href="#" data-toggle="collapse" data-target=".modal-dock" aria-expanded="false" aria-controls="modal-dock" class="modal-dock-overlay">
                     <span class="sr-only">Enlarge Image</span>
                     </a>
                     <div class="row modal-row">
                        <div class="col-md-9 modal-col modal-col-canvas">
                           <div class="modal-canvas-body">
                              <a href="#" class="btn btn-close" data-dismiss="modal" title="Close">
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
                                 <i class="fal fa-chevron-left fa-fw"></i>
                                 </button>
                                 <button type="button" class="btn btn-link btn-thumbnails" data-toggle="collapse" data-target=".modal-dock" aria-expanded="false" aria-controls="modal-dock">
                                 <span class="sr-only">All Images</span>
                                 <i class="fas fa-th fa-fw"></i>
                                 </button>
                                 <button type="button" class="btn btn-link btn-next">
                                 <span class="sr-only">Next Image</span>
                                 <i class="fal fa-chevron-right fa-fw"></i>
                                 </button>
                                 <span class="media-count"><span class="current-count count">1</span><small class="text-muted count">of</small><span class="total-count count">1</span></span>
                              </div>
                              <div class="modal-dock collapse">
                                 <div class="dock-title">
                                    <button type="button" class="btn btn-link btn-close" data-toggle="collapse" data-target=".modal-dock" aria-expanded="false" aria-controls="modal-dock">
                                    <span class="sr-only">Close</span>
                                    &times;
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
                           <div class="modal-content text-left">
                              <span class="gallery-label gallery-title"></span>
                              <a class="original-img-link" href="#" target="_blank">
                              View Original Image
                              <i class="fas fa-external-link mr-2-left"></i>
                              </a>
                              <p class="modal-title"></p>
                              <p class="modal-caption"></p>
                           </div>
                           <div class="bs-gallery-btn-group-share">
                              <p class="gallery-label">Share This</p>
                              <a class="btn btn-link" href="https://www.facebook.com/sharer/sharer.php?u=https%3a%2f%2fwww.bartlettroofs.com%2f" target="_blank">
                              <span class="sr-only">Facebook</span>
                              <i class="fab fa-facebook-f fa-fw"></i>
                              </a>
                              <a class="btn btn-link" href="https://twitter.com/home?status=Thought%20you%20might%20like%20this%20https%3a%2f%2fwww.bartlettroofs.com%2f" target="_blank">
                              <span class="sr-only">Twitter</span>
                              <i class="fab fa-twitter fa-fw"></i>
                              </a>
                              <a class="btn btn-link" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3a%2f%2fwww.bartlettroofs.com%2f" target="_blank">
                              <span class="sr-only">LinkedIn</span>
                              <i class="fab fa-linkedin-in fa-fw"></i>
                              </a>
                              <a class="btn btn-link" href="https://pinterest.com/pin/create/button/?url=https%3a%2f%2fwww.bartlettroofs.com%2f&amp;media=#MEDIA#" target="_blank">
                              <span class="sr-only">Pinterest</span>
                              <i class="fab fa-pinterest-p fa-fw"></i>
                              </a>
                              <a class="btn btn-link" href="mailto:?subject=Thought%20you%20might%20like%20this%20from Bartlett%20Roofing%20&body=Check%20this%20out%20from Bartlett%20Roofing https%3a%2f%2fwww.bartlettroofs.com%2f" target="_blank">
                              <span class="sr-only">Email</span>
                              <i class="fas fa-envelope fa-fw"></i>
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
            <script defer src="<?php echo get_stylesheet_directory_uri();?>/assets/js/bundle/bundle.ui.gallery.minb8cd.js?v=16.16.0"></script>
         </div>
      </section>
      <!-- gallery section -->
      <section class="page-section service-areas-section">
         <div class="container">
            <div class="row">
               <div class="col-md-9 triggerAnimate fadeInLeft delay-2ms">
                  <h2 class="section-title">Roofing and Restoration Professionals with 25+ Years of Experience</h2>
               </div>
               <div class="col-md-3 triggerAnimate fadeInRight delay-4ms">
                  <a href="service-areas/index.html" class="btn btn-info btn-lg btn-padding">View More</a>
               </div>
            </div>
            <?php
               get_template_part('template-parts/main-service-areas-map-section','main-service-areas-map-section');
            ?>
         </div>
      </section>
      <!-- service areas section -->
      <section class="page-section cta-section triggerAnimate fadeInUp">
         <div class="container">
            <div class="row">
               <div class="col-md-9 match-height triggerAnimate fadeInLeft delay-2ms">
                  <h2 class="section-title">Call Our Roofing and Restoration Experts to Get a Quote Today</h2>
                  <p>If you’re in need of immediate roofing or restoration care, get in touch with the local experts at Bartlett Roofing right away. Our team will be by your side from start to finish to ensure you get the best care for your home. Give us a call to learn more about our services, or fill out our online form to schedule a consultation today.</p>
               </div>
               <div class="col-md-3 match-height triggerAnimate fadeInRight delay-4ms">
                  <div class="div-table">
                     <div class="div-table-cell">
                        <a href="#price-quote" class="btn btn-primary btn-padding btn-lg scroll-to">Book Your Inspection</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- cta section -->
   </div>
   <!-- container -->
   <div class="fullscreen-bg">
      <video loop muted autoplay playsinline poster="<?php echo get_stylesheet_directory_uri();?>/assets/video/poster-video.jpg" class="fullscreen-background">
         <source src="http://localhost/bartlettroofs//wp-content/themes/bartlettroofs/assets/video/hero-video.mp4" type="video/mp4">
      </video>
   </div>
</div>
<!-- /wrapper -->
<?php
   get_footer();
?>