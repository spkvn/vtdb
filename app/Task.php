<?php

namespace ToDo;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function timeEntries()
    {
        return $this->hasMany(TimeEntry::class);
    }

    public function runningEntries()
    {
        return $this->timeEntries()->whereNull('stopped');
    }
}
