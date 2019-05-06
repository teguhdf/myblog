@extends('includes.head')

@section('title'," Tags Index")
@section('content')
    <div class="container" style="margin-bottom:30px">
        <div class="text-center"><h2>All Tags <small>({{$tags->total()}})</small></h2></div>
        <hr>
        @foreach ($tags as $tag)
            <h4><a href="{{route('tags.show',$tag->id)}}">{{$tag->name}}</a></h4>
            <p><small class="text-muted"><i class="fa fa-clock-o"></i>{{$tag->created_at->diffforHumans()}}</small></p>
            <div style="border-bottom:1px solid #099; margin-bottom: 11px">
                <p>{{$tag->posts->count()}} <i class="fa fa-list-alt"></i> POST</p>
            </div>
           
            
        @endforeach
        <div class="text-center">
            {!!$tags->links()!!}
        </div>
    </div>
@endsection