<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imc extends Model
{
    use HasFactory;

    protected $fillable = ['valeur', 'poids', 'taille', 'user_id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
