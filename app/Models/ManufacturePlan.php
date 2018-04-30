<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManufacturePlan extends Model
{
    protected $fillable = ['seed_year','seed_type','seed_plant','seed_cost','date-produce-start',
                            'date-produce-stop','seed_quantity','date-distribute-start',
                            'date-distribute-stop','distribute_quantity','distribute_area',
                            'materials','agency_code','user_create','user_update'];
}
