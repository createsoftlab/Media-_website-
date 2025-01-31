<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\EventPost;
use App\Models\LiveEvent;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // live events/blog posts in home
    public function view_home()
    {
        $events = Event::where('status', 1)
            ->orderBy('created_at', 'desc')->paginate(4);
        $live = LiveEvent::orderBy('created_at', 'desc')->paginate(6);
        $posts = Post::where('status', 1)
            ->orderBy('created_at', 'desc')->paginate(6);
        $latestPosts = Post::where('status', 1)->orderBy('created_at', 'desc')->paginate(3);
        $categories = Category::orderBy('created_at', 'desc')->get();
        $oldcategories = Category::orderBy('created_at', 'asc')->paginate(6);
        $pupularPosts = Post::withCount([
            'likes' => function ($query) {
                $query->where('liked', 1);
            }
        ])
            ->where('status', 1)
            ->orderBy('likes_count', 'desc')->get();
        return view('home.index', compact('live', 'posts', 'categories', 'pupularPosts', 'latestPosts', 'events', 'oldcategories'));
    }
    // view blog posts under category
    public function category_post_list($id)
    {
        $category = Category::find($id);
        $categories = Category::orderBy('created_at', 'desc')->paginate(4);
        $posts = Post::where('category', $category->category)
            ->where('status', 1)->withCount(['likes' => function ($query) {
                $query->where('liked', 1);
            }])->orderBy('created_at', 'desc')->paginate(6);
        $latestPosts = Post::where('category', $category->category)
            ->where('status', 1)->orderBy('created_at', 'desc')->paginate(3);
        return view('home.category_blogs', compact('posts', 'category', 'categories', 'latestPosts'));
    }

    public function view_about()
    {
        $pupularPosts = Post::withCount([
            'likes' => function ($query) {
                $query->where('liked', 1);
            }
        ])
            ->where('status', 1)
            ->orderBy('likes_count', 'desc')->paginate(3);
        return view('home.about', compact('pupularPosts'));
    }
    public function view_archive()
    {
        return view('home.archive');
    }
    public function view_author()
    {
        return view('home.author');
    }
    public function view_book()
    {
        return view('home.book');
    }
    public function view_contact()
    {
        $pupularPosts = Post::withCount([
            'likes' => function ($query) {
                $query->where('liked', 1);
            }
        ])
            ->where('status', 1)
            ->orderBy('likes_count', 'desc')->paginate(3);
        return view('home.contact', compact('pupularPosts'));
    }
    public function view_flip()
    {
        return view('home.flip');
    }

    // home events
    public function view_events()
    {
        $latestPosts = Post::where('status', 1)->orderBy('created_at', 'desc')->paginate(3);
        $categories = Category::orderBy('created_at', 'desc')->paginate(4);
        $events = Event::where('status', 1)
            ->orderBy('created_at', 'desc')->get();
        return view('home.home-tech-blog', compact('events', 'categories', 'latestPosts'));
    }
    // apply event
    public function apply_events($id)
    {
        $event = Event::findOrFail($id);


        // Store the intended event details URL in session
        session(['url.intended' => route('home.event.details', ['id' => $id])]);

        // Render the apply_event view with the event data
        return view('home.apply_event', compact('event'));
        // // Redirect the user to the login page
        // return redirect()->route('login');
    }
    // home event deails view
    public function event_details($id)
    {
        $event = Event::find($id);
        $event_posts = EventPost::where('event_id', $event->id)->where('status', 1)->withCount(['Eventlikes' => function ($query) {
            $query->where('liked', 1);
        }])
            ->orderBy('created_at', 'desc')->get();
        $latestevent_posts = EventPost::where('event_id', $event->id)->where('status', 1)
            ->orderBy('created_at', 'desc')->paginate(3);
        return view('home.event_details', compact('event', 'event_posts', 'latestevent_posts'));
    }
    // event post details
    public function event_post_details($id, $slug)
    {
        $post = EventPost::with(['EventPostImage', 'EventPostVideo', 'user', 'EventLikes'])->findOrFail($id);
        // Check if the user has already viewed this post in the current session
        $viewedPosts = session()->get('viewed_posts', []); // Retrieve the array of viewed posts
        $uniqueKey = $id . '-' . $slug; // Create a unique key using id and slug

        if (!in_array($uniqueKey, $viewedPosts)) {
            // Increment the view count
            $post->increment('views_count');

            // Add the unique key to the session
            session()->push('viewed_posts', $uniqueKey);
        }


        $categories = Category::orderBy('created_at', 'desc')->paginate(4);
        $latestevent_posts = EventPost::where('status', 1)
            ->orderBy('created_at', 'desc')->paginate(3);
        $posts = EventPost::where('status', 1)->orderBy('created_at', 'desc')->paginate(4);

        $eventPost = EventPost::with(['user', 'eventComments.user'])
            ->findOrFail($id);

        $comments = $eventPost->eventComments()->where('approved', true)->get();
        $commentCount = $comments->count();

        if ($post->slug !== $slug) {
            return redirect()->route('home.event.postDetails', ['id' => $id, 'slug' => $post->slug]);
        }
        return view('home.event_post_details', compact('post', 'categories', 'latestevent_posts', 'posts', 'comments', 'commentCount'));
    }

    //book view event post details
    public function book_event_post_details($id)
    {
        $post = EventPost::with('user')->find($id);
        return view('home.event_book', compact('post'));
    }


    // view blog posts list
    public function view_post_list()
    {
        $posts = Post::where('status', 1)->withCount(['likes' => function ($query) {
            $query->where('liked', 1);
        }])->orderBy('created_at', 'desc')->get();
        $categories = Category::orderBy('created_at', 'desc')->paginate(6);
        $pupularPosts = Post::withCount([
            'likes' => function ($query) {
                $query->where('liked', 1);
            }
        ])
            ->where('status', 1)
            ->orderBy('likes_count', 'desc')
            ->paginate(3);
        return view('home.post_list', compact('posts', 'categories', 'pupularPosts'));
    }
    //view blogPost details
    public function blog_post_details($id, $slug)
    {
        $pupularPosts = Post::withCount([
            'likes' => function ($query) {
                $query->where('liked', 1);
            }
        ])
            ->where('status', 1)
            ->orderBy('likes_count', 'desc')
            ->paginate(3);
        $posts = Post::where('status', 1)->orderBy('created_at', 'desc')->paginate(4);

        $post = Post::with(['PostImage', 'PostVideo', 'user', 'likes'])->findOrFail($id);
        // Check if the user has already viewed this post in the current session
        $viewedPosts = session()->get('viewed_posts', []);

        if (!in_array($id, $viewedPosts)) {
            // Increment the view count
            $post->increment('views_count');

            // Add the post ID to the session
            session()->push('viewed_posts', $id);
        }
        $categories = Category::orderBy('created_at', 'desc')->paginate(4);

        $blog = Post::with(['user', 'comments.user'])
            ->findOrFail($id);

        $comments = $blog->comments()->where('approved', true)->get();


        $commentCount = $comments->count();

        if ($post->slug !== $slug) {
            return redirect()->route('blogPost.details', ['id' => $id, 'slug' => $post->slug]);
        }

        return view('home.blog_post_details', compact('post', 'posts', 'categories', 'pupularPosts', 'commentCount', 'comments'));
    }
    // i frame book
    public function book_post_details($id)
    {
        $post = Post::with('user')->find($id);
        return view('home.book', compact('post'));
    }

    // // home post deails view
    // public function post_details($id)
    // {
    //     $post = Post::find($id)->with('user')->first();
    //     return view('home.post_details',compact('post'));
    // }
    // live events
    public function view_home_lifestyle_blog()
    {
        $live = LiveEvent::orderBy('created_at', 'desc')->paginate(6);
        return view('home.home-lifestyle-blog', compact('live'));
    }
    public function view_privacy_policy()
    {
        return view('home.privacy_policy');
    }

    public function view_post_format_video()
    {
        return view('home.post-format-video');
    }

    public function view_post_format_standard()
    {
        return view('home.post-format-standard');
    }

    public function view_post_format_text()
    {
        return view('home.post-format-text');
    }

    public function view_post_format_gallery()
    {
        return view('home.post-format-gallery');
    }
    public function view_post_blog()
    {
        return view('home.post-blog');
    }



    public function view_post_layout1()
    {
        return view('home.post_layout1');
    }
    public function view_maintenance()
    {
        return view('home.maintenance');
    }
    public function view_404()
    {
        return view('home.404');
    }


    public function view_competitions()
    {
        return view('home.competitions');
    }
}
