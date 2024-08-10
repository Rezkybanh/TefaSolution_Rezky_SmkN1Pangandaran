<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PermohonanRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PermohonanCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PermohonanCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        $this->crud->setModel('App\Models\Permohonan');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/permohonan');
        $this->crud->setEntityNameStrings('permohonan', 'permohonans');

        $this->crud->addColumn([
            'name' => 'no_registrasi',
            'label' => 'No Registrasi',
        ]);
        $this->crud->addColumn([
            'name' => 'tanggal_permohonan',
            'label' => 'Tanggal Permohonan',
            'type' => 'date',
        ]);
        $this->crud->addColumn([
            'name' => 'jenis_layanan',
            'label' => 'Jenis Layanan',
        ]);
        $this->crud->addColumn([
            'name' => 'proses_saat_ini',
            'label' => 'Proses Saat Ini',
        ]);
        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => ['diproses' => 'Diproses', 'tidak_lolos' => 'Tidak Lolos', 'lolos' => 'Lolos'],
            'wrapper' => function ($crud, $column, $entry, $related_key) {
                $color = $entry->status == 'diproses' ? 'blue' : ($entry->status == 'tidak_lolos' ? 'red' : 'green');
                return ['style' => 'color: ' . $color];
            }
        ]);

        $this->crud->addField([
            'name' => 'no_registrasi',
            'label' => 'No Registrasi',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'tanggal_permohonan',
            'label' => 'Tanggal Permohonan',
            'type' => 'date_picker',
            'date_picker_options' => [
                'todayBtn' => true,
                'format' => 'dd-mm-yyyy',
            ],
            'default' => date('Y-m-d'), // Nilai default tanggal hari ini
        ]);
        $this->crud->addField([
            'name' => 'jenis_layanan',
            'label' => 'Jenis Layanan',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'proses_saat_ini',
            'label' => 'Proses Saat Ini',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => ['diproses' => 'Diproses', 'tidak_lolos' => 'Tidak Lolos', 'lolos' => 'Lolos'],
        ]);
    }
    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PermohonanRequest::class);

        

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    public function store(PermohonanRequest $request)
{
    if (!$request->has('tanggal_permohonan')) {
        return back()->withErrors(['tanggal_permohonan' => 'Tanggal permohonan wajib diisi']);
    }

    // Proses penyimpanan data
    $this->crud->create($request->all());

    return redirect($this->crud->route);
}
}
