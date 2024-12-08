<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Services;

class ServicesController extends Controller{
    public function get(){
        $services = Services::all(); 
        return view('pages.home', ['services' => $services]);
    }
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'imgUrl' => 'required|url', // Ensure the image URL is valid
        ]);

        // Create a new service record
        $service = Services::create([
            'name' => $validated['title'],
            'description' => $validated['description'],
            'imgUrl' => $validated['imgUrl'],
        ]);

        // Return a JSON response indicating success
        return response()->json(['success' => true, 'service' => $service], 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'imgUrl' => 'required|url',
        ]);

        $service = Services::findOrFail($id);
        $service->update($validated);

        return response()->json(['success' => true, 'message' => 'Service updated successfully.']);
    }

    public function destroy($id){
        $service = Services::find($id);

        if ($service) {
            $service->delete(); // Delete the service
            session()->flash('success', 'Service deleted successfully!');
        } else {
            session()->flash('error', 'Service not found.');
        }

        return back(); // Stay on the same page
    }


}

?>