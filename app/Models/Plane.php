<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    use HasFactory;

    public function classes()
    {
        return [
            // passando ARRAY ASSOCIATIVO PARA LISTAGEM DE CLASSES
            '' => 'Escolha uma opcao de classe',
            'economic' => 'Economica',
            'luxury' => 'Luxo',
        ];
    }
}
