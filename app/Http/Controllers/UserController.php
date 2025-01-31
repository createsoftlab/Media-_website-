<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventPost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // Admin User Management
    public function viewUsers()
    {
        $users = User::where('role','user')->orderby('id','desc')->get();

        return view('admin.users',compact('users'));

    }
    // Admin Delete Users
    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();

        return back()->with('success', 'User deleted successfully!');
    }

    public function index()
    {

        $pendingEventPosts = EventPost::where('status',0)->where('user_id', auth()->id())->count();
        $totalEventPosts = EventPost::whereIn('status',[1,0])->where('user_id', auth()->id())->count();
        $totalBlogPosts = Post::whereIn('status',[1,0])->where('user_id', auth()->id())->count();
        $pendingBlogPost = Post::where('status',0)->where('user_id', auth()->id())->count();
        $posts = Post::where('user_id', auth()->id())->orderBy('created_at', 'desc')->paginate(4);
        $eventPosts = EventPost::where('user_id', auth()->id())->orderBy('created_at', 'desc')->paginate(4);
        return view('user.index',compact('pendingBlogPost','totalEventPosts','totalBlogPosts','pendingEventPosts','posts','eventPosts'));
    }


    public function view_events()
    {
        return view('user.events');
    }

    public function view_add_events()
    {
        return view('user.add_newEvent');
    }

    public function view_profile()
    {
        return view('user.profile');
    }


}
