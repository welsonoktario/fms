<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SparepartBrand extends Model
{
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(SparepartCategory::class, 'sparepart_category_brands');
    }

    public function suppliers()
    {
        return $this->belongsToMany(SparepartSupplier::class, 'sparepart_supplier_brands');
    }

    public function spareparts()
    {
        return $this->hasMany(Sparepart::class);
    }
}
