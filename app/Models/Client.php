<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $primaryKey = 'id_Cl';
    protected $keyType='string';

    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = ['id_Cl','nomcomplet','email','Phone','ville','adress','password','token'];
    public function categorie() {
        return $this->belongsTo(Ville::class, 'id_V');
    }
}
