@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="manage_blog row mt-4">
                        <div class="col-md-4">
                            <a type="button" href="{{url('user/posts')}}" class="btn btn-primary">Manage Post</a>

                            <a type="button" href="{{url('/')}}" class="btn btn-primary mr-3">Blog Page</a>
                        </div>
                       
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
