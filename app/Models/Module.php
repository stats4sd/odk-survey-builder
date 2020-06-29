<?php

namespace App\Models;

use App\Traits\HasImageUploads;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sdg;
use App\Models\Language;

class Module extends Model
{
    use CrudTrait, HasImageUploads;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'modules';
    public $incrementing = false;
    protected $guarded = [];

    protected $images = ['logo'];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function sdgs()
    {
        return $this->belongsToMany(Sdg::class, '_link_modules_sdgs');
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, '_link_modules_languages');
    }

    public function forms()
    {
        return $this->belongsToMany(Forms::class, '_link_form_module');
    }


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
