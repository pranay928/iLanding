    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center justify-content-between">

          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            <span class="about-meta">{{$about->meta}}</span>
            <h2 class="about-title">{{ $about->title }}</h2>
            <p class="about-description">{{ $about->description }}</p>

            <div class="row feature-list-wrapper">
              <div class="col-md-6">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Lorem ipsum dolor sit amet</li>
                  <li><i class="bi bi-check-circle-fill"></i> Consectetur adipiscing elit</li>
                  <li><i class="bi bi-check-circle-fill"></i> Sed do eiusmod tempor</li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Incididunt ut labore et</li>
                  <li><i class="bi bi-check-circle-fill"></i> Dolore magna aliqua</li>
                  <li><i class="bi bi-check-circle-fill"></i> Ut enim ad minim veniam</li>
                </ul>
              </div>
            </div>

            <div class="info-wrapper">
              <div class="row gy-4">
                <div class="col-lg-5">
                  <div class="profile d-flex align-items-center gap-3">
                    <img src="{{ asset('admin/dynamicImages/about/'.$about->profile_image) }}" alt="CEO Profile" class="profile-image">
                    <div>
                      <h4 class="profile-name">{{$about->profile_name}}</h4>
                      <p class="profile-position">{{$about->profile_position}}</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="contact-info d-flex align-items-center gap-2">
                    <i class="bi bi-telephone-fill"></i>
                    <div>
                      <p class="contact-label">{{$about->contact_label}}</p>
                      <p class="contact-number">{{$about->contact_number}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">
              <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                <img src="{{asset('admin/dynamicImages/about/'.$about->main_image)}}" alt="Business Meeting" class="img-fluid main-image rounded-4">
                <img src="{{asset('admin/dynamicImages/about/'.$about->small_image)}}" alt="Team Discussion" class="img-fluid small-image rounded-4">
              </div>
              <div class="experience-badge floating">
                <h3>{{$about->experience_years}} <span>Years</span></h3>
                <p>{{$about->experience_text}} </p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>