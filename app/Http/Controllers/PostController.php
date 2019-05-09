<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Storage;
use Illuminate\Support\Facades\Storage as IlluminateStorage;

class PostController extends Controller
{


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = post::orderBy('id', 'desc')->paginate(3);;
    $categories = Category::all();
    // dd($categories);
    // die;
    $tags = Tag::all();
    return view('blog.index', ['categories' => $categories, 'tags' => $tags])->withPosts($posts);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $posts = Post::all();
    $categories = Category::all();
    $tags = Tag::all();
    return view('blog.create')->withCategories($categories)->withTags($tags)->withPosts($posts);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|min:5',
      'content' => 'required',
      'category_id' => 'required',
      'tags' => 'required',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $posts = new Post;
    $posts->title = $request->title;
    $posts->slug = str_slug($posts->title);
    $posts->content = $request->content;
    $posts->category_id = $request->category_id;
    if ($request->file('image')) {
      $file = $request->file('image');
      $fileName = time() . '.' . $file->getClientOriginalExtension();
      $destinationPath = public_path('/images');
      $file->move($destinationPath, $fileName);
      $posts->image = $fileName;
    }

    $posts->save();
    $posts->tags()->sync($request->tags);
    return back()->withInfo("Post Baru berhasil dibuat...");
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $categories = Category::paginate(4);
    $tags = Tag::paginate(4);
    $posts = Post::where('id', $id)->first();


    return view('blog.show')->withPosts($posts)->withTags($tags)->withCategories($categories);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $tags = Tag::all();
    $categories = Category::all();
    $posts = Post::find($id);
    return view('blog.edit')->withPosts($posts)->withCategories($categories)->withTags($tags);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'title' => 'required|min:5',
      'content' => 'required',
      'category_id' => 'required',
      'tags' => 'required',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $posts = Post::find($id);
    $posts->title = $request->title;
    $posts->slug = str_slug($posts->title);
    $posts->content = $request->content;
    $posts->category_id = $request->category_id;
    if ($request->file('image')) {
      $file = $request->file('image');
      $fileName = time() . '.' . $file->getClientOriginalExtension();
      $destinationPath = public_path('/images');
      $file->move($destinationPath, $fileName);

      $oldFilename = $posts->image;
      \Storage::delete($oldFilename);
      $posts->image = $fileName;
    }

    $posts->save();
    $posts->tags()->sync($request->tags);
    return back()->withInfo("Post Baru berhasil diedit...");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $posts = Post::find($id);
    Storage::delete($posts->image);
    $posts->tags()->detach();
    $posts->delete();

    return back()->withInfo('Data berhasil dihapus!!');
  }
}
