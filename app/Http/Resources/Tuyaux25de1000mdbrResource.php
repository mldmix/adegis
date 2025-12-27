<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use MatanYadaev\EloquentSpatial\Objects\Polygon;
use MatanYadaev\EloquentSpatial\Objects\LineString;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Objects\MultiPoint;
use MatanYadaev\EloquentSpatial\Objects\MultiLineString;
use MatanYadaev\EloquentSpatial\Objects\MultiPolygon;
use MatanYadaev\EloquentSpatial\Enums\Srid;
use Illuminate\Support\Str;

class Tuyaux25de1000mdbrResource extends JsonResource
{
    /**
     * @var null
     */
    protected $message = null;

    /**
     * @param $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        $obj=Str::substr($this->geom, 3, 1);
        switch ($obj) {
            case 1:
              //code block
              $value=Point::fromWkb($this->geom);
              break;
            case 2:
              //code block;
              $value=LineString::fromWkb($this->geom);
              break;
            case 3:
              //code block
              $value=Polygon::fromWkb($this->geom);
              break;
            case 4:
              //code block
              $value=MultiPoint::fromWkb($this->geom);
              break;
            case 5:
              //code block
              $value=MultiLineString::fromWkb($this->geom);
              break;
            case 6:
              //code block
              $value=MultiPolygon::fromWkb($this->geom);
              break;
            default:
              //code block
          }
        return [
            'id' => $this->id, 
 			'geom' => $this->geom, 
 			'detail' => $this->detail,
            'geomjson' => $value
 			
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param Request $request
     * @return array
     */
    public function with($request)
    {
        return [
            'success' => true,
            'message' => $this->message,
            'meta' => null,
            'errors' => null
        ];
    }
}
