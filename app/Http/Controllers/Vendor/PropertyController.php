<?php

namespace App\Http\Controllers\Vendor;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PropertyImage;

class PropertyController extends Controller
{
    public function index(){
        $data = array(
            'title'         => 'Properties',
            'properties'    => Property::with(['city'])->where('vendor_id', auth('vendor')->id())->latest()->get(),
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

    public function store(PropertyRequest $req){
        
        $validated = $req->validated();
        $image_arr = null;

        if(isset($validated['property_id']) && !empty($validated['property_id'])){

        }else{
            $property = new Property();
            $msg      =  null;
        }

        $property->vendor_id        = (int) auth('vendor')->id();
        $property->city_id          = (int) hashids_decode($validated['city_id']);
        $property->purpose          = (string) $validated['purpose'];
        $property->property_type    = (string) $validated['property_type'];
        $property->address          = (string) $validated['address'];
        $property->area_size        = (int)    $validated['area_size'];
        $property->area_size_unit   = (string) $validated['area_size_unit'];
        $property->price            = (int)    $validated['price'];
        $property->bedrooms         = (int)    $validated['bedrooms'];
        $property->bathrooms        = (int)    $validated['bathrooms'];
        $property->title            = (string) $validated['title'];
        $property->description      = (string) $validated['description'];
        $property->email            = (string) $validated['email'];
        $property->contact_no       = (string) $validated['contact_no'];

        if(!empty($validated['image'])){
            $property->image = CommonHelpers::uploadSingleFile($validated['image'], 'vendor/property_thumbnail/', 'jpg,jpeg,png', 1000);
        }

        try{//use try and catch for exceptions
            DB::transaction(function() use (&$msg, &$validated, &$property){
                $property->save();//save the proeprty record
                foreach($validated['image_arr'] AS $arr){
                    $image_arr[] = array(
                        'property_id'   => $property->id,
                        'image'         => CommonHelpers::uploadSingleFile($arr, 'vendor/property_images/', 'jpg,jpeg,png', 1000)
                    );
                }
                ($image_arr != null) ? PropertyImage::insert($image_arr) : '';
            });
            $msg = [
                'success'   => 'Propert added successfully',
                'reload'    => true
            ];

        }catch(Exception $e){
            $msg = [
                'error'   => 'Some errors occued please try again',
            ];
        }

        return response()->json($msg);
    }
}