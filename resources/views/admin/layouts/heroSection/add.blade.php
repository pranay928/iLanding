@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Hero Section</h2>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <h1>Add To Hero Section</h1>

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

            <form action="{{ route('addToHeroSection') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label class="form-label">Badge Text</label>
                    <input type="text" name="badge_text" class="form-control" value="{{ old('badge_text', $hero->badge_text ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ old('heading', $hero->heading ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Highlight Text</label>
                    <input type="text" name="highlight_text" class="form-control" value="{{ old('highlight_text', $hero->highlight_text ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $hero->description ?? '') }}</textarea>
                </div>

                <hr>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Button 1 Text</label>
                        <input type="text" name="button_1_text" class="form-control" value="{{ old('button_1_text', $hero->button_1_text ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Button 1 Link</label>
                        <input type="text" name="button_1_link" class="form-control" value="{{ old('button_1_link', default: $hero->button_1_link ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Button 2 Text</label>
                        <input type="text" name="button_2_text" class="form-control" value="{{ old('button_2_text', default: $hero->button_2_text ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Button 2 Link</label>
                        <input type="text" name="button_2_link" class="form-control" value="{{ old('button_2_link', $hero->button_2_link ?? '') }}">
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="form-label">Customer Text</label>
                    <input type="text" name="customer_text" class="form-control" value="{{ old('customer_text', $hero->customer_text ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Main Hero Image</label>
                    <input type="file" name="main_image" class="form-control">
                    @if(!empty($hero->main_image))
                    <div class="mt-2">
                        <img src="{{ 'admin/dynamicImages/hero/'.$hero->main_image }}" alt="Hero Image" width="200">
                    </div>
                    @endif

                </div>

                <button type="submit" class="btn btn-primary mt-3">Save Hero Section</button>
     
            </form>
        </div>





    </div>
</div>
@endsection