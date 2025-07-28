@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Dashboard</h2>
            </div>
         </div>
      </div>

      

        <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
           <h3>Send reply</h3>

           <form action="{{ route('sendMail',$msg->id) }}" method="post">
             @csrf
             <div class="row gy-4">
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

                 <button type="submit" class="btn btn-success ml-3">Send Reply</button>
               </div>

           </form>

         </div>




    
      
   </div>
</div>
@endsection
