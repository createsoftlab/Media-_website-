<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\EventPost;
use App\Models\EventComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    // Admin Dashboard
    public function index()
    {
        $totalUsers = User::where('role', '!=', 'admin')->count();
        $totalEventPosts = EventPost::where('status',1)->count();
        $totalBlogPosts = Post::where('status',1)->count();
        $totalEvents = Event::where('status',1)->count();
        $posts = Post::where('status',0)->orderBy('created_at', 'desc')->paginate(4);
        $eventPosts = EventPost::where('status',0)->orderBy('created_at', 'desc')->paginate(4);
        return view('admin.index',compact('totalUsers','totalEventPosts','totalBlogPosts','totalEvents','posts','eventPosts'));
    }

    public function view_comment()
    {
        // Get the logged-in user's ID
        $userId = Auth::id();

        // Get the comments related to posts created by the logged-in user
        $comments = Comment::with(['user', 'post'])
            ->whereHas('post', function($query) use ($userId) {
                $query->where('user_id', $userId); // Filter posts created by the logged-in user
            })
            ->orderBy('updated_at', 'desc') // Sort by latest updates
            ->get();

        return view('admin.comments', compact('comments'));
    }

    public function view_Event_comment()
    {
        // Get the logged-in user's ID
        $userId = Auth::id();

        // Get the comments related to event posts created by the logged-in user
        $comments = EventComment::with(['user', 'EventPost'])
            ->whereHas('EventPost', function($query) use ($userId) {
                $query->where('user_id', $userId); // Filter event posts created by the logged-in user
            })
            ->orderBy('updated_at', 'desc') // Sort by latest updates
            ->get();

        return view('admin.eventComment', compact('comments'));
    }

    public function view_contact()
    {
        $post = Post::latest()->first();
        return view('admin.contact',compact('post'));
    }
    public function view_galary()
    {
        return view('admin.galery');
    }

    public function approveComment($id)
{
    $comment = Comment::findOrFail($id);
    $comment->approved = true; // Set the comment as approved
    $comment->save();

    return redirect()->back()->with('success', 'Comment approved successfully');
}

public function approveEventComment($id)
{
    $comment = EventComment::findOrFail($id);
    $comment->approved = true; // Set the comment as approved
    $comment->save();

    return redirect()->back()->with('success', 'Comment approved successfully');
}

public function deleteEventComment($id)
{
    // Find the comment or fail
    $comment = EventComment::findOrFail($id);

    // Delete the comment
    $comment->delete();

    // Redirect with success message
    return redirect()->back()->with('success', 'Comment deleted successfully');
}



public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully');
    }




}
