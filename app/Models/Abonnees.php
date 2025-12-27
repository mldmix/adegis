<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $numab
 * @property string $bloc
 * @property string $raisoc
 * @property string $etree
 * @property string $etage
 * @property string $aile
 * @property integer $ndom
 * @property integer $id
 * @property Vanne $vanne
 */
class Abonnees extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'abonnees';
   
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
    protected $fillable = ['numab','bloc', 'raisoc', 'etree', 'etage', 'aile', 'ndom'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vanne()
    {
        return $this->belongsTo('App\Models\Vanne', 'bloc');
    }
}
