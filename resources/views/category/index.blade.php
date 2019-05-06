@extends('includes.head')

@section('title'," Category Index")
@section('content')
    <div class="container" style="margin-bottom:30px">
        <div class="text-center"><h2>All Category <small>({{$categories->total()}})</small></h2></div>
        <hr>
        @foreach ($categories as $category)
            <h4><a href="{{route('category.show',$category->id)}}">{{$category->name}}</a></h4>
            <p><small class="text-muted"><i class="fa fa-clock-o"></i>{{$category->created_at->diffforHumans()}}</small></p>
            <div style="border-bottom:1px solid #099; margin-bottom: 11px">
                <p>{{$category->posts->count()}} <i class="fa fa-list-alt"></i> POST</p>
            </div>
           
            
        @endforeach
        <div class="text-center">
            {!!$categories->links()!!}
        </div>
    </div>
@endsection