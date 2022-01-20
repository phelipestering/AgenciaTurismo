<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Null_;
use App\Models\Brand;

class Plane extends Model
{
    use HasFactory;

    protected $fillable = ['qty_passengers','class', 'brand_id'];

    public function classes($className = null)
    {
        $classes = [
            // passando ARRAY ASSOCIATIVO PARA LISTAGEM DE CLASSES
            '' => 'Escolha uma opcao de classe',
            'economic' => 'Economica',
            'luxury' => 'Luxo',
        ];

        if(!$className)

            return $classes;

        return $classes [$className];

    }

    public function brandRelation()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
