<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SdgRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SdgCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SdgCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Sdg');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/sdg');
        $this->crud->setEntityNameStrings('sdg', 'sdgs');
    }

    protected function setupListOperation()
    {

        $this->crud->setColumns([
            [
                'name' => 'id',
                'type' => 'number',
                'label' => 'SDG ID / Number',
            ],

            [
                'name' => 'title',
                'type' => 'text',
                'label' => 'Title',
            ],
            [
                'name' => 'logo',
                'type' => 'image',
                'label' => 'Logo',
            ],
        ]);

    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(SdgRequest::class);

        $this->crud->addFields([
            [
                'name' => 'id',
                'type' => 'number',
                'label' => 'SDG ID / Number',
            ],
            [
                'name' => 'title',
                'type' => 'text',
                'label' => 'Title',
            ],
            [
                'name' => 'logo',
                'type' => 'image',
                'label' => 'Logo',
                'upload' => true,
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
