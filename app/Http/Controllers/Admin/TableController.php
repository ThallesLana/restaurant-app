<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use App\Models\Table;
use Flasher\SweetAlert\Prime\SweetAlertFactory;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();
        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableStoreRequest $request, SweetAlertFactory $flasher)
    {
        try {
            Table::create([
                'name' => $request->name,
                'guest_number' => $request->guest_number,
                'status' => $request->status,
                'location' => $request->location
            ]);

            $flasher->addSuccess('Your table has been create!');
            return redirect()->route('admin.tables.index');
        }
        catch(\Exception $e) {
            $flasher->addError('An error has occurred please try again later.');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        return view('admin.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TableStoreRequest $request, Table $table, SweetAlertFactory $flasher)
    {
        try {
            $table->update($request->validated());
            $flasher->addSuccess('Your table has been update!');
            return redirect()->route('admin.tables.index');
        }

        catch(\Exception $e) {
            $flasher->addError('An error has occurred please try again later.');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table, SweetAlertFactory $flasher)
    {
        try {
            $table->delete();
            $flasher->addSuccess('Your table has been delete!');
            return redirect()->route('admin.tables.index');
        }
        catch(\Exception $e) {
            $flasher->addError('An error has occurred please try again later.');
            return redirect()->route('dashboard');
        }
    }
}
