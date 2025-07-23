@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Add To Feature Card Section</h2>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <h1>Feature Card Section</h1>

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

            <form action="{{ route('UpdateToTeServicesSection',$services->id) }}" method="Post" class="mt-4">
                @csrf
                @method('PUT')
             
                <hr><hr>

                <div class="mb-3">
                    <label class="form-label">title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $services->title ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $services->description ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">lnik</label>
                    <input name="link" class="form-control" rows="3" value="{{ old('link', $services->link ?? '') }}">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Services</button>
     
            </form>
        </div>





    </div>
</div>
@endsection