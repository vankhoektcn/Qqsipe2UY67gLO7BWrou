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
use App\Project;

use App\Price_type;
use App\Utility;
use App\Price_range;
use App\Incense_type;
use App\Area_range;

use DB;
use App\Common;
use Auth;

class ExtrasController extends Controller
{

    //+++++++++++++++++++++++++ commont category +++++++++++++++++++++++++
    /**
     * List Price_type ajax.
     */
    public function getPriceType(Request $request)
    {
        $object = Price_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
        return $object->toArray();
    }
    /**
     * List Utility ajax.
     */
    public function getUtilities(Request $request)
    {
        $object = Utility::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
        return $object->toArray();
    }
    /**
     * List Price_range ajax.
     */
    public function getPriceRange(Request $request)
    {
        $object = Price_range::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
        return $object->toArray();
    }
    /**
     * List Incense_type ajax.
     */
    public function getIncenseType(Request $request)
    {
        $object = Incense_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
        return $object->toArray();
    }
    /**
     * List Area_range ajax.
     */
    public function getAreaRange(Request $request)
    {
        $object = Area_range::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
        return $object->toArray();
    }
    //+++++++++++++++++++++++++ END commont category +++++++++++++++++++++++++

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


    /**
     * List Priject by Project-type || Province || District || Ward || Street ajax.
     */
    public function filterProject(Request $request)
    {
        $project_type_id = $request->project_type_id;
        $province_id = $request->province_id;
        $district_id = $request->district_id;
        $ward_id = $request->ward_id;
        $street_id = $request->street_id;

        $query = Project::query();
        $query->where('active',1);
        if(!is_null($project_type_id) && $project_type_id != "")
        {
            $query->where('project_type_id',$project_type_id);
        }
        if(!is_null($province_id) && $province_id != "")
        {
            $query->where('province_id',$province_id);
        }
        if(!is_null($district_id) && $district_id != "")
        {
            $query->where('district_id',$district_id);          
        }
        if(!is_null($ward_id) && $ward_id != "")
        {
            $query->where('ward_id',$ward_id);
        }
        if(!is_null($street_id) && $street_id != "")
        {
            $query->where('street_id',$street_id);
        }
        $projects = $query->orderBy('priority')->orderBy('created_at','desc')->take(20)->get();

        return $projects->toArray();
    }
}
