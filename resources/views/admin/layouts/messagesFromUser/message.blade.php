@extends('admin.layouts.app')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Email View</h2>
                </div>
            </div>
        </div>

        <style>
            .email-wrapper {
                background: #fff;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.05);
                margin-top: 20px;
            }
            .email-subject {
                font-weight: 700;
                font-size: 1.2rem;
                margin-bottom: 15px;
                text-transform: uppercase;
            }
            .email-meta {
                display: flex;
                align-items: center;
                justify-content: space-between;
                border-bottom: 1px solid #eee;
                padding-bottom: 15px;
                margin-bottom: 20px;
            }
            .email-meta-left {
                display: flex;
                align-items: center;
            }
            .email-meta-left img {
                border: 2px solid #ddd;
                border-radius: 50%;
                margin-right: 12px;
            }
            .email-meta-left div strong {
                font-size: 1rem;
                color: #333;
            }
            .email-meta-left div small {
                color: #777;
                font-size: 0.9rem;
            }
            .email-meta-right {
                color: #999;
                font-size: 0.85rem;
                margin-left: 20px;
            }
            .email-body p {
                font-size: 15px;
                color: #555;
                line-height: 1.7;
            }
        </style>

        <div class="row">
            <div class="col-md-12">
                <div class="email-wrapper">
                    <div class="email-subject">
                      Subject :  {{ $message->subject }}.
                    </div>
                    <div class="email-meta">
                        <div class="email-meta-left">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="50" height="50">
                            <div>
                                <strong>{{ $message->name }}</strong><br>
                                <small>{{ $message->email }}</small>
                            </div>
                        </div>
                        <div class="email-meta-right">
                           <strong> {{ \Carbon\Carbon::parse($message->created_at)->format('g:i A, M d ') }}</strong>

                        </div>
                    </div>
                    <div class="email-body">
                        <p>
                            {{ $message->message }}
                        </p>
                    </div>
                    <a href="{{ route('showReplay',$message->id) }}" class="btn btn-success">Replay</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
