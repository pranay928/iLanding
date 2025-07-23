@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add New Button -->
        <div class="my-3 d-flex justify-content-end">
            <a href="{{ route('showAddToTestimonialSection') }}"
               class="btn btn-primary {{ count($testimonial) >= 4 ? 'disabled' : '' }}"
               @if(count($testimonial) >= 3) aria-disabled="true" onclick="return false;" @endif>
                <i class="fa fa-plus"></i> Add New Feature
            </a>
        </div>

        <!-- Features Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Profile Name</th>
                        <th>Profile Position</th>
                        <th>Profile Image</th>
                        <th>Rating</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonial as $testimonial)
                    <tr>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ $testimonial->designation }}</td>
                        <td>
                            @if(!empty($testimonial->image))
                                <img src="{{ asset('admin/dynamicImages/testimonials/'.$testimonial->image) }}" 
                                     alt="Feature Image" class="img-thumbnail" width="120">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ $testimonial->rating }}</td>
                        <td class="text-start">{{ $testimonial->message }}</td>                       
                        <td>
                            <div class="d-flex flex-column gap-2">
                                <a href="{{ route('showUpdateToTestimonialSection', $testimonial->id) }}" 
                                   class="btn btn-warning btn-sm">
                                   <i class="fa fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('DeleteToTestimonialSection', $testimonial->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure you want to delete this testimonial?');" 
                                            class="btn btn-danger btn-sm mt-2">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
