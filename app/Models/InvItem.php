<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvItem extends Model
{
    use HasFactory;
    protected $table = 'inv_items';

    protected $fillable = [
        'bu_id',
        'item_code',
        'description',
        'base_uom',
        'category', 
        'sub_category',
        'def_selling_price',
        'enabled',
        'billable',
        'purchasable',
        'stockable',

    ];
}
