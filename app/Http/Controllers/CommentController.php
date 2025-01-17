<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Comment;
use App\Models\EventReply;
use App\Models\EventComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
{
    // Check if the user is authenticated
    if (!Auth::check()) {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|string|max:1000',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
    } else {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|string|max:1000',
        ]);
    }

    // Create the comment
    $comment = Comment::create([
        'post_id' => $request->post_id,
        'user_id' => Auth::id(), // Logged-in user's ID or null for guest
        'name' => Auth::check() ? Auth::user()->name : $request->name,
        'email' => Auth::check() ? Auth::user()->email : $request->email,
        'comment' => $request->comment,
    ]);

    return redirect()->back()
        ->with('success', 'Comment awaiting approval.');
}


    public function storeReply(Request $request, $commentId)
    {
        $request->validate([
            'reply' => 'required|string|max:1000',
        ]);

        $comment = Comment::findOrFail($commentId);

        $reply = Reply::create([
            'comment_id' => $comment->id,
            'user_id' => Auth::id(),
            'reply' => $request->reply,
        ]);

        return redirect()->back()

        ->with('success', 'Your Comment Reply was successful!');
    }

    public function eventCommentStore(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'post_id' => 'required|exists:event_posts,id', // Ensure post exists
            'comment' => 'required|string|max:1000', // Ensure comment is a string and max length is set
        ]);

        // Create a new event comment
        $eventComment = new EventComment(); // Instantiate the EventComment model
        $eventComment->event_post_id = $request->post_id; // Assuming the foreign key is event_post_id
        $eventComment->user_id = Auth::id(); // Store the authenticated user's ID
        $eventComment->comment = $request->comment;
        $eventComment->save(); // Save the comment to the database

        // Optionally, you could flash a success message to the session
        return redirect()->back()

        ->with('success', 'comment awaiting approval');
    }

    public function storeEventReply(Request $request, $commentId)
    {
        $request->validate([
            'reply' => 'required|string|max:1000', // Validate reply input
        ]);

        // Find the original comment
        $eventComment = EventComment::findOrFail($commentId);

        // Create the reply
        $eventReply = new EventReply();
        $eventReply->event_comment_id = $eventComment->id; // Reference to the comment being replied to
        $eventReply->user_id = Auth::id(); // Authenticated user ID
        $eventReply->reply = $request->reply;
        $eventReply->save(); // Save reply to the database

        return redirect()->back()

        ->with('success', 'Your Comment Reply was successful!');
    }



}
