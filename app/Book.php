<?php

namespace App;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

use Illuminate\Database\Eloquent\Model;

class Book extends Model  implements ViewableContract
{
    //
 use Viewable;


public function user(){
 	return $this->belongsTo('App\User');
 }
}
 
