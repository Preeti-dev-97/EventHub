<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'banner', 'address', 'city', 'state', 'country', 'date', 'start', 'end', 'price', 'capacity', 'status', 'contact_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
