<?php

namespace App\Repository\Event;

interface EventInterface
{
    public function create($id=null);
    public function storeOrUpdate($request);
    public function deleteEvent($ids);
}
