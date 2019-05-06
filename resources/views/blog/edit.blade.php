
@extends('includes.head')

@section('content')
<br>
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <div class="well">
      <form action="{{ route('posts.update',$posts->id) }}" method="post" enctype="multipart/form-data">
        <div class="text-center">
          <h4>Buat Post</h4>
        </div>
        {{csrf_field()}}
        {{method_field('put')}}
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" class="form-control" name="title" value="{{$posts->title}}">
        </div>
        <div class="form-group">
          <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="" class="disable selected">Pilih Kategori</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}" <?php if ($posts->category_id == $category->id) {echo "selected";}?>>{{$category->name}}</option>  
          @endforeach
        </select>
      </div>
      <div class="form-group">
          <label for="tags">Tags</label>
        <select name="tags[]" id="tags" multiple="multiple" class="form-control selectpicker">
          @foreach ($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>  
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="image">Pilih Gambar</label>
        <input type="file" name="image" class="form-control">
      </div>
      <div class="form-group">
        <img src="{{asset('images/'.$posts->image)}}" alt="" width="100%" height="200px">
      </div>
        <div class="form-group">
          <label for="">Content</label>
          <textarea name="content" class="form-control" placeholder="Tulis disini...">{{$posts->content}}</textarea>
        </div>
        <button type="submit" name="button" class="btn btn-success">Save</button>
      </form>
    </div>
  </div>
</div>

@endsection

@section('js')
    <script> 
    $(".selectpicker").selectpicker().val({!!json_encode($posts->tags()->allRelatedIds())!!}).trigger('change');

    CKEDITOR.replace( 'content' );
    </script>
@endsection