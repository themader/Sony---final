<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Blog extends Model
{
    protected $table = 'blog';

    protected $primaryKey = 'id';

    protected $fillable = ['cover','titulo', 'texto'];

 

}
