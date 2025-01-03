<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CropDiagnosis;
use App\Models\CropAffectedPart;
use App\Models\UserExpertise;
use App\Http\Requests\CropDiagnosisRequest;
use App\Models\SubCrop;

class FarmitraServicesController extends Controller
{
    public function addNewCropDiagnosis(CropDiagnosisRequest $request)
    {
        try {
            $farmerId = Auth::id();
            $uploadedImagePath = $this->uploadImage($request, 'crop_diagnosis');

            $validated = $request->validated();
            $cropDiagnosis = new CropDiagnosis();
            $cropDiagnosis->user_id = $farmerId;
            $cropDiagnosis->expert_id = $validated['expert_id'] ?? null;
            $cropDiagnosis->crop_id = $validated['crop_id'];
            $cropDiagnosis->crop_category_id = $validated['crop_category_id'];
            $cropDiagnosis->infected_crop_part = $validated['infected_crop_part'];
            $cropDiagnosis->problem_title = $validated['problem_title'];
            $cropDiagnosis->problem_description = $validated['problem_description'];
            $cropDiagnosis->image = $uploadedImagePath;
            $cropDiagnosis->save();

            return response()->json([
                'status' => true,
                'message' => 'Crop diagnosis details added'
            ]);

        } catch(Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function getCropAffectedPart(Request $request)
    {
        try {
            $rst = [
                'status' => true,
                'message' => 'No affected parts list found.',
                'data' => []
            ];
            $activeStatus = config('constants.CROP_AFFECTED_STATUS.active');
            $affectedPartsList = CropAffectedPart::where('status', $activeStatus)->get();
            // dd($affectedPartsList);
            if (!$affectedPartsList->isEmpty()) {
                $rst = [
                    'status' => true,
                    'message' => 'Crop affected part list.',
                    'data' => $affectedPartsList
                ];
            }

            return response()->json($rst);
        } catch(Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function getExperts(Request $request)
    {
        try {
            $crop_id = $request->query('crop_id') ?? 0;
            $rst = [
                'status' => true,
                'message' => 'Invalid crop id.',
                'data' => []
            ];
            $crop_detail = SubCrop::find($crop_id);
            if (empty($crop_detail)) {
                // throw new Exception("Crop with ID {$crop_id} not found.");
                return response()->json($rst);
            }
            
            $expertiseList = UserExpertise::with('user', 'crop')->where('crop_id', $crop_id)->get();
            $rst = [
                'status' => true,
                'message' => 'No expert found for this crop.',
                'data' => []
            ];
            if (!$expertiseList->isEmpty()) {
                $rst = [
                    'status' => true,
                    'message' => 'Expert details.',
                    'data' => $expertiseList
                ];
            }
            return response()->json($rst);
        } catch(Exception $e) {
            $this->storeError($e);
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ]);
        }
    }
}
