<?php

namespace App\Http\Controllers;

use App\Http\Requests\Split\UpdateSplitRequest;
use App\Http\Resources\Split\SplitResource;
use App\Models\Split;
use Illuminate\Http\Request;

class SplitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = $request->pagination ?? 25;
        $splits = Split::paginate($paginate);

        return (SplitResource::collection($splits))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Cortes han sido cargados.',
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
     * @param \App\Models\Split $split
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $split = Split::findOrFail($request->id);

        return (new SplitResource($split))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Corte ha sido cargado.',
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Split        $split
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSplitRequest $request)
    {
        $validated = $request->validated();
        $split = Split::findOrFail($validated['id']);
        $split->fill($validated);
        $split->save();

        return (new SplitResource($split))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Corte ha sido actualizado.',
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
        $split = Split::findOrFail($request['id']);
        $split->delete();

        return response()->json('Corte ha sido eliminado.', 204);
    }
}