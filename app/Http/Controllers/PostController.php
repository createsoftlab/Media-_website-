<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\PostVideo;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    // all the blog posts display
    public function all_blogPosts()
    {
        $posts = Post::whereIn('status', [0, 1])
        ->whereHas('user', function ($query) {
            $query->where('role', '!=', 'admin');
        })
        ->with('user')
        ->orderByRaw("FIELD(status, 0) DESC") // Prioritize status 0
        ->orderBy('created_at', 'desc') // Secondary sorting by created_at
        ->get();

        return view('admin.all_blogPosts', compact('posts'));

    }
    // all the blog posts view one by one for approve
    public function view_blogPost($id)
    {
        $post = Post::with('user')->findOrFail($id);
        return view('admin.view_blogPost',compact('post'));
    }
    //  blog posts admin approval
    public function approve_blogPost($id)
    {
        $post = Post::find($id);
        $post->status =  1 ;
        $post->save();

        return back()->with('success','Post Approved successfully!');
    }
    // my (admin) blog posts display
    public function all_myblogPosts()
    {
         $posts = Post::where('user_id', auth()->id())
         ->where('status', '1')->with('user')->get();
         return view('admin.all_myblogPosts',compact('posts'));
    }
    // my (admin) draft blogPosts
    public function draft_myblogPosts()
    {
        $posts = Post::where('user_id', auth()->id())
        ->where('status', '2')->with('user')->get();
        return view('admin.draft_myblogPosts',compact('posts'));
    }

    // admin blogPost create
    public function createPost()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $images = Gallery::where('user_id', Auth::id())->get();
        return view('admin.add_newPost',compact('categories','tags','images'));
    }

    // admin/user blogPost Store
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'string|max:255',
        'category' => 'required|string',
        'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'content' => 'required',
        'tags' => 'nullable',
        'meta_title' => 'nullable|max:255',
        'meta_description' => 'nullable|string|max:500',
        'meta_keywords' => 'nullable|string',
        'post_image1' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'post_image2' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'post_image3' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'post_image4' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'video1' => 'nullable|mimes:mp4,mkv,avi|max:40960',
        'video2' => 'nullable|mimes:mp4,mkv,avi|max:40960',
    ]);

    $slug = Str::slug($validatedData['title'], '-');
    $isAdmin = Auth::user()->role === 'admin';
    $status = $request->input('status');

    // Save as draft or save
    if ($status == 1) {
        $status = $isAdmin ? 1 : 0;
    } elseif ($status == 2) {
        $status = 2;
    }

    if ($request->hasFile('feature_image')) {
        $imageName = time() . '_1.' . $request->feature_image->extension();
        $request->feature_image->move(public_path('feature_image'), $imageName);
        $imagePath = $imageName;
    }else
    {
        $imagePath = null;
    }
    // Create Post
    $auth = Auth::user()->id;
    $post = Post::create([
        'user_id' => $auth,
        'title' => $validatedData['title'],
        'category' => $validatedData['category'],
        'content' => $validatedData['content'],
        'feature_image' => $imagePath,
        'tags' => $validatedData['tags'],
        'meta_title' => $validatedData['meta_title'],
        'meta_description' => $validatedData['meta_description'],
        'meta_keywords' => $validatedData['meta_keywords'],
        'status' => $status,
        'slug' => $slug,
    ]);

    if ($request->hasFile('post_image1')) {
        $imageName = time() . '_' . uniqid() . '.' . $request->post_image1->extension();
        $request->post_image1->move(public_path('post_image1'), $imageName);
        $post_imagePath1 = $imageName;
    }else
    {
        $post_imagePath1 = null;
    }
    if ($request->hasFile('post_image2')) {
        $imageName = time() . '_' . uniqid() . '.' . $request->post_image2->extension();
        $request->post_image2->move(public_path('post_image2'), $imageName);
        $post_imagePath2 = $imageName;
    }else
    {
        $post_imagePath2 = null;
    }
    if ($request->hasFile('post_image3')) {
        $imageName = time() . '_' . uniqid() . '.' . $request->post_image3->extension();
        $request->post_image3->move(public_path('post_image3'), $imageName);
        $post_imagePath3 = $imageName;
    }else
    {
        $post_imagePath3 = null;
    }
    if ($request->hasFile('post_image4')) {
        $imageName = time() . '_' . uniqid() . '.' . $request->post_image4->extension();
        $request->post_image4->move(public_path('post_image4'), $imageName);
        $post_imagePath4 = $imageName;
    }else
    {
        $post_imagePath4 = null;
    }
    // Save the file path in the database
    PostImage::create([
        'post_id' => $post->id,
        'post_image1' => $post_imagePath1,
        'post_image2' => $post_imagePath2,
        'post_image3' => $post_imagePath3,
        'post_image4' => $post_imagePath4,
    ]);


    if ($request->hasFile('video1')) {
        $imageName = time() . '_' . uniqid() . '.' . $request->video1->extension();
        $request->video1->move(public_path('video1'), $imageName);
        $post_videoPath1 = $imageName;
    }else
    {
        $post_videoPath1 = null;
    }
    if ($request->hasFile('video2')) {
        $imageName = time() . '_' . uniqid() . '.' . $request->video2->extension();
        $request->video2->move(public_path('video2'), $imageName);
        $post_videoPath2 = $imageName;
    }else
    {
        $post_videoPath2 = null;
    }
    // Save the file path in the database
    PostVideo::create([
        'post_id' => $post->id,
        'video1' => $post_videoPath1,
        'video2' => $post_videoPath2,
    ]);


    if ($isAdmin) {
        return redirect()->route('admin.myblogPosts')->with('success', 'Post created successfully!');
    } else {
        return redirect()->route('user.myblogPosts')->with('success', 'Post created successfully!');
    }
}


     // admin edit blogPost
     public function edit_myblogPost($id)
     {
        $categories = Category::all();
        $tags = Tag::all();
        $images = Gallery::where('user_id', Auth::id())->get();
        $post = Post::with(['PostImage', 'PostVideo'])->findOrFail($id);
        return view('admin.edit_post',compact('categories','tags','images','post'));

     }

    // admin/user blogPost Update
    public function update(Request $request, $id)
{

    $validatedData = $request->validate([
        'title' => 'string|max:255',
        'category' => 'required|string',
        'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'content' => 'required',
        'tags' => 'nullable',
        'meta_title' => 'nullable',
        'meta_description' => 'nullable|string|max:500',
        'meta_keywords' => 'nullable|string',
        'post_image1' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'post_image2' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'post_image3' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'post_image4' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'video1' => 'nullable|mimes:mp4,mkv,avi|max:40960',
        'video2' => 'nullable|mimes:mp4,mkv,avi|max:40960',
    ]);

    $post = Post::findOrFail($id);


    if ($request->hasFile('feature_image')) {
        if ($post->feature_image) {
            unlink(public_path('feature_image/' . $post->feature_image));
        }
        $imageName = time() . '_1.' . $request->feature_image->extension();
        $request->feature_image->move(public_path('feature_image'), $imageName);
        $imagePath = $imageName;
    } else {
        $imagePath = $post->feature_image;
    }

    $status = auth()->user()->role === 'admin' ? 1 : 0;

    $post->update([
        'title' => $validatedData['title'],
        'category' => $validatedData['category'],
        'feature_image' => $imagePath,
        'content' => $validatedData['content'],
        'tags' => $validatedData['tags'],
        'meta_title' => $validatedData['meta_title'],
        'meta_description' => $validatedData['meta_description'],
        'meta_keywords' => $validatedData['meta_keywords'],
        'status' => $status,
    ]);

    $post_image = PostImage::where('post_id',$post->id)->first();

    if ($request->hasFile('post_image1')) {
        if ($post_image->post_image1) {
            unlink(public_path('post_image1/' . $post_image->post_image1));
        }
        $imageName = time() . '_' . uniqid() . '.' . $request->post_image1->extension();
        $request->post_image1->move(public_path('post_image1'), $imageName);
        $post_imagePath1 = $imageName;
    } else {
        $post_imagePath1 = $post_image->post_image1;
    }

    if ($request->hasFile('post_image2')) {
        if ($post_image->post_image2) {
            unlink(public_path('post_image2/' . $post_image->post_image2));
        }
        $imageName = time() . '_' . uniqid() . '.' . $request->post_image2->extension();
        $request->post_image2->move(public_path('post_image2'), $imageName);
        $post_imagePath2 = $imageName;
    } else {
        $post_imagePath2 = $post_image->post_image2;
    }

    if ($request->hasFile('post_image3')) {
        if ($post_image->post_image3) {
            unlink(public_path('post_image3/' . $post_image->post_image3));
        }
        $imageName = time() . '_' . uniqid() . '.' . $request->post_image3->extension();
        $request->post_image3->move(public_path('post_image3'), $imageName);
        $post_imagePath3 = $imageName;
    } else {
        $post_imagePath3 = $post_image->post_image3;
    }

    if ($request->hasFile('post_image4')) {
        if ($post_image->post_image4) {
            unlink(public_path('post_image4/' . $post_image->post_image4));
        }
        $imageName = time() . '_' . uniqid() . '.' . $request->post_image4->extension();
        $request->post_image4->move(public_path('post_image4'), $imageName);
        $post_imagePath4 = $imageName;
    } else {
        $post_imagePath4 = $post_image->post_image4;
    }

    $post_image->update([
        'post_image1' => $post_imagePath1,
        'post_image2' => $post_imagePath2,
        'post_image3' => $post_imagePath3,
        'post_image4' => $post_imagePath4,
    ]);


    $post_video = PostVideo::where('post_id',$post->id)->first();

    if ($request->hasFile('video1')) {
        if ($post_video->video1) {
            unlink(public_path('video1/' . $post_video->video1));
        }
        $imageName = time() . '_' . uniqid() . '.' . $request->video1->extension();
        $request->video1->move(public_path('video1'), $imageName);
        $post_videoPath1 = $imageName;
    } else {
        $post_videoPath1 = $post_video->video1;
    }

    if ($request->hasFile('video2')) {
        if ($post_video->video2) {
            unlink(public_path('video2/' . $post_video->video2));
        }
        $imageName = time() . '_' . uniqid() . '.' . $request->video2->extension();
        $request->video2->move(public_path('video2'), $imageName);
        $post_videoPath2 = $imageName;
    } else {
        $post_videoPath2 = $post_video->video2;
    }
    $post_video->update([
        'video1' => $post_videoPath1,
        'video2' => $post_videoPath2,
    ]);

    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.myblogPosts')->with('success', 'Post updated successfully!');
    } else {
        return redirect()->route('user.myblogPosts')->with('success', 'Post updated successfully!');
    }

}
    // admin/user delete blog post(move to bin)
    public function delete_blogPost($id)
    {
        $post = Post::find($id);
        $post->status = 3;
        $post->deleted_by = auth()->user()->role;
        $post->save();

        return back()->with('success','Post deleted successfully!');

    }
    public function delete_draft($id)
    {
        $post = Post::find($id);
        $post->delete();

        return back()->with('success','Draft deleted successfully!');

    }
    // all the recycle bin posts display
    public function recycle_binblogPosts()
    {
        $posts = Post::where('status', 3)
        ->where('deleted_by', 'admin')
        ->with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.recycle_bin_blogPosts',compact('posts'));
    }
    // admin restore blog post(move to bin)
    public function restore_blogPost($id)
    {
        $post = Post::find($id);
        $userid = $post->user_id;
        $userRole = User::where('id', $userid)->pluck('role')->first();
        if($userRole == 'admin')
        {
            $post->status = 1;
        }else
        {
            $post->status = 0;
        }
        $post->save();

        return back()->with('success','Post restored successfully!');
    }


    ///////////////////////////////////////////////////////////////////////////////////////////
                                   //User blog posts//

    // user blogPost create
    public function my_blogPosts()
    {
        $posts = Post::where('user_id', auth()->id())
        ->whereIn('status',[0,1])->get();
        return view('user.my_blogPosts',compact('posts'));
    }

    public function userCreateBlogPost()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $images = Gallery::where('user_id', Auth::id())->get();
        return view('user.add_newBlogPost',compact('categories','tags','images'));
    }

    public function edit_blogPost($id)
    {
       $categories = Category::all();
       $tags = Tag::all();
       $images = Gallery::where('user_id', Auth::id())->get();
       $post = Post::with(['PostImage', 'PostVideo'])->findOrFail($id);
       return view('user.edit_blogPost',compact('categories','tags','images','post'));

    }
    public function draft_blogPosts()
    {
        $posts = Post::where('user_id', auth()->id())
        ->where('status', '2')->with('user')->get();
        return view('user.draft_blogPosts',compact('posts'));
    }

    // all the recycle bin posts display
    public function user_binblogPosts()
    {
        $posts = Post::where('status', 3)
        ->where('user_id', auth()->id())
        ->where('deleted_by', 'user')
        ->with('user')->orderBy('created_at', 'desc')->get();
        return view('user.bin_blogPosts',compact('posts'));
    }


}
