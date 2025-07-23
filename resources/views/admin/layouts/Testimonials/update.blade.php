@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Update To Testimonial Section</h2>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <h1>Testimonial Section</h1>

            @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('UpdateToTestimonialSection',$testimonial->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Profile Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Profile Position</label>
                    <input type="text" name="designation" class="form-control" value="{{ $testimonial->designation }}">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="image" class="form-control"> 
                     @if(!empty($testimonial->image))
                    <div class="mt-2">
                        <img src="{{ asset('admin/dynamicImages/testimonials/'.$testimonial->image) }}" alt="about main Image" width="200">
                    </div>
                    @endif                             
                </div>   

                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <input type="number" name="rating" min="1" max="5" value="{{ $testimonial->rating }}">                  
                </div>

                <hr>
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="3">{{ $testimonial->message }}</textarea>
                </div>

              

                <button type="submit" class="btn btn-primary mt-3">Save Testimonial</button>
     
            </form>
        </div>





    </div>
</div>
@endsection