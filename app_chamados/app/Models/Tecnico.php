<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function chamados()
    {
        return $this->hasMany(Chamado::class);
    }

    public function getTechicians(string $search = null)
    {
        $techicians = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('name', 'like', "%{$search}%");
            }
        })
        ->paginate(5);

        return $techicians;
    }
}