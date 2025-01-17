<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\EventPost;
use App\Models\EventPostImage;
use App\Models\EventPostVideo;
use App\Models\Gallery;
use App\Models\PostImage;
use App\Models\PostVideo;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class EventPostController extends Controller
{
    // user event posts display
    public function all_myEventPosts()
    {
        $posts = EventPost::where('user_id', auth()->id())
        ->whereIn('status', [1,0])->with('user')
        ->orderBy('created_at', 'desc')->get();
        return view('user.my_eventPosts',compact('posts'));
    }

    // user eventPost create
    public function createEventPost($id)
    {
        $event = Event::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $images = Gallery::where('user_id', Auth::id())->get();
        return view('user.add_newEventPost',compact('categories','tags','images','event'));
    }

    // user eventPost Store
    public function store(Request $request)
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

        $status = $request->input('status');

        // save as draft or save
        if ($status == 1) {
            $status =  0;
        } elseif ($status == 2) {
            $status = 2;
        }

        if ($request->hasFile('feature_image')) {
            $imageName = time() . '_1.' . $request->feature_image->extension();
            $request->feature_image->move(public_path('event_feature_image'), $imageName);
            $imagePath = $imageName;
        }else
        {
            $imagePath = null;
        }
        $slug = Str::slug($validatedData['title'], '-');

        $event_id = $request->event_id;
        $event_title = Event::find($event_id)->event_title;
        $auth = Auth::user()->id;
        $eventPost=EventPost::create([
            'user_id' => $auth,
            'event_id' => $event_id ,
            'event_title' => $event_title,
            'title' => $validatedData['title'],
            'category' => $validatedData['category'],
            'feature_image' => $imagePath,
            'content' => $validatedData['content'],
            'tags' => $validatedData['tags'],
            'meta_title' => $validatedData['meta_title'],
            'meta_description' => $validatedData['meta_description'],
            'meta_keywords' => $validatedData['meta_keywords'],
            'status' => $status,
            'slug' => $slug,
        ]);

        if ($request->hasFile('post_image1')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->post_image1->extension();
            $request->post_image1->move(public_path('eventPost_image1'), $imageName);
            $post_imagePath1 = $imageName;
        }else
        {
            $post_imagePath1 = null;
        }
        if ($request->hasFile('post_image2')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->post_image2->extension();
            $request->post_image2->move(public_path('eventPost_image2'), $imageName);
            $post_imagePath2 = $imageName;
        }else
        {
            $post_imagePath2 = null;
        }
        if ($request->hasFile('post_image3')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->post_image3->extension();
            $request->post_image3->move(public_path('eventPost_image3'), $imageName);
            $post_imagePath3 = $imageName;
        }else
        {
            $post_imagePath3 = null;
        }
        if ($request->hasFile('post_image4')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->post_image4->extension();
            $request->post_image4->move(public_path('eventPost_image4'), $imageName);
            $post_imagePath4 = $imageName;
        }else
        {
            $post_imagePath4 = null;
        }
        // Save the file path in the database
        EventPostImage::create([
            'event_post_id' => $eventPost->id,
            'post_image1' => $post_imagePath1,
            'post_image2' => $post_imagePath2,
            'post_image3' => $post_imagePath3,
            'post_image4' => $post_imagePath4,
        ]);


        if ($request->hasFile('video1')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->video1->extension();
            $request->video1->move(public_path('eventVideo1'), $imageName);
            $post_videoPath1 = $imageName;
        }else
        {
            $post_videoPath1 = null;
        }
        if ($request->hasFile('video2')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->video2->extension();
            $request->video2->move(public_path('eventVideo2'), $imageName);
            $post_videoPath2 = $imageName;
        }else
        {
            $post_videoPath2 = null;
        }
        // Save the file path in the database
        EventPostVideo::create([
            'event_post_id' => $eventPost->id,
            'video1' => $post_videoPath1,
            'video2' => $post_videoPath2,
        ]);

        return redirect()->route('user.myEventPosts')->with('success', 'Event Post created successfully!');

    }

    // delete Event post(move to bin)
    public function delete_eventPost($id)
    {
        $post = EventPost::find($id);
        $post->status = 3;
        $post->deleted_by = auth()->user()->role;
        $post->save();

        return back()->with('success','Event Post deleted successfully!');
    }

    // all bin posts display
    public function bin_EventPosts()
    {
        $posts = EventPost::where('status', 3)
        ->where('user_id', auth()->id())
        ->where('deleted_by', 'user')
        ->with('user')->orderBy('created_at', 'desc')->get();
        return view('user.bin_eventPosts',compact('posts'));
    }

    // restore event posts
    public function restore_eventPost($id)
    {
        $post = EventPost::find($id);
        $post->status = 2;
        $post->save();

        return back()->with('success','Event Post restored successfully!');
    }
    // draft evnt posts
    public function draft_EventPosts()
    {
        $posts = EventPost::where('status', 2)
        ->where('user_id', auth()->id())
        ->where('deleted_by', 'user')
        ->with('user')->orderBy('created_at', 'desc')->get();
        return view('user.draft_eventPosts',compact('posts'));
    }
    // delete draft event posts
    public function delete_draftEvent($id)
    {
        $post = EventPost::find($id);
        $post->delete();

        return back()->with('success','Draft deleted successfully!');

    }

    // edit event post
    public function edit_eventPost($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $images = Gallery::where('user_id', Auth::id())->get();
        $post = EventPost::with('EventPostVideo')->findOrFail($id);
        return view('user.edit_eventPost', compact('categories', 'tags', 'images', 'post'));
    }

    // update event post
    public function update(Request $request,$id)
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

        $post = EventPost::findOrFail($id);


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

        $post_image = EventPostImage::where('event_post_id',$post->id)->first();

        if ($request->hasFile('post_image1')) {
            if ($post_image->post_image1) {
                unlink(public_path('eventPost_image1/' . $post_image->post_image1));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->post_image1->extension();
            $request->post_image1->move(public_path('eventPost_image1'), $imageName);
            $post_imagePath1 = $imageName;
        } else {
            $post_imagePath1 = $post_image->post_image1;
        }

        if ($request->hasFile('post_image2')) {
            if ($post_image->post_image2) {
                unlink(public_path('eventPost_image2/' . $post_image->post_image2));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->post_image2->extension();
            $request->post_image2->move(public_path('eventPost_image2'), $imageName);
            $post_imagePath2 = $imageName;
        } else {
            $post_imagePath2 = $post_image->post_image2;
        }

        if ($request->hasFile('post_image3')) {
            if ($post_image->post_image3) {
                unlink(public_path('eventPost_image3/' . $post_image->post_image3));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->post_image3->extension();
            $request->post_image3->move(public_path('eventPost_image3'), $imageName);
            $post_imagePath3 = $imageName;
        } else {
            $post_imagePath3 = $post_image->post_image3;
        }

        if ($request->hasFile('post_image4')) {
            if ($post_image->post_image4) {
                unlink(public_path('eventPost_image4/' . $post_image->post_image4));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->post_image4->extension();
            $request->post_image4->move(public_path('eventPost_image4'), $imageName);
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


        $post_video = EventPostVideo::where('event_post_id',$post->id)->first();

        if ($request->hasFile('video1')) {
            if ($post_video->video1) {
                unlink(public_path('eventVideo1/' . $post_video->video1));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->video1->extension();
            $request->video1->move(public_path('eventVideo1'), $imageName);
            $post_videoPath1 = $imageName;
        } else {
            $post_videoPath1 = $post_video->video1;
        }

        if ($request->hasFile('video2')) {
            if ($post_video->video2) {
                unlink(public_path('eventVideo2/' . $post_video->video2));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->video2->extension();
            $request->video2->move(public_path('eventVideo2'), $imageName);
            $post_videoPath2 = $imageName;
        } else {
            $post_videoPath2 = $post_video->video2;
        }
        $post_video->update([
            'video1' => $post_videoPath1,
            'video2' => $post_videoPath2,
        ]);

        return redirect()->route('user.myEventPosts')->with('success', 'Event Post updated successfully!');

    }

    /////////////////////////////////////////////////////////////////////////////////////////
                                //admin//

    public function all_eventPosts()
    {
        $posts = EventPost::whereIn('status', [1,0])->with('user')
        ->orderBy('created_at', 'desc')->get();
        return view('admin.all_eventPosts',compact('posts'));
    }

    public function admin_bin_EventPosts()
    {
        $posts = EventPost::where('status', 3)
        ->where('deleted_by', 'admin')
        ->with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.bin_eventPosts',compact('posts'));
    }
    // restore event posts
     public function admin_restore_eventgPost($id)
    {
        $post = EventPost::find($id);
        $post->status = 0;
        $post->save();

        return back()->with('success','Event Post restored successfully!');
    }

    // all the event posts view one by one for approve
    public function view_eventPost($id)
    {
        $post = EventPost::with('user')->findOrFail($id);
        return view('admin.view_eventPost',compact('post'));
    }

    //  event posts admin approval
    public function approve_eventPost($id)
    {
        $post = EventPost::find($id);
        $post->status =  1 ;
        $post->save();

        return back()->with('success','Post Approved successfully!');
    }

}
