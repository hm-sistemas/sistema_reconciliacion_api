<?php

namespace App\Http\Controllers;

use App\Http\Requests\Income\UpdateIncomeRequest;
use App\Http\Resources\Income\IncomeResource;
use App\Models\Income;
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
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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