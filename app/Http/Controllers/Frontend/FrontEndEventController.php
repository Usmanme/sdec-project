<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class FrontEndEventController extends Controller
{
    public function singleEvent ( $id )
    {
        $data['event'] = Event::select(['id','title','description','event_logo','registration_fee','start_date_time','end_date_time','location','tags'])->find($id);
        $data['inclusions'] = explode(',',$data['event']->tags);
        return view('front-end.events.single-event',compact('data'));
    }

}
