@extends('includes.head')

@section('content')

<div class="container"><br>
    <div class="row">
        <div class="col-md-9">
            @foreach ($posts as $post)
                <div class="post-item">
                    <div class="post-inner">
                        <div class="post-head clearfix">
                            <div class="col-md-4">
                                <a href=""><img src="{{asset('images/'.$post->image)}}" alt="" width="100%" height="auto"></a>
                            </div> 
                            <div class="col-md-8">
                                <div class="detail">
                                    <h3 class="handle"><a href="posts/{{$post->slug}}">{{$post->title}}</a></h3>
                                </div>
                                <div class="post-meta">
                                    <div>
                                        <span>{{date('j F Y', strtotime($post->created_at))}}</span>|
                                        <span>by</span>
                                        <span><a href="">Admin</a></span>
                                    </div>
                                </div>
                                        <span class="share">
                                            <i class="fa fa-facebook"></i>
                                            <i class="fa fa-twitter"></i>
                                            <i class="fa fa-redit"></i>
                                        </span>
                                        @foreach ($post->tags as $tag)
                                            <span class="label label-success">{{$tag->name}}</span>
                                        @endforeach
                                    <div class="content" style="margin-top:12px">
                                        {!!str_limit($post->content,200)!!}
                                    </div>
                            </div>     
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
       
        @include('includes.sidebar')
       
    </div>
    <!-- FOOTER -->
    <div class="text-center">
        {{$posts->links()}}
 </div>
    <!-- END FOOTER -->
</div>

@endsection