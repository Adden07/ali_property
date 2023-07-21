<?php

namespace App\Http\Controllers\Vendor;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Models\PropertyDocument;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\Slug;
use App\Models\PropertyImage;

class PropertyController extends Controller
{
    public function index(Request $request){
        // $data = array(
        //     'title'         => 'Properties',
        //     'properties'    => Property::with(['city'])->where('user_id', auth('vendor')->id())->latest()->get(),
        // );
        // return view('vendors.property.index')->with($data);
        $search = $request->s;
        $property = Property::with(['user', 'thumbnail']);

        if(!empty($search)){
            $property = $property->whereLike(['title', 'status', 'price', 'address', 'property_id', 'description', 'type', 'area', 'address', 'city', 'state', 'zipcode', 'year_built'], $search);
        }
        $data = array(
            'title' => 'Properties',
            'all_properties' => $property->where('user_id', auth()->id())->latest()->paginate(getPaginationPerPage())
        );
        return view('vendors.property.index')->with($data);
    }

    public function add(){
        $data = array(
            'title' => 'Add Property'
        );
        // dd(auth('vendor')->user()->cities()->get());
        return view('vendors.property.add')->with($data);
    }

    public function store(Request $request, Slug $slug){

        // $user = auth('admin')->user();


        if ($request->property_id) {
            $property = Property::hashidFind($request->property_id);
            $msg      = 'Property has been updated successfully';
        } else {
            $property = new Property;
            $msg      = 'Property has been added successfully';
            $property->user_id = auth('vendor')->id();
            $property->property_id =time();
            $property->status = 'Recently Added';
            $property->country = "USA";
        }
        
        $property->description = $request->description;
        $property->type = $request->type;
        $property->price = $request->price;
        $property->area = $request->area;
        $property->lot_size = $request->lot_size;
        $property->rooms = $request->rooms;
        $property->bathrooms = $request->bathrooms;
        $property->address = $request->address;
        $property->city = $request->city;
        $property->state = $request->state;
        $property->zipcode = $request->zipcode;
        $property->lat = $request->lat;
        $property->lng = $request->lng;
        $property->year_built = $request->year_built;
        $property->est_repair_cost = $request->est_repair_cost ?? null;
        $property->location_description = $request->location_description ;
        $property->start_offer_at = $request->start_date;
        $property->end_offer_at = $request->end_date;
        
        if ($request->property_id) {
            $url = route('vendors.properties.add', $request->property_id);
            if ($property->title != $request->title) {
                $property->slug = $slug->createSlug($request->title, $property->id);
            }
        } else {
            $url = route('vendors.properties.index');
            $property->slug = $slug->createSlug('properties', $request->title);
        }

        $property->title = $request->title;
        $property->save();
        if ($request->file('myfile')) {
            foreach ($request->file('myfile') as $val) {
                $thumbnail = \App\Helpers\CommonHelpers::createThumbnail($val, '500', '500');
                if (is_array($thumbnail)) {
                    return response()->json($thumbnail);
                }
                $path = \App\Helpers\CommonHelpers::uploadSingleFile($val);
                $properties_images = new PropertyImage();
                $properties_images->property_id = $property->id;
                $properties_images->image = $path;
                $properties_images->thumbnail = $thumbnail;
                $properties_images->save();
            }
        }
       

        if (@$request->documents) {
            foreach ($request->documents as $val) {
                if(!empty($val['file'])){
                    $path = \App\Helpers\CommonHelpers::uploadSingleFile($val['file'], 'upload/documents/', 'png,gif,csv,jpeg,pdf,xls,xlsx,doc,docx,jpg,txt');
                    if (is_array($path)) {
                        return response()->json($path);
                    }

                    $property_document = new PropertyDocument();
                    $property_document->property_id = $property->id;
                    $property_document->file = $path;
                    $property_document->name = $val['doc_name'];
                    $property_document->mime = $val['file']->getClientMimeType();
                    $property_document->ext = pathinfo($val['file']->getClientOriginalName(), PATHINFO_EXTENSION);
                    $property_document->size = \Storage::size($path);
                    $property_document->save();
                }
            }
        }

        if ($request->property_id) {
            return response()->json([
                'success' => $msg,
                'reload' => true
            ]);
        }
        // $admins = \App\Admin::notifiables();
        // foreach ($admins as $admin) {
        //     $admin->notify(new \App\Notifications\Admin\PropertyAdded($property));
        // }

        return response()->json([
            'success' => $msg,
            'redirect' => $url,
        ]);
    }

    public function getDocuments(Request $request)
    {    
        $data['property'] = Property::with(['documents'])->hashidFind($request->property_id);
        $_html = view('vendors.property.all_documents')->with($data)->render();

        return response()->json([
            'html' => $_html
        ]);
    }

    public function edit($id)
    {  
        $property = Property::with(['images', 'documents'])->whereNull('approved_at')->whereUserId(auth('vendor')->user()->id)->hashidOrFail($id);
        $data = array(
            'title' => 'Edit Property ID: ' . $property->property_id,
            'property' => $property
        );
        return view('vendors.property.add')->with($data);
    }

    
    public function delete($id)
    {        
        $property = Property::with('user')->hashidFind($id);
        $property->deleted_by = auth('vendor')->user()->id;
        $property->status = 'Deleted';
        $property->save();

        // $property->user->notify(new PropertyDeleted($property));

        return response()->json([
            'success' => 'Property deleted successfully',
            'reload' => true
        ]);
    }
}