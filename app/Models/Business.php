<?php namespace Toilets\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Business extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'businesses';

    protected $sluggable = [
        'build_from' => 'name',
    ];

    public function hasGeo()
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