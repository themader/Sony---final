<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Producto extends Model
{
    protected $table = 'producto';

    protected $primaryKey = 'id';

    protected $fillable = ['nombre','empresa', 'price', 'description', 'date_lanzamiento', 'cover'];

    public function categorias()

    {
    
    return $this->belongsToMany(
        Categoria::class,
        'producto_have_categorias',
        'producto_id',    
        'categoria_fk'    
    );
}

}
