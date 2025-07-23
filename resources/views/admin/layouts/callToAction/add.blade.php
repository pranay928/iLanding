@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Add To CTA Section</h2>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <h1>Call To Action Section</h1>

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

            <form action="{{ route('AddToCTASection') }}" method="POST" class="mt-4">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ old('heading', $cta->heading ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">subtext</label>
                    <input type="text" name="subtext" class="form-control" value="{{ old('subtext', $cta->subtext ?? '') }}">
                </div>
                  
                <hr>

                
                   <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Button Text</label>
                        <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $cta->button_text ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Button Link</label>
                        <input type="text" name="button_link" class="form-control" value="{{ old('button_link', default: $cta->button_link ?? '') }}">
                    </div>
                </div>

            
                <button type="submit" class="btn btn-primary mt-3">Save CTA Section</button>
     
            </form>
        </div>





    </div>
</div>
@endsection