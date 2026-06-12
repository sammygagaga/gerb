<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\Attributes\Sluggable;

#[Fillable(['title', 'comment', 'allowed'])]
#[Table('products')]
#[Sluggable(from: 'title', to: 'slug')]
class Product extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
