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
        Amenitie::insert([
            'amenitie_name'=> $request->amenitie_name,
        ]);

        $notification = array(
            'message' => 'Amenitie Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.amenitie')->with($notification);
    }

    public function edit(string $id)
    {
        $amenitie = Amenitie::findOrFail($id);
        return view('backend.amenitie.edit-amenitie', compact('amenitie'));
    }

    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $pid = $request->id;
        Amenitie::findOrFail($pid)->update([
            'amenitie_name'=> $request->amenitie_name,
        ]);

        $notification = array(
            'message' => 'Amenitie Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.amenitie')->with($notification);
    }

    public function destroy(string $id)
    {
        Amenitie::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Amenitie Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
