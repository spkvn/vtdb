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
}
