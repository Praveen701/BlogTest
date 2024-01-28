@extends('layouts.app')

@section('content')

<div class="container">
  

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row">
  
        @if(\Auth::check())
        <div class="col text-right">
            <a href="{{ route('user.posts') }}"  style="float: right;" class="btn btn-circle btn-info">
                <span>Back</span>
            </a>
        </div>
    @endif 
    </div>
</div>


<div class="row">
  
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Create Post</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('user.posts.store') }}" method="POST">
                	@csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Name <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Enter Name" id="name" name="name" class="form-control" required>
                        </div>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    <div class="form-group row mt-3">
                        <label class="col-md-3 col-form-label">Content <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="content" placeholder="Enter Content" rows="5" class="form-control" required></textarea>
                        </div>
                    </div>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
