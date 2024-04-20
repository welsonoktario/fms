<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SparepartCategory extends Model
{
    protected $guarded = ['id'];

    public function brands()
    {
        return $this->belongsToMany(SparepartBrand::class, 'sparepart_category_brands');
    }

    public function suppliers()
    {
        return $this->belongsToMany(SparepartSupplier::class, 'sparepart_supplier_categories');
    }

    public function spareparts()
    {
        return $this->hasMany(Sparepart::class);
    }
}
