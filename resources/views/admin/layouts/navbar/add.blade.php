@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Navigation Bar</h2>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <h1>Add to Nav Bar</h1>

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

            <form action="{{ route('AddToNavbar') }}" method="Post" class="mt-4">
                @csrf
                @method('POST')
             
                <hr><hr>

                <div class="mb-3">
                    <label class="form-label">title</label>
                    <input type="text" name="title" class="form-control" >
                </div>

                <div class="mb-3">
                    <label class="form-label">Link</label>
                    <input name="link" class="form-control" rows="3" >
                </div>

                <button type="submit" class="btn btn-primary mt-3">Save Nav Bar</button>
     
            </form>
        </div>





    </div>
</div>
@endsection