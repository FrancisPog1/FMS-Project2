<?php

namespace App\Http\Controllers\AcadHead;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;


use App\Models\RequirementType;

use App\Models\RequirementCategory;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class RequirementType_Controller extends Controller
{
    public function show(){
        $deleted_types = RequirementType::onlyTrashed()
        // ->where('is_deleted', true)
        ->get();

        $requirement_types = RequirementType::where('deleted_at', null)
        ->where('is_deleted', false)
        ->get();

        $categories = RequirementCategory::get();


        $requirement_types = DB::table('requirement_types as types')
        ->leftJoin('requirement_categories as cat', 'cat.id', '=' ,'types.category_id')
        ->where('types.deleted_at', '='  , null)
        ->where('types.is_deleted', '='  , false)
        ->select('types.title as title',
                    'types.id as id',
                    'types.description as description',
                    'cat.title as cat_title')
        ->get();


        return view('Academic_head/AcadHead_Setup/AcadHead_RequirementType/AcadHead_RequirementType',
        compact('deleted_types', 'requirement_types', 'categories'));
    }

    public function filteredAndSortedRequirementtype(Request $request){
        if ($request->ajax()) {
            $query = RequirementType::whereNull('deleted_at')
                ->where('is_deleted', false);

            if ($request->option) {
                $option = $request->option;
                switch ($option) {
                    case 'az':
                        $query->orderBy('title', 'asc');
                        break;
                    case 'za':
                        $query->orderBy('title', 'desc');
                        break;
                    default:
                        break;
                }
            }

            $types = $query->get();
            return response()->json(['types' => $types]);
        }

    }

    /**Creating Requirement Type */
    public function Create_RequirementType(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:requirement_types',
            'description'=>'max:300',
            'category' => 'required'
        ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        /**Codes to get the contents of the input field and save it to the database */
        $reqtype = new RequirementType();
        $reqtype->id = Str::uuid()->toString();
        $reqtype->title = $request ->title;
        $reqtype->description = $request ->description;
        $reqtype->category_id = $request->category;
        $reqtype->created_by = $userId;

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $reqtype->save();
            return response()->json(['success' => true, 'message' => 'Requirement Type successfully created.'], 200);
        }
    }

    public function deleteRequirementtypes($id)
    {   // Find the requirement type by its ID

        $req_type = RequirementType::find($id);
        $req_type->update(['is_deleted' => true]);
        $req_type->delete();
        return back()->with('success', 'Requirement deleted successfully!'); /**Alert Message */
    }

    //UPDATE REQUIREMENT TYPE
    public function updateRequirementtypes(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
        'title'=>'required|unique:requirement_types',
        'description'=>'max:300',
        'category' => 'required'
    ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;
        $req_type = RequirementType::find($id);
        $req_type->title = $request->input('title');
        $req_type->description = $request->input('description');
        $req_type->category_id = $request->input('category');
        $req_type->updated_by = $userId;

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $req_type->save();
            return response()->json(['success' => true, 'message' => 'Requirement Type updated successfully.'], 200);
        }
    }

    public function restore(Request $request)
    {   $deleted_types = $request->input('deleted_reqs');

        if ($deleted_types != null)
        {
            foreach( $deleted_types as $req_id ) {

                $req_type = RequirementType::withTrashed()->findOrFail($req_id);
                $req_type->update(['is_deleted' => false]);
                $req_type->restore();
            }
            return back()->with('success', 'Requirement Type restored successfully!'); /**Alert Message */
        }
        else{
            return back()->with('error', "You didn't selected any of the records to restore!"); /**Alert Message */
        }
    }

        //HARD DELETE Requiremnts
        public function destroy($id)
        {   // Find the role by its ID
            $req_type = RequirementType::withTrashed()->findOrFail($id);
            $req_type->forceDelete();

            return back()->with('success', 'Requirement Type permanently deleted successfully!'); /**Alert Message */

        }

}

