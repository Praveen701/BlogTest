@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="post_listing">
                @if(count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="post_heading mt-3">
                           <h2>{{$post->name}}</h2> 
                    </div>
                    <div class="post_content">
                        <p>{{$post->content}}</p>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <p>Created by <b>{{$post->user_detail->name}}</b></p>
                        </div>
                       <div class="col-6">
                            <p>Created <b>{{$post->created_at->diffForHumans()}}</b></p>
                        </div>
                    </div>
                    @if(!$loop->last)
                    <hr>
                    @endif
                    @endforeach
                    <div class="mt-4">
                        {{ $posts->onEachSide(0)->links() }}
                    </div>
                    @else
                   <p class="mt-3"> No Post Found</p>
                    @endif
            </div>




        </div>
    </div>
</div>

<style scoped>
[fill="currentColor"]
{
    display:none;
}
</style>
@endsection
