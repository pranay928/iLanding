@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Update To Feature Section</h2>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <h1>Feature Section</h1>

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

            <form action="{{ route('UpdateToFeaturesSection',$feature->id) }}" method="Post" enctype="multipart/form-data" class="mt-4">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Tab Title</label>
                    <input type="text" name="tab_title" class="form-control" value="{{ old('tab_title', $feature->tab_title ?? '') }}">
                </div>

                <hr><hr>

                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ old('heading', $feature->heading ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $feature->description ?? '') }}</textarea>
                </div>

                <hr>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">feature list first</label>
                        <input type="text" name="feature_list_first" class="form-control" value="{{ old('feature_list_first', $feature->feature_list_first ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">feature list second</label>
                        <input type="text" name="feature_list_second" class="form-control" value="{{ old('feature_list_second', default: $feature->feature_list_second ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">feature list third</label>
                        <input type="text" name="feature_list_third" class="form-control" value="{{ old('feature_list_third', default: $feature->feature_list_third ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">feature list fourth</label>
                        <input type="text" name="feature_list_fourth" class="form-control" value="{{ old('feature_list_fourth', default: $feature->feature_list_fourth ?? '') }}">
                    </div>
                </div>

                <hr>              

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                    @if(!empty($feature->image))
                    <div class="mt-2">
                        <img src="{{ asset('admin/dynamicImages/feature/'.$feature->image) }}" alt="feature Image" width="200">
                    </div>
                    @endif

                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Feature Section</button>
     
            </form>
        </div>





    </div>
</div>
@endsection