<?php

namespace App\Repository\Event;

use App\Models\Event;
use App\Traits\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EventService implements EventInterface
{
    use Image;
    public function create($id=null)
    {
        $data['title'] = "Add New Event";
        $data['breadcrumb'] = 'event.createOrEdit';
        $data['page_title'] = 'Add New Event';
        $data['submit_button'] = 'Save Event';
        if(isset($id) && !is_null($id))
        {
            $id = (int)decryptParams($id);
            $data['title'] = "Update Event";
            $data['event'] = Event::find($id);
            $data['breadcrumb'] = 'event.storeOrUpdate';
            $data['page_title'] = 'Update Event';
            $data['submit_button'] = 'Update Event';
        }
        return $data;
    }

    public function storeOrUpdate($request)
    {
        $event_exists = array_key_exists('id' ,$request);
        $id = (int)$request['id'];

        DB::transaction(function() use($request, $event_exists ,$id){
            if(isset($event_exists) && $id != 0)
            {
                $event = Event::find($id);
                if(File::exists('Events/'.$event->event_logo))
                    File::delete('Events/'.$event->event_logo);
            }
            else
                $event = (new Event());
            $event->title = $request['title'] ?? null;
            $event->description = $request['description'] ?? null;
            $event->location = $request['location'] ?? null;
            $event->organizer = $request['organizer'] ?? null;
            $event->contact_info = $request['contact_info'] ?? null;
            $event->event_type = $request['event_type'] ?? null;
            $event->attendee_limit = $request['attendee_limit'] ?? null;
            $event->registration_deadline = $request['registration_deadline'] ?? Carbon::now();
            $event->registration_fee = $request['registration_fee'] ?? 0;
            $event->status = $request['status'] ?? 'Active';
            $event->start_date_time = $request['start_date_time'] ?? Carbon::now();
            $event->end_date_time = $request['end_date_time'] ?? Carbon::now();
            $event->tags = $request['tags'] ?? null;
            $event->user_id = auth()?->user()?->id;
            $event->event_logo = $this->storeImage(Event::PATH, $request['event_logo']);
            $event->save();

        });
        return true;
    }

    public function deleteEvent($ids)
    {
        try
        {
            $events = Event::whereIn('id', $ids)->get();
            foreach( $events as $event )
            {
                if(File::exists('Events/'.$event->event_logo))
                    File::delete('Events/'.$event->event_logo);
                $event->delete();
            }
        }
        catch (\Exception $ex)
        {
            return $ex->getMessage();
        }
    }
}
