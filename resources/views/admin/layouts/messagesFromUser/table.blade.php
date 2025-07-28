@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Inbox</h2>
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
            <table class="table table-bordered border-4 align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Message From</th>
                        <th>email</th>
                        <th>subject</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($msg as $msgs)
                    
                     <tr @if ($msgs->isRead == false ) style="background-color:#d9d9d9;" @endif>
                        <td><a href="{{ route('showMessage',$msgs->id) }}">{{ $msgs->name }}</a></td>                        
                        <td><a href="{{ route('showMessage',$msgs->id) }}">{{ $msgs->email }}</a></td>
                        <td><a href="{{ route('showMessage',$msgs->id) }}">{{ $msgs->subject }}</a></td>  
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
