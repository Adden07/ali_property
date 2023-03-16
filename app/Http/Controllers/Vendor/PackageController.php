<?php

namespace App\Http\Controllers\Vendor;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Models\Country;
use App\Models\PackageAddOn;
use App\Models\PackageType;
use App\Models\VendorPackage;
use App\Models\VendorPackageImage;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(){
        $data = array(
            'title'     => 'All packages',
            'packages'  => VendorPackage::with(['package_type', 'country'])->where('vendor_id', auth('vendor')->id())->latest()->get(),
        );
        return view('vendors.package.index')->with($data);
    }

    public function add(){//add package
        $data = array(
            'title'     => 'Add package',
            'types'     => PackageType::where('status', '1')->latest()->get(),
            'countries' => Country::get(),
        );
        return view('vendors.package.add')->with($data);
    }

    public function store(PackageRequest $req){//add and update the pacakge
        
        $validated         = $req->validated();
        $morning_arr       = array();
        $evening_arr       = array();
        $package_image_arr = array();

        if(is_check(@$validated['package_id'])){
            $pkg = VendorPackage::findOrFail(hashids_decode($validated['package_id']));
            $msg = 'Package updated successfully';
            $pkg->addOns()->delete();//delete the addons on updated so on eery update reinsert the addons
        }else{
            $pkg = new VendorPackage;
            $msg = 'Package added successfully';
        }

        if(!empty($validated['image'])){//for thumbnail
            $pkg->image = CommonHelpers::uploadSingleFile($validated['image'], 'vendor_uploads/package_thumbnails/', 'png,jpg,jpeg', '1080');
        }
        
        $pkg->vendor_id         = auth('vendor')->id();
        $pkg->country_id        = hashids_decode($validated['country_id']);
        $pkg->pkg_type_id       = hashids_decode($validated['pkg_type_id']);
        $pkg->title             = $validated['title'];
        $pkg->infant            = $validated['infant'] ?? NULL;
        $pkg->child             = $validated['child']  ?? NULL;
        $pkg->adult             = $validated['adult']  ?? NULL;
        $pkg->dinner            = $validated['dinner'] ?? NULL;
        $pkg->is_morning        = $validated['is_morning'] ?? 0;
        $pkg->is_evening        = $validated['is_evening'] ?? 0;
        $pkg->description       = $validated['description'];
        $pkg->save();

        if(is_check(@$validated['is_morning']) && !is_null($validated['morning_title'][0])){//morning add ons array
            $morning_arr = $this->putValueinArray($validated['morning_title'], $validated['morning_price'], 'morning', $pkg->id);
            PackageAddOn::insert($morning_arr);
        }
        
        if(is_check(@$validated['is_evening'] && !is_null($validated['evening_title'][0]))){//evening add ons array
            $evening_arr = $this->putValueinArray($validated['evening_title'], $validated['evening_price'], 'evening', $pkg->id);
            PackageAddOn::insert($evening_arr);
        }

        if(collect($validated['image_arr'][0])->isNotEmpty()){//update vendor package multiple images\
            foreach($validated['image_arr'] AS $image){
                $package_image_arr[] = array(
                    'vendor_package_id' => $pkg->id,
                    'image'             => CommonHelpers::uploadSingleFile($image, 'vendor_uploads/package_images/', 'png,jpg,jpeg', '1080')
                );
            }
            VendorPackageImage::insert($package_image_arr);
        }
        return response()->json([
            'success'    => $msg,
            'redirect'   => route('vendors.packages.index')
        ]);
    }

    public function edit($id){//edit package
        $data = array(
            'title'         => 'Edit package',
            'types'         => PackageType::where('status', '1')->latest()->get(),
            'countries'     => Country::get(),
            'edit_package'  => VendorPackage::with(['addOns', 'packageImages'])
                                ->withCount(['addOns AS morning_count'=>function($query){
                                    $query->where('type', 'morning');
                                }, 'addOns AS evening_count'=>function($query){
                                    $query->where('type', 'evening');
                                }, 'packageImages'])->findOrFail(hashids_decode($id)),
            'is_update'     => true
        );
        // dd($data['edit_package']);
        return view('vendors.package.add')->with($data);
    }

    public function delete($id){
        $pkg = VendorPackage::findOrFail(hashids_decode($id));
        @unlink(public_path($pkg->image));
        $pkg->addOns()->delete();
        $pkg->delete();

        return response()->json([
            'success'   => 'Package deleted successfully',
            'reload'    => true
        ]);
    }

    //update the vendor status
    public function updateStatus($id, $status){
        if(CommonHelpers::updateStatus('vendor_packages', hashids_decode($id), 'status', $status, true)){
            return response()->json([
                'success'    => 'Status updated successfully',
                'reload'    => true
            ]);
        };
        return response()->json([
            'error' => 'Unable to update status'
        ]);
    }

    //show description in modal
    public function showDescription($id){
        return CommonHelpers::showDescModal('vendor_packages', hashids_decode($id), 'description', 'components/description_modal', 'Package    Description', true);
    }

    public function putValueinArray($title_arr, $price_arr, $type, $package_id){//put the values in array for add ons table
        foreach($title_arr AS $key=>$arr){
            if(is_check($arr)){
                $array[] = array(
                    'package_id'    => $package_id,
                    'title'         => $arr,
                    'price'         => $price_arr[$key],
                    'type'          => $type,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s'),
                );
            }
        }
        return $array;
    }

    public function deletePackageImage($id){
        // $image = VendorPackageImage::findOrFail(hashids_decode($id));
        // @unlink(public_path($image->image));
        // $image->delete();

        return response()->json([
            'success'   => 'Package image deleted successfully',
        ]);
    }
}
