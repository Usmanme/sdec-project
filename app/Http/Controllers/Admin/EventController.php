<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Repository\Event\EventInterface;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct( protected EventInterface $event ){}

    public function index ()
    {
        $data['events'] = Event::with('user:id,name')->paginate(10);
        return view('app.admin-panel.event.index',compact('data'));
    }
    public function createOrEdit( $id=null )
    {
        $data = $this->event->create($id);
        return view("app.admin-panel.event.create",compact('data'));
    }

    public function storeOrUpdate ( StoreEventRequest $request )
    {
        $validated_data = $request->all();
        $this->event->storeOrUpdate( $validated_data );
        return redirect()->route('event_list')->withSuccess('Event Added/Updated Successfully.');
    }

    public function deleteEvent( Request $request )
    {
        $ids = $request->chkTableRow;
        $this->event->deleteEvent($ids);
        return redirect()->back()->withSucces("Event Deleted Successfully.");
    }
}
