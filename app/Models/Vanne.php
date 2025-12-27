<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property float $y
 * @property float $x
 * @property float $pression
 * @property float $ph
 * @property float $debit
 * @property string $zone
 * @property string $site
 * @property Abonne[] $abonnes
 */
class Vanne extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'vanne';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['id','y', 'x', 'pression', 'ph', 'debit', 'zone', 'site'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function abonnes()
    {
        return $this->hasMany('App\Models\Abonne', 'bloc');
    }
}
