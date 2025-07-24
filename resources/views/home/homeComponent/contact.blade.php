 <section id="contact" class="contact section light-background">

   <!-- Section Title -->
   <div class="container section-title" data-aos="fade-up">
     <h2>Contact</h2>
     <p>{{$contact->section_description}}</p>
   </div><!-- End Section Title -->

   <div class="container" data-aos="fade-up" data-aos-delay="100">

     <div class="row g-4 g-lg-5">
       <div class="col-lg-5">
         <div class="info-box" data-aos="fade-up" data-aos-delay="200">
           <h3>Contact Info</h3>
           <p>{{$contact->intro_text}}</p>

           <div class="info-item" data-aos="fade-up" data-aos-delay="300">
             <div class="icon-box">
               <i class="bi bi-geo-alt"></i>
             </div>
             <div class="content">
               <h4>Our Location</h4>
               <p>{{$contact->address_line_1}}</p>
               <p>{{$contact->address_line_2}}</p>
             </div>
           </div>

           <div class="info-item" data-aos="fade-up" data-aos-delay="400">
             <div class="icon-box">
               <i class="bi bi-telephone"></i>
             </div>
             <div class="content">
               <h4>Phone Number</h4>
               <p>{{$contact->phone_1}}</p>
               <p>{{$contact->phone_2}}</p>
             </div>
           </div>

           <div class="info-item" data-aos="fade-up" data-aos-delay="500">
             <div class="icon-box">
               <i class="bi bi-envelope"></i>
             </div>
             <div class="content">
               <h4>Email Address</h4>
               <p>{{$contact->email_1}}</p>
               <p>{{$contact->email_2}}</p>
             </div>
           </div>
         </div>
       </div>

       <div class="col-lg-7">
         <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
           <h3>Get In Touch</h3>
           <p>{{$contact->form_text}}</p>

           <form action="{{ route('msgFromHomePage') }}" method="post">
            @csrf
             <div class="row gy-4">

               <div class="col-md-6">
                 <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
               </div>

               <div class="col-md-6 ">
                 <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
               </div>

               <div class="col-12">
                 <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
               </div>

               <div class="col-12">
                 <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
               </div>

               <div class="col-12 text-center">
                   @if($errors->any())
                   <div class="alert alert-danger mt-3">
                     <ul class="mb-0">
                       @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                       @endforeach
                     </ul>
                   A @endif
                 </div>
                 @if(session('success'))
                 <div class="alert alert-success mt-3">
                   {{ session('success') }}
                 </div>
                 @endif

                 <button type="submit" class="btn">Send Message</button>
               </div>

             </div>
           </form>

         </div>
       </div>

     </div>

   </div>

 </section>