<?php

namespace App\Observers;

use App\Models\course;

class CourseSlugObserver
{
    /**
     * Handle the course "created" event.
     *
     * @param  \App\Models\course  $course
     * @return void
     */
    public function created(course $course)
    {
        $course->slug = str_replace(' ','-',$course->title).'-'.$course->id;
        $course->save();
    }

    /**
     * Handle the course "updated" event.
     *
     * @param  \App\Models\course  $course
     * @return void
     */
    public function updated(course $course)
    {
        //
    }

    /**
     * Handle the course "deleted" event.
     *
     * @param  \App\Models\course  $course
     * @return void
     */
    public function deleted(course $course)
    {
        //
    }

    /**
     * Handle the course "restored" event.
     *
     * @param  \App\Models\course  $course
     * @return void
     */
    public function restored(course $course)
    {
        //
    }

    /**
     * Handle the course "force deleted" event.
     *
     * @param  \App\Models\course  $course
     * @return void
     */
    public function forceDeleted(course $course)
    {
        //
    }
}
