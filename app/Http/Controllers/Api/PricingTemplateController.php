<?php

namespace App\Http\Controllers\Api;

use App\Models\PricingTemplate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PricingTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pricingTemplates = auth()->user()->pricingTemplates;
        return response()->json($pricingTemplates);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'configuration' => 'required|array',
        ]);

        $pricingTemplate = auth()->user()->pricingTemplates()->create($validatedData);

        return response()->json($pricingTemplate, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PricingTemplate $pricingTemplate)
    {
        return response()->json($pricingTemplate);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PricingTemplate $pricingTemplate)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'configuration' => 'required|array',
        ]);

        $pricingTemplate->update($validatedData);

        return response()->json($pricingTemplate);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PricingTemplate $pricingTemplate)
    {
        $pricingTemplate->delete();

        return response()->json(['message' => 'Pricing template deleted successfully']);
    }
}
