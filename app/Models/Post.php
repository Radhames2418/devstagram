<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];


    /**
     * Relacion de uno a uno
     */
    public function user()
    {
        return $this->belongsTo(User::class)->select(['name' , 'username']);
    }

    /**
     * Relacion de uno a muchos
     */
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
