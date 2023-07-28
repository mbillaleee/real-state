<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Amenitie;
use Illuminate\Http\Request;

class AmenitieController extends Controller
{
    public function index()
    {
        $amenities = Amenitie::latest()->get();
        return view('backend.amenitie.all-amenitie', compact('amenities'));
    }

    public function create()
    {
        return view('backend.amenitie.add-amenitie');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);
        Amenitie::insert([
            'type_name'=> $request->type_name,
            'type_icon'=> $request->type_icon
        ]);

        $notification = array(
            'message' => 'Property Type Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.type')->with($notification);
    }
}
