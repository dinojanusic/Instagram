<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Post;
use DB;
use Collective\Html\Eloquent\FormAccessible;

class PostController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth')->except('show');
  }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data->validate($request,[
          'caption' => 'required',
          'image' => 'required|image',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
          // Get file name with extensions
          $fileNameWithExt = $request->file('image')->getClientOriginalName();
          // get jus filename
          $filename =pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          // Get just ext
          $extension = $request->file('image')->getClientOriginalExtension();
          //Filename to Store$fileNameToStoe
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          // Upload image
          $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }else {
          $fileNameToStore = 'noimage.jpg';
        }

        // Image Resize
        $image = Image::make(public_path("storage/images/{$fileNameToStore}"))->resize(1920,1080);
        $image->save();

        // create posts
        $post = new Post;
        $post->caption = $request->input('caption');
        $post->user_id = auth()->user()->id;
        $post->image = $fileNameToStore;
        $post->save();

        return redirect('/home');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
