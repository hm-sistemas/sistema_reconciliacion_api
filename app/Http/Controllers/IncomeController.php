<?php

namespace App\Http\Controllers;

use App\Http\Requests\Income\IncomeRequest;
use App\Http\Requests\Income\UpdateIncomeRequest;
use App\Http\Resources\Income\IncomeResource;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = $request->pagination ?? 25;
        $incomes = Income::paginate($paginate);

        return (IncomeResource::collection($incomes))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Ingresos han sido cargados.',
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
        $income = Income::findOrFail($request->id);
        $income->load('splits', 'invoices');

        return (new IncomeResource($income))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Ingreso ha sido cargado.',
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage or return found.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(IncomeRequest $request)
    {
        $validated = $request->validated();
        $income = Income::where('date', $validated['date'])->first();
        $success = true;
        $message = 'Ingreso ha sido cargado.';
        if (!$income) {
            $date = Carbon::createFromFormat('Y-m-d', $validated['date']);
            $income = new Income();
            $income->exchange_rate = $validated['exchange_rate'];
            $income->date = $validated['date'];
            $income->comments = $validated['comments'];
            $income->deposit_id = 0;
            $income->year = $date->year;
            $income->month = $date->month;
            $income->save();
        } else {
            //already exists
            $success = false;
            $message = 'Ingreso con fecha indicada ya existe.';
        }

        return (new IncomeResource($income))->additional([
            'meta' => [
                'success' => $success,
                'message' => $message,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncomeRequest $request)
    {
        $validated = $request->validated();
        $income = Income::findOrFail($validated['id']);
        $income->fill($validated);
        $income->save();

        return (new IncomeResource($income))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Ingreso ha sido actualizado.',
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
        $income = Income::findOrFail($request['id']);
        $income->delete();

        return response()->json('Ingreso ha sido eliminado.', 204);
    }
}