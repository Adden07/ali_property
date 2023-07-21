<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request){
        $search = $request->s;
        $property = Property::with(['user', 'thumbnail']);

        if(!empty($search)){
            $property = $property->whereLike(['title', 'status', 'price', 'address', 'property_id', 'description', 'type', 'area', 'address', 'city', 'state', 'zipcode', 'year_built'], $search);
        }
        $data = array(
            'title' => 'Properties',
            'all_properties' => $property->latest()->paginate(getPaginationPerPage())
        );
        return view('admin.property.index')->with($data);
    }

    
    public function getDocuments(Request $request)
    {    
        $data['property'] = Property::with(['documents'])->hashidFind($request->property_id);
        $_html = view('admin.property.all_documents')->with($data)->render();

        return response()->json([
            'html' => $_html
        ]);
    }

    public function delete($id)
    {   
        $property = Property::with('user')->hashidFind($id);
        // $property->deleted_by = auth('vendor')->user()->id;
        $property->status = 'Deleted';
        $property->save();

        // $property->user->notify(new PropertyDeleted($property));

        return response()->json([
            'success' => 'Property deleted successfully',
            'reload' => true
        ]);
    }
}
