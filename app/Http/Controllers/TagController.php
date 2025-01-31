<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // view data in table
    public function view_tags()
    {
        $tags = Tag::all();
        return view('admin.tag',compact('tags'));
    }

    // store
    public function storeTags(Request $request)
    {
        $request-> validate([
            'tag'=> 'string'
        ]);

        $tag = ucwords(strtolower($request->tag));

        $existingTag = Tag::where('tag', $tag)->first();

        if ($existingTag) {
            return redirect()->back()->with('error', 'This Tag already exists.');
        }
        $tagSave = new Tag();
        $tagSave->tag = $tag;
        $tagSave->save();

        return redirect()->back()->with('success', 'Tag added successfully!');
    }

    // update
    public function updateTags(Request $request,$id)
    {
        $request->validate([
            'tag'=> 'string'
        ]);

        $tag = ucwords(strtolower($request->tag));

        $tagUpdate = Tag::findOrFail($id);

        $existingTag = Tag::where('tag', $tag)->where('id', '!=', $id)->first();
        if ($existingTag) {
            return redirect()->back()->with('error', 'This Tag already exists.');
        }

        $tagUpdate->tag = $tag;
        $tagUpdate->save();

        return redirect()->back()->with('success', 'Tag updated successfully!');
    }

    // delete
    public function delete($id)
    {
        $tag = Tag::find($id);

        $tag->delete();

        return back()->with('success', 'Tag deleted successfully!');
    }


}
