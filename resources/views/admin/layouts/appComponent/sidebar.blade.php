<nav id="sidebar">
   <div class="sidebar_blog_1">
      <div class="sidebar-header">
         <div class="logo_section">
            <a href="index.html">
               <img class="logo_icon img-responsive" src="{{ asset('admin/images/logo/logo_icon.png') }}" alt="#" />
            </a>
         </div>
      </div>
      <div class="sidebar_user_info">
         <div class="icon_setting"></div>
         <div class="user_profle_side">
            <div class="user_img">
               <img class="img-responsive" src="{{ asset('admin/images/layout_img/user_img.jpg') }}" alt="#" />
            </div>
            <div class="user_info">
               <h6>{{ $user->name }}</h6>
               <p><span class="online_animation"></span> Online</p>
            </div>
         </div>
      </div>
   </div>

   <div class="sidebar_blog_2">
      <h4>Manage Sections</h4>
      <ul class="list-unstyled components">

         <li>
            <a href="{{ route('showAddToHeroSection') }}">
               <i class="fa fa-dashboard yellow_color"></i> Hero Section
            </a>
         </li>

         <li>
            <a href="{{ route('showAddToAboutSection') }}">
               <i class="fa fa-dashboard yellow_color"></i> About Section
            </a>
         </li>

         <li>
            <a href="{{ route('showFeaturesSection') }}">
               <i class="fa fa-dashboard yellow_color"></i> Features Section
            </a>
         </li>

         <li>
            <a href="{{ route('showFeaturesCardTableSection') }}">
               <i class="fa fa-dashboard yellow_color"></i> Features Card Section
            </a>
         </li>

         <li>
            <a href="{{ route('showAddToCTASection') }}">
               <i class="fa fa-dashboard yellow_color"></i> CTA Section
            </a>
         </li>

         <li>
            <a href="{{ route('showAddToTestimonialTableSection') }}">
               <i class="fa fa-dashboard yellow_color"></i> Testimonials Section
            </a>
         </li>

         <li>
            <a href="{{ route('showAddToServicesTableSection') }}">
               <i class="fa fa-dashboard yellow_color"></i> Services Section
            </a>
         </li>

         <!-- <li>
            <a href="#">
               <i class="fa fa-dashboard yellow_color"></i> Pricing Section
            </a>
         </li> -->

         <li>
            <a href="{{ route('showAddToContactSection') }}">
               <i class="fa fa-dashboard yellow_color"></i> Contact Section
            </a>
         </li>

      </ul>
   </div>
</nav>
