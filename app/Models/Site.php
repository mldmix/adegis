<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $label
 * @property float $x
 * @property float $y
 */
class Site extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'site';

    /**
     * @var array
     */
    protected $fillable = ['id', 'label', 'x', 'y'];
}
