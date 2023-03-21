<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(){

    }

    public function add(){
        $data = array(
            'title' => 'Add Property'
        );
        return view('vendors.property.add')->with($data);
    }
}