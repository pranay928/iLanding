<!DOCTYPE html>
<html lang="en">

<head>
  @include('home.homeComponent.css')
</head>

<body class="index-page">

<!-- header-start -->
 @include('home.homeComponent.header')
  <!-- header-end -->

  <main class="main">

    <!-- Hero Section -->
     @include('home.homeComponent.hero')
   <!-- /Hero Section -->
    <!-- About Section -->
     @include('home.homeComponent.about') 
  <!-- /About Section -->
    <!-- Features Section -->
     @include('home.homeComponent.features')
     <!-- /Features Section -->
  <!-- Features Cards Section -->
     @include('home.homeComponent.crads')
  <!-- /Features Cards Section -->
  <!-- Features 2 Section -->
     @include('home.homeComponent.features2')
    <!-- /Features 2 Section -->
  <!-- Call To Action Section -->
     @include('home.homeComponent.callToAction')
  <!-- /Call To Action Section -->
  <!-- Clients Section -->
     @include('home.homeComponent.slider')
   <!-- /Clients Section -->
  <!-- Testimonials Section -->
     @include('home.homeComponent.testimonials')
    <!-- /Testimonials Section -->
  <!-- Services Section -->
     @include('home.homeComponent.services')
    <!-- /Services Section -->
  <!-- Pricing Section -->
     @include('home.homeComponent.pricing')
    <!-- /Pricing Section -->
  <!-- Contact Section -->
     @include('home.homeComponent.contact')
   <!-- /Contact Section -->

  </main>
<!-- footer-start -->
 @include('home.homeComponent.footer')
  <!-- footer-end -->

 @include('home.homeComponent.javascript')

</body>

</html>