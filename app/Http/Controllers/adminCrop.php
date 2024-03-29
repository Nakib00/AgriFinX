<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Crop, crop_marcket_price};

class adminCrop extends Controller
{
    // Store the new crop information
    public function cropStore(Request $request)
    {
        // Validate input
        $request->validate([
            'cropname' => 'required|string',
            'scultivation' => 'required|date',
            'ecultivation' => 'required|date',
        ]);

        // Create a new crop record with the provided data
        Crop::create([
            'name' => $request->input('cropname'),
            'cultavation_start' => $request->input('scultivation'),
            'cultavation_end' => $request->input('ecultivation'),
        ]);

        // Redirect back or to a specific route after storing the data
        return redirect()->back()->with('success', 'Crop details added successfully.');
    }

    // Edit page for crop
    public function edit($id)
    {
        $crop = Crop::findOrFail($id);

        return view('admin.crop.cropedit', compact('crop'));
    }

    // Edit a crop record
    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'cropname' => 'required|string',
            'scultivation' => 'required|date',
            'ecultivation' => 'required|date',
        ]);

        // Find the crop record by ID
        $crop = Crop::findOrFail($id);

        // Update the crop record with the provided data
        $crop->name = $request->input('cropname');
        $crop->cultavation_start = $request->input('scultivation');
        $crop->cultavation_end = $request->input('ecultivation');
        $crop->save();

        // Redirect back to the crop listing page with success message
        return redirect()->route('crop')->with('success', 'Crop details updated successfully.');
    }

    // Delete the crop record
    public function delete($id)
    {
        // Find the crop record by ID
        $crop = Crop::findOrFail($id);

        // Attempt to delete the crop record
        if ($crop->delete()) {
            // If deletion is successful, redirect back to the crop listing page with success message
            return redirect()->route('crop')->with('success', 'Crop deleted successfully.');
        } else {
            // If deletion fails due to foreign key constraint violation, show error message
            return redirect()->route('crop')->with('error', 'Cannot delete crop. It is referenced in other tables.');
        }
    }


    // Crop pricing information

    // price stroe
    public function priceStore(Request $request)
    {
        // Validate input
        $request->validate([
            'cropid' => 'required|exists:crops,id',
            'currentprice' => 'required|numeric',
            'pricingdate' => 'required|date',
        ]);

        // Create a new crop market price record with the provided data
        crop_marcket_price::create([
            'crop_id' => $request->input('cropid'),
            'Current_Price' => $request->input('currentprice'),
            'price_date' => $request->input('pricingdate'),
        ]);

        // Redirect back or to a specific route after storing the data
        return redirect()->back()->with('success', 'Crop market price added successfully.');
    }

    // Show edit page
    public function mpedit($id)
    {
        $cropMarketPrice = crop_marcket_price::findOrFail($id);

        return view('admin.crop.marcketpriceedit', compact('cropMarketPrice'));
    }

    // Update a crop market price
    public function pricupdate(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'Current_Price' => 'required|numeric',
            'price_date' => 'required|date',
        ]);

        // Find the crop market price record by ID
        $cropMarketPrice = crop_marcket_price::findOrFail($id);

        // Update the crop market price record with the provided data
        $cropMarketPrice->update([
            'Current_Price' => $request->input('Current_Price'),
            'price_date' => $request->input('price_date'),
        ]);

        // Redirect back or to a specific route after updating the data
        return redirect()->back()->with('success', 'Crop market price updated successfully.');
    }
}
