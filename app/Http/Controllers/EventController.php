<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    // view ongoing events  in table
    public function viewEvents()
    {
        $events = Event::where('status','1')
        ->orderby('id','desc')->get();
        return view('admin.events', compact('events'));
    }
        // view offline events in table
    public function viewInactiveEvents()
    {
        $events = Event::where('status','0')->
        orderby('id','desc')->get();
        return view('admin.offline_events', compact('events'));
    }

    // Method to show the form (create or edit depending on the event ID)
    public function createOrEdit($id = null)
    {
        $event = $id ? Event::find($id) : null;

        return view('admin.add_newEvent', compact('event'));
    }

    // Method to store and update
    public function storeOrUpdate(Request $request, $id = null)
    {

        $request->validate([
            'event_title' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        $event = $id ? Event::find($id) : new Event();

        $event->event_title = $request->event_title;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;

        if ($request->hasFile('image')) {
            $imageName = time() . '_1.' . $request->image->extension();
            $request->image->move(public_path('event_image'), $imageName);
            $event->image = $imageName;
        }

        $event->save();

        return redirect()->route('view.events')->with('success', $id ? 'Event updated successfully!' : 'Event created successfully!');
    }

    // Delete
    public function delete($id)
    {
        $event = Event::find($id);

        $event->delete();

        return back()->with('success', 'Event deleted successfully!');
    }

        // Events activate
    public function activate($id,Request $request)
    {
        $event = Event::find($id);

        if (!$event) {
            return back()->with('error', 'Event not found!');
        }

        $status = $event->status;

        if ($status == 1) {
            $event->status = 0; // Deactivate
            $message = 'Event deactivated successfully!';
        } elseif ($status == 0) {
            $event->status = 1; // Activate
            $message = 'Event activated successfully!';
        } elseif ($status == 2) {
            $event->status = 1; // Activate from draft
            $message = 'Event activated successfully from draft!';
        }

        $event->save();

        return back()->with('success', $message);
    }

}
