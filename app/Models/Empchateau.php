<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $y
 * @property float $x
 * @property string $Nom
 * @property float $z
 * @property string $type
 */
class Empchateau extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'empchateau';

      /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';
    
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['x','y','Nom', 'z', 'type','id'];
}
