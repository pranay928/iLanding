@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>About Section</h2>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <h1>Add To About Section</h1>

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

            <form action="{{ route('addToAboutSection') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label class="form-label">Meta Text</label>
                    <input type="text" name="meta" class="form-control" value="{{ old('meta', $about->meta ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $about->title ?? '') }}">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $about->description ?? '') }}</textarea>
                </div>


          <hr>

                <div class="mb-3">
                    <label class="form-label">Profile Name</label>
                    <input type="text" name="profile_name" class="form-control" value="{{ old('profile_name', $about->profile_name ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Profile Position</label>
                    <input type="text" name="profile_position" class="form-control" value="{{ old('profile_position', $about->profile_position ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="profile_image" class="form-control">
                    @if(!empty($about->profile_image))
                    <div class="mt-2">
                        <img src="{{ asset('admin/dynamicImages/about/'.$about->profile_image) }}" alt="Profile Image" width="200">
                    </div>
                    @endif

                </div>


                <hr>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Contact Labelt</label>
                        <input type="text" name="contact_label" class="form-control" value="{{ old('contact_label', $about->contact_label ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Contact Number</label>
                        <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number', default: $about->contact_number ?? '') }}">
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Experience Text</label>
                        <input type="text" name="experience_text" class="form-control" value="{{ old('experience_text', $about->experience_text ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Experience Years</label>
                        <input type="text" name="experience_years" class="form-control" value="{{ old('experience_years', default: $about->experience_years ?? '') }}">
                    </div>
                </div>

                <hr>
          

                <!-- for main bg image -->
                <div class="mb-3">
                    <label class="form-label">Main Image</label>
                    <input type="file" name="main_image" class="form-control">
                    @if(!empty($about->main_image))
                    <div class="mt-2">
                        <img src="{{ asset('admin/dynamicImages/about/'.$about->main_image) }}" alt="about main Image" width="200">
                    </div>
                    @endif
                </div>

                <!-- for small bg image -->
                <div class="mb-3">
                    <label class="form-label">small about Image</label>
                    <input type="file" name="small_image" class="form-control">
                    @if(!empty($about->small_image))
                    <div class="mt-2">
                        <img src="{{ asset('admin/dynamicImages/about/'.$about->small_image) }}" alt="small about Image" width="200">
                    </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary mt-3">Save About Section</button>
     
            </form>
        </div>





    </div>
</div>
@endsection