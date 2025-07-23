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
            <a href="{{ route('showAddTooFeaturesSection') }}"
               class="btn btn-primary {{ count($feature) >= 3 ? 'disabled' : '' }}"
               @if(count($feature) >= 3) aria-disabled="true" onclick="return false;" @endif>
                <i class="fa fa-plus"></i> Add New Feature
            </a>
        </div>

        <!-- Features Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Tab Title</th>
                        <th>Heading</th>
                        <th>Description</th>
                        <th>Feature 1</th>
                        <th>Feature 2</th>
                        <th>Feature 3</th>
                        <th>Feature 4</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feature as $feature)
                    <tr>
                        <td>{{ $feature->tab_title }}</td>
                        <td>{{ $feature->heading }}</td>
                        <td class="text-start">{{ $feature->description }}</td>
                        <td>{{ $feature->feature_list_first }}</td>
                        <td>{{ $feature->feature_list_second }}</td>
                        <td>{{ $feature->feature_list_third }}</td>
                        <td>{{ $feature->feature_list_fourth }}</td>
                        <td>
                            @if(!empty($feature->image))
                                <img src="{{ asset('admin/dynamicImages/feature/'.$feature->image) }}" 
                                     alt="Feature Image" class="img-thumbnail" width="120">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex flex-column gap-2">
                                <a href="{{ route('showModifyFeaturesSection', $feature->id) }}" 
                                   class="btn btn-warning btn-sm">
                                   <i class="fa fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('DeleteToFeaturesSection', $feature->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure you want to delete this feature?');" 
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
