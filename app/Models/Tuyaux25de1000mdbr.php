<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property mixed $geom
 * @property string $detail
 */
class Tuyaux25de1000mdbr extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tuyaux25de1000mdbr';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['geom', 'detail'];
}
