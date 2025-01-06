<?php

namespace App\Models;
use App\Helpers\Helpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id_Cat';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = ['id_Cat','Catname'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($categorie) {
            if (empty($categorie->id_Cat)) {
                $categorie->id_Cat = Helpers::generateIdCat();
            }
        });
    }
}
