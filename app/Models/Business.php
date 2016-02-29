<?php namespace Toilets\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Business extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'businesses';

    protected static $unguarded = true;

    protected $sluggable = [
        'build_from' => 'name'
    ];

    CONST status_pending = 0;
    CONST status_verified = 1;
    CONST status_apathetic = 2;
    CONST status_committed = 3;
    CONST status_hostile = 4;
    CONST status_success = 5;
    CONST status_declined = 6;

    public static $flagging_validation_rules = [
        'name' => 'required',
        'email' => 'email',
    ];

    public static $industry_options = [
        0 => 'Restaurant / Bar / Cafe',
        1 => 'Grocery Store',
        2 => 'Retail',
        3 => 'Public Services'
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject');
    }

    public function scopeApproved(Builder $query)
    {
        return $query->where('status', '!=', 0);
    }

    public function getHasGeoAttribute()
    {
        return $this->latitude && $this->longitude;
    }

    public function getPhoneAttribute($value)
    {
        $value = preg_replace("/[^0-9,.]/", "", $value);
        return preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $value);
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = preg_replace("/[^0-9,.]/", "", $value);
    }
}