<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index(){
        $data = array(
            'title'         => 'Newsltters',
            'newsletters'   => Newsletter::latest()->get(),
        );
        return view('admin.newsletter.index')->with($data);
    }

    public function delete($id){
        Newsletter::destroy(hashids_decode($id));
        return response()->json([
            'success'   => 'Newsletter deleted successfully',
            'reload'    => true
        ]);
    }
}
