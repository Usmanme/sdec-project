<?php

namespace App\Http\Requests;

use App\Models\Event;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return
        [
            'id'=>[
                'nullable',
            ],
            'title'=>[
                'required',
            ],
            'description'=>[
                'required',
            ],
            'location'=>[
                'required',
            ],
            'organizer'=>[
                'required',
            ],
            'contact_info'=>[
                'required',
            ],
            'event_type'=>[
                'required',
                Rule::in(Event::TYPE)
            ],
            'attendee_limit'=>[
                'required',
                'integer',
                'min:1'
            ],
            'registration_deadline'=>[
                'required',
                'date',
            ],
            'registration_fee'=>[
                'required',
                'integer',
                'min:1'
            ],
            'status'=>[
                'required',
                Rule::in(Event::STATUS)
            ],
            'start_date_time'=>[
                'required',
                'date'
            ],
            'end_date_time'=>[
                'required',
                'date',
                'after:start_date_time'
            ],
            'tags'=>[
                'required',
            ],
            'event_logo'=>[
                'required',
                'image',
                'mimes:png,jpg,jpeg'
            ],

        ];
    }
}
