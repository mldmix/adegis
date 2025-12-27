<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $x
 * @property float $y
 * @property string $popup
 */
class Tablepointsintero extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tablepointsintero';

    /**
     * @var array
     */
    protected $fillable = ['popup'];
}
