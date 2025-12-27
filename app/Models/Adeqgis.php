<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property mixed $geom
 * @property string $detail
 * @property string $layer
 */
class Adeqgis extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id', 'geom', 'detail', 'layer'];
}
