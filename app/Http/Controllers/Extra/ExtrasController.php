<?php

namespace App\Http\Controllers\Extra;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Product_type;
use App\Project_type;
use App\Province;
use App\District;
use App\Ward;
use App\Street;

use DB;
use App\Common;
use Auth;

class ExtrasController extends Controller
{
    /**
     * List Product type ajax.
     */
    public function getProductType(Request $request)
    {
        $product_types = Product_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
        return $product_types->toArray();
    }

    /**
     * List Project type ajax.
     */
    public function getProjectType(Request $request)
    {
        $project_types = Project_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
        return $project_types->toArray();
    }

    /**
     * List Provinces ajax.
     */
    public function getProvinces(Request $request)
    {
        $provinces = Province::with('translations')->where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();
        return $provinces->toArray();
    }

    /**
     * List District by province id ajax.
     */
    public function getDistrictsByProvince($province_id)
    {
        $districts = District::where('province_id',$province_id)->orderBy('priority')->get();
        return $districts->toArray();
    }

    /**
     * List Ward by District id ajax.
     */
    public function getWardsByDistrict($district_id)
    {
        $wards = Ward::where('district_id',$district_id)->orderBy('priority')->get();
        return $wards->toArray();
    }    

    /**
     * List Ward by District id ajax.
     */
    public function getStreetsByDistrict($district_id)
    {
        $streets = Street::where('district_id',$district_id)->orderBy('priority')->get();
        return $streets->toArray();
    }
}
