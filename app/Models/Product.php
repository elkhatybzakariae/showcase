<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id_Pr';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = ['id_Pr','pic','proName','price','oldPrice','description','stockQuantity'
    ,'valider','id_Cat'];

    public function categorie() {
        return $this->belongsTo(Categorie::class, 'id_Cat');
    }
}
