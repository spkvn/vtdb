<?php

namespace ToDo;

use Illuminate\Database\Eloquent\Model;

class TimeEntry extends Model
{
    protected $guarded = ['id'];

    // Relationships
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
