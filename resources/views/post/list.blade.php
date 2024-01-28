@extends('layouts.app')
@section('content')
@section('title','All Blogs')

<div class="container">


<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row">
        <div class="col-auto">
            <h1 class="h3">My Posts</h1>
        </div>
        @if(\Auth::check())
     
            <div class="col">
            
                <a href="{{ route('user.posts.create') }}"  style="float: right;" class="btn btn-circle btn-info ml-3">
                    <span>Create Post</span>
                </a>
                <a href="{{ route('home') }}"  style="float: right;margin: 0 10px 0;" class="btn btn-circle btn-info mr-3">
                    <span>Back to Dashboard</span>
                </a>
            </div>
        @endif 
    </div>
</div>
<br>

<div class="card">
    <form class="" id="sort_blogs" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6">All Posts</h5>
            </div>

            <div class="col-md-2">
                <div class="form-group mb-0">
                    <input type="text" class="form-control form-control-sm" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="Type & Enter">
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($posts) > 0)
                    @foreach($posts as $key => $blog)
                    <tr>
                   
                        <td>
                            {{$key+1}}
                         </td>
                        <td>
                           {{$blog->name}}
                        </td>
                        <td>
                            {{$blog->content}}
                         </td>
                    
            
                        <td class="text-right">
                            <a class="btn btn-soft-success btn-icon btn-circle btn-sm"  href="{{ route('user.posts.edit', encrypt($blog->id)) }}" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-soft-success btn-icon btn-circle btn-sm"  href="{{ route('user.posts.delete', $blog->id) }}" onclick="return confirm('Are you sure want to delete?')" title="Delete">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                        <tr>No data found</tr>
                    @endif
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $posts->appends(request()->input())->links() }}
            </div>
        </div>
    </form>
</div>
</div>
@endsection

