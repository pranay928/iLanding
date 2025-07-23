<!DOCTYPE html>
<html lang="en">
   <head>
    @include('admin.layouts.appComponent.css')
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">    
            @include('admin.layouts.appComponent.sidebar')        
            <div id="content">             
              @include('admin.layouts.appComponent.topbar')

              @yield('content')
              
              @include('admin.layouts.appComponent.footer')      
            </div>
         </div>
      </div>     
      @include('admin.layouts.appComponent.js')
   </body>
</html>