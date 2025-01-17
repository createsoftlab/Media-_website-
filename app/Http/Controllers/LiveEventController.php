<?php

namespace App\Http\Controllers;

use App\Models\LiveEvent;
use Illuminate\Http\Request;

class LiveEventController extends Controller
{
    public function view_live_Events()
    {
        $events = LiveEvent::orderby('id','desc')->get();
        return view('admin.live_events',compact('events'));
    }

    public function add_live_Events()
    {
        return view('admin.add_new_live_event');
    }

    public function store(Request $request)
    {
        $request->validate([
            'liveevent_title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event = new LiveEvent();
        $event->title = $request->liveevent_title;
        $event->description = $request->description;
        $event->link = $request->link;

        if ($request->hasFile('image')) {
            $imageName = time() . '_1.' . $request->image->extension();
            $request->image->move(public_path('live_event_image'), $imageName);
            $event->image = $imageName;
        }

        $event->save();

        return redirect()->route('view.liveevents')->with('success', 'Event created successfully');
    }



    public function edit_live_Events($id)
    {
        // Retrieve the event by its ID
        $event = LiveEvent::findOrFail($id);

        // Pass the event data to the view
        return view('admin.update_live event', compact('event'));
    }

    public function update_live_event(Request $request, $id)
{
    // Validate the incoming data
    $request->validate([
        'liveevent_title' => 'required|string|max:255',
        'description' => 'required|string',
        'link' => 'required|url',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional, if an image is uploaded
    ]);

    // Find the live event by ID
    $event = LiveEvent::findOrFail($id);

    // Update the event fields
    $event->title = $request->input('liveevent_title');
    $event->description = $request->input('description');
    $event->link = $request->input('link');

    // Handle image upload if an image is provided
    if ($request->hasFile('image')) {
        $imageName = time() . '_1.' . $request->image->extension();
        $request->image->move(public_path('live_event_image'), $imageName);
        $event->image = $imageName;
    }
    // Save the updated event
    $event->save();

    // Redirect or return with a success message
    return redirect()->route('view.liveevents')->with('success', 'Event updated successfully');
}

public function destroy($id)
{
    // Find the event by ID and delete it
    $event = LiveEvent::findOrFail($id);

    // If there's an image, delete it from the public directory
    if ($event->image) {
        $imagePath = public_path('live_event_image/' . $event->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);  // Delete the file from the public storage
        }
    }

    // Delete the event from the database
    $event->delete();

    // Redirect back with a success message
    return redirect()->route('view.liveevents')->with('success', 'Event deleted successfully.');
}



}
