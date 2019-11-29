<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LanguageRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class LanguageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class LanguageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Language');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/language');
        $this->crud->setEntityNameStrings('language', 'languages');
    }

    protected function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'id',
                'label' => 'Language Code',
            ],
            [
                'name' => 'label',
                'label' => 'Language'
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(LanguageRequest::class);

        $this->crud->addFields([
            [
                'name' => 'id',
                'label' => 'Language Code',
                'type' => 'text',
            ],
            [
                'name' => 'label',
                'label' => 'Language',
                'type' => 'text',
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
