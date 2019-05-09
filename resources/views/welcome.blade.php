@extends('includes.head')
@section('title', 'welcome')

@section('content')


 <div class="header_wrap">
  <div class="info">
     <div class="container">
         <div class="row">
            <div class="col-md-7">
                 <div class="header_info">
                    <div class="descrip">
                        <a href="#">
                        <h1 style="color:#ece705; font-weight: bold;     margin-top: 0;">WELCOME</h1>
                          </a>
                         <p>
                           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt.
                           </p><br>
                           <div>
                           <p>
                            <a href="#" class="btn btn-danger" >Singup</a>
                             <a href="#" class="btn btn-danger" >Login</a>
                            </p>

                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>

        <section class="wp-separator">
            <article class="section">
                <div class="container">
                    <div class="row text-center">
                        <p class="h1">ACTIVITIES & EVENTS</p>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum nam numquam voluptates cumque </p>
                    </div>
                </div>
            </article>
        </section>

<div class="container-fluid">
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                  <div class="well well-sm wl">
                <div class="btn-group">
                    <a href="#" id="list" class="btn btn-default btn-sm"><span class="fa fa-th-list">
                    </span> List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                        class="fa fa-th"></span> Grid</a>
                </div>
            </div>

                  <div id="grid_post" class="row list-group">
                        @foreach($posts2 as $post)
                         <div class="item  col-xs-4 col-lg-4">
                            <div class="thumbnail as">
                               <img class="group list-group-image" src="{{asset('images/'.$post->image)}}" alt="" />
                                <div class="caption">
                                    <div class="c_hr">
                                    <h4 class="group inner list-group-item-heading"><a href="{{url('posts/'.$post->id)}}">{{str_limit($post->title, 20)}}</a></h4>
                                         <small>{{date('j F Y, h:ia', strtotime($post->created_at))}}</small> | by <a href="#">Admin</a>
                                     </div>
                                    <p class="group inner list-group-item-text">{!!str_limit($post->content, 50) !!}</p>
                                    <div class="row"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                  </div><!-- end grid -->
                </div>

              @include('includes.sidebar')
            </div><!-- end row -->
            <div class="text-center">
                {{$posts2->links()}}
         </div>
        </div>
    </section>
        <!-- FOOTER -->
     {{-- <div class="text-center">
            {{$posts2->links()}}
     </div> --}}
        <!-- END FOOTER -->
</div><!-- end con fluid -->
@endsection
