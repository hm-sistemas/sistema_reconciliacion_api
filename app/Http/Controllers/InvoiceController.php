<?php

namespace App\Http\Controllers;

use App\Http\Requests\Invoice\InvoiceRequest;
use App\Http\Requests\Invoice\UpdateInvoiceRequest;
use App\Http\Resources\Invoice\InvoiceResource;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = $request->pagination ?? 25;
        $invoices = Invoice::paginate($paginate);

        return (InvoiceResource::collection($invoices))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Facturas han sido cargadas.',
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        $validated = $request->validated();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $invoice = Invoice::findOrFail($request->id);

        return (new InvoiceResource($invoice))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Factura ha sido cargada.',
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceRequest $request)
    {
        $validated = $request->validated();
        $invoice = Invoice::findOrFail($validated['id']);
        $invoice->fill($validated);
        $invoice->save();

        return (new InvoiceResource($invoice))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Factura ha sido actualizada.',
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
        $invoice = Invoice::findOrFail($request['id']);
        $invoice->delete();

        return response()->json('Factura ha sido eliminada.', 204);
    }
}