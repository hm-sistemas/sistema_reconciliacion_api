<?php

namespace App\Http\Controllers;

use App\Http\Requests\Deposit\DepositRequest;
use App\Http\Requests\Deposit\UpdateDepositRequest;
use App\Http\Resources\Deposit\DepositResource;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = $request->pagination ?? 25;
        $deposits = Deposit::paginate($paginate);

        return (DepositResource::collection($deposits))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Depositos han sido cargados.',
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DepositRequest $request)
    {
        $validated = $request->validated();
        $deposit = Deposit::create($validated);

        //Update related incomes

        return (new DepositResource($deposit))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Deposito ha sido registrado.',
            ],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $deposit = Deposit::findOrFail($request->id);

        return (new DepositResource($deposit))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Deposito ha sido cargado.',
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepositRequest $request)
    {
        $validated = $request->validated();
        $deposit = Deposit::findOrFail($validated['id']);
        $deposit->fill($validated);
        $deposit->save();

        return (new DepositResource($deposit))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Deposito ha sido actualizado.',
            ],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deposit = Deposit::findOrFail($request['id']);
        $deposit->delete();

        return response()->json('Deposito ha sido eliminado.', 204);
    }
}