<?php

namespace App;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model implements ViewableContract
{
    //
 use Viewable;
    protected $table = "tutorials";
    protected $fillable =['tutorial_name','tutorial_path',
    'tutorial_filename', 'tutorial_size', 'tutorial_mimetype'];
}
