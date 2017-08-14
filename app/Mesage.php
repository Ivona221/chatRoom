<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesage extends Model
{

    protected $fillable = ['message','receiver_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
