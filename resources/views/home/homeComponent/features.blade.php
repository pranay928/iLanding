
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Features</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="d-flex justify-content-center">

          <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
            @php
              $i =1 ;
            @endphp
            @foreach ($feature as $feature)
            

            @if ($i==1)
              <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-{{ $i }}">
                <h4>{{$feature->tab_title}}</h4>
              </a>
            </li>
            @else

             <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-{{$i}}">
                <h4>{{$feature->tab_title}}</h4>
              </a>
            </li>
            
            @endif

            @php
              $i++;
            @endphp
              
            @endforeach
<!-- 
            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                <h4>Modisit</h4>
              </a>
            </li>End tab nav item -->

            <!-- <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                <h4>Praesenti</h4>
              </a>End tab nav item 
            </li>-->

            <!-- <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                <h4>Explica</h4>
              </a>
            </li> -->

          </ul>

        </div>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">


        @php
          $j=1;
        @endphp

        @foreach ($features as $features)         

        @if ($j==1)
          
        
         <div class="tab-pane fade active show" id="features-tab-{{$j}}">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>{{$features->heading}}</h3>
                <p class="fst-italic">
                 {{$features->description}}
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>{{$features->feature_list_first}}</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>{{$features->feature_list_second}}</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>{{$features->feature_list_third}}</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>{{$features->feature_list_fourth}}</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="{{asset('admin/dynamicImages/feature/'.$features->image)}}" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

          @else


           <div class="tab-pane fade" id="features-tab-{{$j}}">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>{{$features->heading}}</h3>
                <p class="fst-italic">
                  {{$features->description}}
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>{{$features->feature_list_first}}</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>{{$features->feature_list_second}}</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>{{$features->feature_list_third}}</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>{{$features->feature_list_fourth}}</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="{{asset('admin/dynamicImages/feature/'.$features->image)}}" alt="" class="img-fluid">
              </div>
            </div>
          </div>



        @endif
        @php
          $j++;
        @endphp

        @endforeach


          <!-- <div class="tab-pane fade active show" id="features-tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>Voluptatem dignissimos provident</h3>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/features-illustration-1.webp" alt="" class="img-fluid">
              </div>
            </div>
          </div>End tab content item -->

          <!-- <div class="tab-pane fade" id="features-tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>Neque exercitationem debitis</h3>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Provident mollitia neque rerum asperiores dolores quos qui a. Ipsum neque dolor voluptate nisi sed.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/features-illustration-2.webp" alt="" class="img-fluid">
              </div>
            </div>
          </div>End tab content item -->

          <!-- <div class="tab-pane fade" id="features-tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>Voluptatibus commodi accusamu</h3>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Provident mollitia neque rerum asperiores dolores quos qui a. Ipsum neque dolor voluptate nisi sed.</span></li>
                </ul>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/features-illustration-3.webp" alt="" class="img-fluid">
              </div>
            </div>
          </div>End tab content item -->

        </div>

      </div>

    </section>