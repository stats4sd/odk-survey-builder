<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ModuleRequest;
use App\Models\Theme;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ModuleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ModuleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Module');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/module');
        $this->crud->setEntityNameStrings('module', 'modules');
    }

    protected function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'id',
                'label' => 'Unique ID',
                'type' => 'text',
            ],
            [
                'name' => 'title',
                'label' => 'Title',
                'type' => 'text',
            ],
            // [
            //     'name' => 'theme_id',
            //     'label' => 'Theme',
            //     'type' => 'select',
            //     'entity' => 'theme',
            //     'attribute' => 'title',
            //     'model' => Theme::class
            // ],
            [
                'name' => 'description',
                'label' => 'Description',
                'limit' => "50",
                'type' => 'text',
            ],
            [
                'name' => 'minutes',
                'label' => 'Est. Length of Interview (minutes)',
                'type' => 'number',
            ],
            [
                'name' => 'core',
                'label' => 'Is Core Module?',
                'type' => 'boolean',
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
        $this->crud->setValidation(ModuleRequest::class);

        $this->crud->addFields([
            [
                'name' => 'id',
                'label' => 'Unique ID',
                'type' => 'text',
            ],
            [
                'name' => 'title',
                'label' => 'Title',
                'type' => 'text',
            ],
            [
                'name' => 'theme_id',
                'label' => 'Theme',
                'type' => 'select',
                'entity' => 'theme',
                'attribute' => 'title',
                'model' => Theme::class
            ],
            [
                'name' => 'description',
                'label' => 'Description',
                'type' => 'textarea',
            ],
            [
                'name' => 'minutes',
                'label' => 'Est. Length of Interview (minutes)',
                'type' => 'number',
            ],
            [
                'name' => 'core',
                'label' => 'Is Core Module?',
                'type' => 'checkbox',
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

        $this->updateField('id', [
            'name' => 'id',
            'label' => 'Unique ID',
            'type' => 'text',
            'attributes' => [
                'readonly' => true,
            ],
        ]);
    }
}
