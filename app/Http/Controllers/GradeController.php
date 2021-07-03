<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeRequest;
use App\Models\Grade;
use App\Models\Level;
use Illuminate\Http\Request;

class GradeController extends Controller
{

  public function index()
  {
    $data['grades'] = Grade::all();
    $data['levels'] = Level::all();
    return view('grade.index', $data);
  }


  public function store(StoreGradeRequest $request)
  {

    $grade_records = $request->List_Classes;

    try {

      foreach ($grade_records as $key => $record) {
        $grade = new Grade();
        $grade->name = ['en' => $record['name_en'], 'ar' => $record['name_ar']];
        $grade->level_id = $record['level_id'];
        $grade->save();
      }

      toastr()->success(__('messages.success_save'));
      return redirect(route('grade.index'));
    } catch (\Throwable $e) {

      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }


  public function update(StoreGradeRequest $request)
  {
    try {

      $validated = $request->validated();

      $grade = Grade::findOrFail($request->id);
      $grade->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
      $grade->level_id = $request->level_id;
      $grade->save();

      toastr()->success(__('messages.success_edit'));
      return redirect(route('grade.index'));
    } catch (\Throwable $e) {

      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }


  public function destroy(Request $request)
  {
    // dd($request);
    try {
      $grade = Grade::findOrFail($request->id);
      $grade->delete();

      toastr()->success(__('messages.success_delete'));
      return redirect(route('grade.index'));
    } catch (\Throwable $e) {

      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  public function DeleteSelected(Request $request)
  {
    $selected_items = explode(',', $request->delete_selected_items);
    Grade::whereIn('id', $selected_items)->delete();
    toastr()->success(__('messages.success_delete'));
    return redirect(route('grade.index'));
  }


  public function FilterResults(Request $request)
  {
    // return $request;
    $data['levels'] = Level::all();
    $data['selected_level'] = $request->level_id;
    $search = Grade::select('*')->where('level_id', '=', $request->level_id)->get();
    // return $data;
    return view('grade.index', $data)->withDetails($search);
  }
}
