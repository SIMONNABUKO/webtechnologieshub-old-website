<?php

namespace App;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

use Illuminate\Database\Eloquent\Model;

class Service extends Model implements ViewableContract
{
    //
 use Viewable;

    protected $table = "services";
    protected $fillable =['service_title','service_description'];
}
