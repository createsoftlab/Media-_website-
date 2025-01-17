<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\EventComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserComment extends Controller
{
    public function blog_view_comment()
    {
        $userId = Auth::id();

    // Get the comments related to posts created by the logged-in user
        $comments = Comment::with(['user', 'post'])
        ->whereHas('post', function($query) use ($userId) {
            $query->where('user_id', $userId); // Filter posts created by the logged-in user
        })
        ->orderBy('updated_at', 'desc') // Sort by latest updates
        ->get();
        return view('user.blog_comments',compact('comments'));
    }
    public function event_view_comment()
    {
        $userId = Auth::id();

    // Get the comments related to event posts created by the logged-in user
    $comments = EventComment::with(['user', 'EventPost'])
        ->whereHas('EventPost', function($query) use ($userId) {
            $query->where('user_id', $userId); // Filter event posts created by the logged-in user
        })
        ->orderBy('updated_at', 'desc') // Sort by latest updates
        ->get();

        return view('user.event_comments',compact('comments'));
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
    // Find the comment by ID or fail
    $comment = Comment::findOrFail($id);

    // Delete the comment
    $comment->delete();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Comment deleted successfully');
}
}
