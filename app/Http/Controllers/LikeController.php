<?php

namespace App\Http\Controllers;

use App\Models\EventLike;
use App\Models\EventPost;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
   // Toggle like/unlike action
   public function toggleLike(Request $request, $postId)
{
    $post = Post::findOrFail($postId);

    // Get the user's IP address
    $userIp = $request->ip();
    $user = Auth::user();

    // Check if the user is authenticated
    if ($user) {
        // Look for a like by the authenticated user
        $like = Like::where('user_id', $user->id)
                    ->where('post_id', $post->id)
                    ->first();

        if ($like) {
            // Toggle the like
            $like->liked = !$like->liked;
            $like->save();
        } else {
            // Create a new like for the authenticated user
            Like::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'liked' => true,
                'ip_address' => $userIp, // Save the IP address for tracking
            ]);
        }
    } else {
        // Handle non-authenticated users using their IP address
        $ipLike = Like::where('post_id', $post->id)
                      ->where('ip_address', $userIp)
                      ->first();

        if ($ipLike) {
            // Toggle the like for the IP address
            $ipLike->liked = !$ipLike->liked;
            $ipLike->save();
        } else {
            // Create a new like for the IP address
            Like::create([
                'user_id' => null, // No user ID for non-authenticated users
                'post_id' => $post->id,
                'liked' => true,
                'ip_address' => $userIp,
            ]);
        }
    }

    // Get the updated like count
    $likeCount = $post->likes->where('liked', true)->count();

    // Return a JSON response with success status, liked status, and updated like count
    return response()->json([
        'success' => true,
        'liked' => $user
            ? $post->likes->where('user_id', $user->id)->where('liked', true)->count() > 0
            : $post->likes->where('ip_address', $userIp)->where('liked', true)->count() > 0,
        'like_count' => $likeCount
    ]);
}



public function toggleLikeEvents(Request $request, $postId)
{
    $user = Auth::user();
    $post = EventPost::findOrFail($postId);

    $like = EventLike::where('user_id', $user->id)
                ->where('event_post_id', $post->id)
                ->first();

    if ($like) {
        $like->liked = !$like->liked;
        $like->save();
    } else {
        EventLike::create([
            'user_id' => $user->id,
            'event_post_id' => $post->id,
            'liked' => true,
        ]);
    }

    // Recalculate the total likes for the post
    $likeCount = $post->Eventlikes->where('liked', true)->count();

    return response()->json([
        'success' => true,
        'isLiked' => $like ? $like->liked : true,
        'likeCount' => $likeCount,
    ]);
}

}
