<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservations;
use App\Models\Table;
use Carbon\Carbon;
use Flasher\SweetAlert\Prime\SweetAlertFactory;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservations::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = Table::all();
        return view('admin.reservations.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationStoreRequest $request, SweetAlertFactory $flasher)
    {
        //try{}
        // condição para numeros de guests nas mesas
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Please choose the table base on guests.');
        }

        Reservations::create($request->validated());
        $flasher->addSuccess('Your Reservation has been create!');
        return redirect()->route('admin.reservations.index');
        /*catch(\Exception $e) {
            $flasher->addError('An error has occurred please try again later.');
            return redirect()->route('dashboard');
        }*/
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
    public function edit(Reservations $reservation)
    {
        $tables = Table::all();
        return view('admin.reservations.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationStoreRequest $request, Reservations $reservation, SweetAlertFactory $flasher)
    {
        try {
            $reservation->update($request->validated());
            $flasher->addSuccess('Your reservation has been update!');
            return redirect()->route('admin.reservations.index');
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
    public function destroy(Reservations $reservation, SweetAlertFactory $flasher)
    {
        try {
            $reservation->delete();
            $flasher->addSuccess('Your table has been delete!');
            return redirect()->route('admin.reservations.index');
        }
        catch(\Exception $e) {
            $flasher->addError('An error has occurred please try again later.');
            return redirect()->route('dashboard');
        }
    }
}
