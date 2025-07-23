@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Services Section Table</h2>
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
            <a href="{{ route('showAddToServicesSection') }}"
               class="btn btn-primary {{ count($service) >= 4 ? 'disabled' : '' }}"
               @if(count($service) >= 4) aria-disabled="true" onclick="return false;" @endif>
                <i class="fa fa-plus"></i> Add New Card
            </a>
        </div>

        <!-- Features Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>title</th>
                        <th>Description</th>
                        <th>color</th>                       
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($service as $service)
                    <tr>
                        <td>{{ $service->title }}</td>                        
                        <td class="text-start">{{ $service->description }}</td>
                        <td>{{ $service->link }}</td>                       
                        <td>
                            <div class="d-flex flex-column gap-2">
                                <a href="{{ route('showUpdateToTeServicesSection', $service->id) }}" 
                                   class="btn btn-warning btn-sm">
                                   <i class="fa fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('DeleteToFeatureCardSection', $service->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure you want to delete this service?');" 
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
