<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polygons extends Model
{
    use HasFactory;

    protected $table = 'table_polygons';

    protected $guarded = ['id'];

    public function polygons()
    {
        return $this->select(DB::raw('id, name, description, image, ST_AsGeoJSON(geom) as geom'))->get();
    }

    public function polygon($id)
    {
        return $this->select(DB::raw('id, name, description, st_asgeojson(geom) as geom, created_at, updated_at, image'))->where('id',$id)->get();
    }
}
