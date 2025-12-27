<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property mixed $geom
 */
class Tuyaux90 extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tuyaux90';

    /**
     * @var array
     */
    protected $fillable = ['geom'];
}
