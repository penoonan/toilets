<?php namespace Toilets\Models;


use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected static $unguarded = true;

    public function business()
    {
        return $this->belongsTo(Business::class);
    }



}