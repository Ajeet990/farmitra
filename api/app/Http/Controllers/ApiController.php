<?php

namespace App\Http\Controllers;

use App\Models\CropAdvisory;
use App\Models\CropAdvisoryDetails;
use App\Models\CropProtection;
use App\Models\CropTimeline;
use App\Models\FarmerFarmCrop;
use App\Models\FarmerFarmTimeline;
use App\Models\FarmitraCrop;
use App\Models\FarmitraFarm;
use App\Models\FarmCropTimeline;
use App\Models\SubCrop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ApiController extends Controller
{
    public function getCrop(){
        try {
            return response()->json(['status'=>'success','data'=> FarmitraCrop::select('id','name','banner')->get()]);
        } catch (\Throwable $th) {
            return response()->json(['status'=> 'error','data'=> $th->getMessage()]);
        }
    }

    public function getSubCrop($crop_id){
        try {
            return response()->json(['status'=>'success','data'=> SubCrop::where('farmitra_crop_id',$crop_id)->get()]);
        } catch (\Throwable $th) {
            return response()->json(['status'=> 'error','data'=> $th->getMessage()]);
        }
    }

    public function addFarm(Request $request)
    {
        // Get authenticated farmer's ID from the token
        $farmerId = Auth::id();
        if (!$farmerId) {
            return response()->json(['status' => false,'message' => 'Unauthorized User','data'=>null]);
        }
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
               
            ], 422);
        }
        // Handle the banner upload
        $bannerPath = null;
        if ($request->hasFile('banner')) {
            $bannerPath = $request->file('banner')->store('banners', 'public');
        }

        // Create a new farm record
        $farm = FarmitraFarm::create([
            'farmer_id' => $farmerId,
            'name' => $request->name,
            'banner' => $bannerPath,
        ]);

        return response()->json(['status'=>true,'message' => 'Farm created successfully', 'data' => $farm], 201);
    }

    public function addFarmCrop(Request $request)
    {
        //return $request->all();
        try {
            
            // Get the authenticated farmer's ID
        $farmerId = Auth::id();

        if (!$farmerId) {
            return response()->json(['success' => false, 'message' => 'Unauthorized User'], 401);
        }

        // Validate input fields
        try {
            $request->validate([
                'crop_id' => 'required|exists:sub_crops,id',
                'farm_id' => 'required|exists:farmitra_farms,id',
                'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'field_area' => 'nullable|string',
                'variety' => 'nullable|string',
                'is_sowing' => 'boolean',
                'sowing_date' => 'nullable|string',
                'sowing_type' => 'nullable|string',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        }

        // Handle the banner file upload
        $bannerPath = null;
        if ($request->hasFile('banner')) {
            $bannerPath = $request->file('banner')->store('banners', 'public');
        }

        // Create the crop record
        $crop = FarmerFarmCrop::create([
            'farmer_id' => $farmerId,
            'crop_id' => $request->crop_id,
            'farm_id' => $request->farm_id,
            'banner' => $bannerPath,
            'field_area' => $request->field_area,
            'variety' => $request->variety,
            'is_sowing' => $request->is_sowing ?? false,
            'sowing_date' => $request->sowing_date,
            'unit' => $request->unit,
            'sowing_type' => $request->sowing_type ?? 'seed',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Crop added successfully',
            'data' => $crop
        ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Exception',
                'errors' => $th->getMessage(),
            ], 422);
        }
        
    }


    public function addCropTimeline(Request $request)
    {
        // Get authenticated farmer's ID from the token
        $farmerId = Auth::id();

        if (!$farmerId) {
            return response()->json(['success' => false, 'message' => 'Unauthorized User'], 401);
        }

        // Validate input fields
        try {
            $request->validate([
                'sowing_date' => 'required|date',
                'irrigation_date' => 'required|date',
                'fertilizers_date' => 'required|date',
                'pestisides_date' => 'required|date',
                'harvest_date' => 'required|date',
                'completed_date' => 'required|date',
                'is_sowing_completed' => 'required|boolean',
                'is_irrigation_completed' => 'required|boolean',
                'is_fertilizers_completed' => 'required|boolean',
                'is_pestisides_completed' => 'required|boolean',
                'is_harvest_completed' => 'required|boolean',
                'is_completed_completed' => 'required|boolean',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        }

        try {
            $cropActivity = FarmerFarmTimeline::where('farmer_id', $farmerId)->where('farm_crop_id',$request->farm_crop_id)->first();

            // If the record exists, update it, otherwise create a new one
            if ($cropActivity) {
                // Update existing record
                $cropActivity->update([
                    'sowing_date' => $request->sowing_date,
                    'is_sowing_completed' => $request->is_sowing_completed,
                    'irrigation_date' => $request->irrigation_date,
                    'is_irrigation_completed' => $request->is_irrigation_completed,
                    'fertilizers_date' => $request->fertilizers_date,
                    'is_fertilizers_completed' => $request->is_fertilizers_completed,
                    'pestisides_date' => $request->pestisides_date,
                    'is_pestisides_completed' => $request->is_pestisides_completed,
                    'harvest_date' => $request->harvest_date,
                    'is_harvest_completed' => $request->is_harvest_completed,
                    'completed_date' => $request->completed_date,
                    'is_completed_completed' => $request->is_completed_completed,
                ]);
    
                return response()->json([
                    'success' => true,
                    'message' => 'Crop activity updated successfully',
                    'data' => $cropActivity,
                ], 200);
            } else {
                // If record does not exist, create a new one
                $newCropActivity = FarmerFarmTimeline::create([
                    'farmer_id' => $farmerId,
                    'farm_crop_id'=>$request->farm_crop_id,
                    'sowing_date' => $request->sowing_date,
                    'is_sowing_completed' => $request->is_sowing_completed,
                    'irrigation_date' => $request->irrigation_date,
                    'is_irrigation_completed' => $request->is_irrigation_completed,
                    'fertilizers_date' => $request->fertilizers_date,
                    'is_fertilizers_completed' => $request->is_fertilizers_completed,
                    'pestisides_date' => $request->pestisides_date,
                    'is_pestisides_completed' => $request->is_pestisides_completed,
                    'harvest_date' => $request->harvest_date,
                    'is_harvest_completed' => $request->is_harvest_completed,
                    'completed_date' => $request->completed_date,
                    'is_completed_completed' => $request->is_completed_completed,
                ]);
    
                return response()->json([
                    'success' => true,
                    'message' => 'Crop activity created successfully',
                    'data' => $newCropActivity,
                ], 201);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
                'data' => null,
            ], 201);
        }
        // Create a new crop activity record
        // Check if crop activity exists for the farmer (You can adjust the check based on your business logic)
        
        
    }

    public function getFarmTimeline(Request $request){
        $farmerId = Auth::id();

        if (!$farmerId) {
            return response()->json(['success' => false, 'message' => 'Unauthorized User'], 401);
        }
        try {
            $cropActivity = FarmerFarmTimeline::where('farmer_id', $farmerId)->where('farm_crop_id',$request->farm_crop_id)->first();
            if (!$cropActivity) {
                return response()->json([
                    'success'=> false,
                    'message'=> 'Data Not Found',
                    'data'=> null,
                    ], 400);
                }else{
                    return response()->json([
                        'success'=> true,
                        'message'=> 'Data Found Successfully',
                        'data'=> $cropActivity,
                        ], 201);
                }
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }
    }

    public function getMyFarm(Request $request){
        $farmerId = Auth::id();
        if (!$farmerId) {
            return response()->json([
                'success'=> false,
                'message'=> 'Unauthorized User',
                'data'=> null,
                ], 400);
        }

        try {
            $myfarm = FarmitraFarm::where('farmer_id', $farmerId)->get();
            return response()->json([
                'success'=> true,
                'message'=> 'Data Successfully Fetched',
                'data'=> $myfarm,
                ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }
    }

    public function getMyFarmcrops(Request $request,$farm_id){
        $farmerId = Auth::id();
        //return $farmerId;
        if (!$farmerId) {
            return response()->json([
                'success'=> false,
                'message'=> 'Unauthorized User',
                'data'=> null,
                ], 400);
        }

        try {
            $myfarm = FarmerFarmCrop::where('farmer_id', $farmerId)->select('id','farmer_id','crop_id','farm_id','banner','field_area','variety','is_sowing','sowing_date','sowing_type','unit')->where('farm_id',$farm_id)->with(['crop:id,name,banner', 'farm:id,name'])->get();
            return response()->json([
                'success'=> true,
                'message'=> 'Data Successfully Fetched',
                'data'=> $myfarm,
                ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }

        
    }

    public function makeCropTimeline(Request $request,$crop_id,$farm_crop_id){
        $farmerId = Auth::id();
        if (!$farmerId) {
            return response()->json([
                'success'=> false,
                'message'=> 'Unauthorized User',
                'data'=> null,
                ], 400);
        }

        try {
          //$check_already_exist = \App\Models\FarmCropTimeline::where('id',$request->farm_crop_timeline_id)->get();
           $farm_crop=FarmCropTimeline::where('farm_crop_id',$farm_crop_id)->get();
           if (!$request->farm_crop_timeline_id) {
                $crop_timeline = CropTimeline::where('crop_id',$crop_id)->get();
                if (count($crop_timeline)==0) {
                    return response()->json([
                        'success'=> false,
                        'message'=> 'Crop Timeline Data Not Found',
                        'data'=> null,
                        ], 400);
                }else{
                    if(count($farm_crop)==0){
                        //return $crop_timeline[0]['id'];
                        for ($i = 0; $i < count($crop_timeline); $i++) {
                            $farm_crop_timeline = new FarmCropTimeline();
                            $farm_crop_timeline->crop_timeline_id = $crop_timeline[$i]['id'];
                            $farm_crop_timeline->farm_crop_id = $farm_crop_id;
                            $farm_crop_timeline->save();
                        } 
                        
                        return response()->json([
                        'success'=> true,
                        'message'=> 'Data Successfully Fetched',
                        'data'=> \App\Models\FarmCropTimeline::where('farm_crop_id',$farm_crop_id)->select('id','crop_timeline_id','farm_crop_id','is_completed','is_completed_date')->with('crop_timeline')->get(),
                        
                        ], 200);
                    }else{
                        return response()->json([
                        'success'=> true,
                        'message'=> 'Data Successfully Fetched',
                        'data'=> \App\Models\FarmCropTimeline::where('farm_crop_id',$farm_crop_id)->select('id','crop_timeline_id','farm_crop_id','is_completed','is_completed_date')->with('crop_timeline')->get(),
                        
                        ], 200);
                    }
                    
                }
            
                
           }else{
               
            $farm_crop_timeline = FarmCropTimeline::find($request->farm_crop_timeline_id);
            //return $farm_crop_timeline;
            $farm_crop_timeline->is_completed = $request->is_completed;
            $farm_crop_timeline->is_completed_date = $request->is_completed_date;
            $farm_crop_timeline->save();
            
             return response()->json([
            'success'=> true,
            'message'=> 'Data Successfully Fetched',
            'data'=> \App\Models\FarmCropTimeline::where('farm_crop_id',$farm_crop_id)->with('crop_timeline')->get(),
            
            ], 200);
           }

          
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }
    }


    public function getCropAdvisory(Request $request,$crop_id){
        $farmerId = Auth::id();
        if (!$farmerId) {
            return response()->json([
                'success'=> false,
                'message'=> 'Unauthorized User',
                'data'=> null,
                ], 400);
        }

        try {
            return response()->json([
                'success'=> true,
                'message'=> 'Data Fechted Successfully',
                'data'=> CropAdvisory::where('crop_id',$crop_id)->select('id','crop_id','title','duration_title','status')->with('advisory_details')->get(),
                
                ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }
    }

    public function getCropAdvisoryDetails(Request $request,$crop_advisory_id){
        $farmerId = Auth::id();
        if (!$farmerId) {
            return response()->json([
                'success'=> false,
                'message'=> 'Unauthorized User',
                'data'=> null,
                ], 400);
        }

        try {
            return response()->json([
                'success'=> true,
                'message'=> 'Data Fechted Successfully',
                'data'=> CropAdvisoryDetails::where('id',$crop_advisory_id)->first(),
                'next'=>CropAdvisoryDetails::where('id','>',$crop_advisory_id)->select('id','crop_advisory_id','title','banner')->orderBy('id', 'asc')->get()
                ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }
    }
    public function getCropProtection(Request $request,$crop_id){
        $farmerId = Auth::id();
        if (!$farmerId) {
            return response()->json([
                'success'=> false,
                'message'=> 'Unauthorized User',
                'data'=> null,
                ], 400);
        }

        try {
            return response()->json([
                'success'=> true,
                'message'=> 'Data Fechted Successfully',
                'data'=> CropProtection::where('crop_id',$crop_id)->select('id','crop_id','title','banner')->get(),
                ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }
    }

    public function getCropProtectionDetails(Request $request,$id){
        $farmerId = Auth::id();
        if (!$farmerId) {
            return response()->json([
                'success'=> false,
                'message'=> 'Unauthorized User',
                'data'=> null,
                ], 400);
        }

        try {
            return response()->json([
                'success'=> true,
                'message'=> 'Data Fechted Successfully',
                'data'=> CropProtection::where('id',$id)->select('id','crop_id','title','banner','banners','content','audio','video')->get(),
                ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }
    }

    public function getNextCropAdvisoryList(Request $request,$crop_advisory_id){
        $farmerId = Auth::id();
        if (!$farmerId) {
            return response()->json([
                'success'=> false,
                'message'=> 'Unauthorized User',
                'data'=> null,
                ], 400);
        }

        try {
            return response()->json([
                'success'=> true,
                'message'=> 'Data Fechted Successfully',
                'data'=> CropAdvisoryDetails::where('id','>',$crop_advisory_id)->select('id','crop_advisory_id','title','banner')->orderBy('id', 'asc')->get(),
                ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }
    }

    public function getNextCropProtectionList(Request $request,$crop_protection_id){
        $farmerId = Auth::id();
        if (!$farmerId) {
            return response()->json([
                'success'=> false,
                'message'=> 'Unauthorized User',
                'data'=> null,
                ], 400);
        }

        try {
            return response()->json([
                'success'=> true,
                'message'=> 'Data Fechted Successfully',
                'data'=> CropProtection::where('id','>',$crop_protection_id)->select('id','crop_id','title','banner')->orderBy('id', 'asc')->get(),
                ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }
    }
    
    
    public function deleteFarm(Request $request){
        $farmerId = Auth::id();
        if (!$farmerId) {
            return response()->json([
                'success'=> false,
                'message'=> 'Unauthorized User',
                'data'=> null,
                ], 400);
        }

        try {
            //$array = json_decode($request->farm_id, true);
            //return $array;
            $request->validate([
                'farm_id' => 'required',
                'farm_id.*' => 'integer|exists:farmitra_farms,id',
            ]);
            FarmitraFarm::where('farmer_id',$farmerId)->whereIn('id',json_decode($request->farm_id, true))->delete();
            return response()->json([
                'success'=> true,
                'message'=> 'Farm Deleted Successfully',
                'data'=> null,
                ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }
    }
    
    public function deleteFarmCrop(Request $request){
        $farmerId = Auth::id();
        if (!$farmerId) {
            return response()->json([
                'success'=> false,
                'message'=> 'Unauthorized User',
                'data'=> null,
                ], 400);
        }

        try {
            FarmerFarmCrop::where('farmer_id',$farmerId)->whereIn('id',json_decode($request->farm_crop_id, true))->delete();
            return response()->json([
                'success'=> true,
                'message'=> 'Farmer Farm Crop Deleted Successfully',
                'data'=> null,
                ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }
    }
    
    
    
    public function addPostByUser(Request $request){
        $userId = Auth::id();
        if (!$userId) {
            return response()->json([
                'success'=> false,
                'message'=> 'Unauthorized User',
                'data'=> null,
                ], 400);
        }
        try {
            $request->validate([
                'location' => 'required|string',
                'tags' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'content'=>'required'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
               
            ], 422);
        }
        // Handle the banner upload
        $bannerPath = null;
        if ($request->hasFile('image')) {
            $bannerPath = $request->file('image')->store('banners', 'public');
        }

        try {
            $post = \App\Models\Post::create([
                'user_id' => $userId,
                'location' => $request->location,
                'tags'=>json_encode($request->tags),
                'image' => $bannerPath,
                'content'=>$request->content
            ]);
    
            return response()->json(['status'=>true,'message' => 'Post created successfully', 'data' => $post], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }
    }

    public function addPostByExpert(Request $request){
        $userId = Auth::id();
        if (!$userId) {
            return response()->json([
                'success'=> false,
                'message'=> 'Unauthorized User',
                'data'=> null,
                ], 400);
        }
        try {
            $request->validate([
                'location' => 'required|string',
                'tags' => 'required|string',
                'video_link' => 'required',
                'content'=>'required'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
               
            ], 422);
        }
       

        try {
            $post = \App\Models\VideoPost::create([
                'user_id' => $userId,
                'location' => $request->location,
                'tags'=>json_encode($request->tags),
                'video_link' => $request->video_link,
                'content'=>$request->content
            ]);
    
            return response()->json(['status'=>true,'message' => 'Post created successfully', 'data' => $post], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }
    }
    
    public function getPostTags(){
        return response()->json(['status'=>true,'message' => 'Data Successfully Fetched', 'data' => \App\Models\PostTag::select('id','name')->get()], 200);
    }

    public function getBlogsCategory(){
        return response()->json(['status'=>true,'message' => 'Data Successfully Fetched', 'data' => \App\Models\BlogCategory::select('id','name')->get()], 200);
    }

    public function getBlogs($blog_category_id=null){
        try {
        return response()->json(['status'=>true,'message' => 'Data Successfully Fetched', 'data' => $blog_category_id==null?\App\Models\Blog::with('user')->select('id','title','user_id','created_at','banner')->paginate(10):\App\Models\Blog::where('blog_category_id',$blog_category_id)->with('user')->select('id','title','user_id','created_at','banner')->paginate(10)], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }
    }
    
    public function viewBlogById($blog_id){
        try {
        return response()->json(['status'=>true,'message' => 'Data Successfully Fetched', 'data' => \App\Models\Blog::where('id',$blog_id)->with('user')->first(),'related'=>\App\Models\Blog::where('id','>',$blog_id)->select('id','title','banner')->orderBy('id', 'asc')->get()], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message'=> $th->getMessage(),
                'data'=> null,
                ], 401);
        }
    }
    
    public function getPost(){
        try {
            return response()->json(['status'=>true,'message' => 'Data Successfully Fetched', 'data' => \App\Models\Post::with('user')->paginate(10)], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'success'=> false,
                    'message'=> $th->getMessage(),
                    'data'=> null,
                    ], 401);
            }
    }

    public function getVideoPost(){
        try {
            return response()->json(['status'=>true,'message' => 'Data Successfully Fetched', 'data' => \App\Models\VideoPost::with('user')->paginate(10)], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'success'=> false,
                    'message'=> $th->getMessage(),
                    'data'=> null,
                    ], 401);
            }
    }
    
    
    
    
    
}
