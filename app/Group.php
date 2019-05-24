<?php

namespace App;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use viewable;
    protected $table = "groups";
    protected $fillable =['group_name','group_link',
    'group_country', 'group_provider'];
}
