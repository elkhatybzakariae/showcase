<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $table = 'villes';
    protected $primaryKey = 'id_V';
    protected $keyType='string';

    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = ['id_V','villename'];
    
    public function client()
    {
        return $this->hasMany(Client::class,'id_V');
    }
}
