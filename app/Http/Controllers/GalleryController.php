<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{

    public function view_galary()
    {
        $images = Gallery::where('user_id', Auth::id())->get();
        return view('admin.gallery',compact('images'));
    }

    public function createGallery()
    {
        return view('admin.add_gallery');
    }


    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'title' => 'required|string|max:255',
            'small_des' => 'required|string|max:255',
            'all_text' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload and store it in the public folder
        $gallery = new Gallery();
        $gallery->user_id = Auth::id();
        $gallery->title = $request->input('title');
        $gallery->short_description = $request->input('small_des');
        $gallery->all_text = $request->input('all_text');

        if ($request->hasFile('image')) {
            $imageName = time() . '_1.' . $request->image->extension();
            $request->image->move(public_path('gallery_image'), $imageName);
            $gallery->image = $imageName;
        }

        $gallery->save();

        // Redirect or return response with success message
        return redirect('admin/view_galary')->with('success', 'Image added successfully!');
    }

    public function delete($id)
    {
        $gallery = Gallery::find($id);

        if (file_exists(public_path('gallery_image/' . $gallery->image))) {
            unlink(public_path('gallery_image/' . $gallery->image));
        }

        $gallery->delete();

        return back()->with('success', 'Image deleted successfully!');
    }

}
