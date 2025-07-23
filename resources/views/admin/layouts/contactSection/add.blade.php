@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Contact Section</h2>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <h1>Add To Contact Section</h1>

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

            <form action="{{ route('AddToContactSection') }}" method="POST" class="mt-4">
                @csrf
                @method('POST')

                
                <div class="mb-3">
                    <label class="form-label">Section Description</label>
                    <textarea name="section_description" class="form-control" rows="3">{{ old('section_description', $contact->section_description ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Intro Text</label>
                    <input type="text" name="intro_text" class="form-control" value="{{ old('intro_text', $contact->intro_text ?? '') }}">
                </div>

                   <div class="row g-3">

                   <div class="col-md-6">
                        <label class="form-label">Address Line 1</label>
                        <input type="text" name="address_line_1" class="form-control" value="{{ old('address_line_1', $contact->address_line_1 ?? '') }}">
                    </div>
                  
                    <div class="col-md-6">
                        <label class="form-label">Address Line 2</label>
                        <input type="text" name="address_line_2" class="form-control" value="{{ old('address_line_2', default: $contact->address_line_2 ?? '') }}">
                    </div>
                    </div>

                <hr>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Phone 1</label>
                        <input type="text" name="phone_1" class="form-control" value="{{ old('phone_1', $contact->phone_1 ?? '') }}">
                    </div>
                  
                    <div class="col-md-6">
                        <label class="form-label">Email 1</label>
                        <input type="text" name="email_1" class="form-control" value="{{ old('email_1', default: $contact->email_1 ?? '') }}">
                    </div>
                  
                    <div class="col-md-6">
                        <label class="form-label">Phone 2</label>
                        <input type="text" name="phone_2" class="form-control" value="{{ old('phone_2', default: $contact->phone_2 ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email 2</label>
                        <input type="text" name="email_2" class="form-control" value="{{ old('email_2', $contact->email_2 ?? '') }}">
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="form-label">Form Text</label>
                    <input type="text" name="form_text" class="form-control" value="{{ old('form_text', $contact->form_text ?? '') }}">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Save Contact Section</button>
     
            </form>
        </div>





    </div>
</div>
@endsection