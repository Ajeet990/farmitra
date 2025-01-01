<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CropDiagnosis;
use App\Http\Requests\CropDiagnosisRequest;


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
}
