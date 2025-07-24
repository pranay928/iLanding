@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>User Messages</h2>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        <!-- Features Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>User Name</th>
                        <th>email</th>
                        <th>subject</th>                       
                        <th>message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($msg as $msgs)
                    <tr>
                        <td>{{ $msgs->name }}</td>                        
                        <td>{{ $msgs->email }}</td>
                        <td>{{ $msgs->subject }}</td>  
                        <td class="text-start">{{ $msgs->message }}</td>                     
                        <!-- <td>
                            <div class="d-flex flex-column gap-2">
                                <a href="{{ route('showModifyFeatureCardSection', $msgs->id) }}" 
                                   class="btn btn-warning btn-sm">
                                   <i class="fa fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('DeleteToFeatureCardSection', $msgs->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure you want to delete this card?');" 
                                            class="btn btn-danger btn-sm mt-2">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
