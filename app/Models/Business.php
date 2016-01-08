<?php namespace Toilets\Models;


use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Business extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'businesses';
}