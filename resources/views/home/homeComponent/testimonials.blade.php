<section id="testimonials" class="testimonials section light-background">

  <div class="container section-title" data-aos="fade-up">
    <h2>Testimonials</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div>

  <div class="container">

    <div class="row g-5">


      @foreach ($testimonial as $test )
      @php
      $star = $test->rating;
      @endphp
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="testimonial-item">
          <img src="{{asset('admin/dynamicImages/testimonials/'.$test->image)}}" class="testimonial-img" alt="">
          <h3>{{$test->name}}</h3>
          <h4>{{$test->designation}}</h4>
          <div class="stars">
            @for ($i = 0; $i < $star ; $i++ )
              <i class="bi bi-star-fill"></i>
              @endfor
          </div>
          <p>
            <i class="bi bi-quote quote-icon-left"></i>
            <span>{{$test->message}}</span>
            <i class="bi bi-quote quote-icon-right"></i>
          </p>
        </div>
      </div>


      @endforeach

    </div>

  </div>

</section>