<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLevelRequest;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class LevelController extends Controller
{


  public function index()
  {
    $data['levels'] = Level::all();
    return view('level.index', $data);
  }


  public function create()
  {
  }


  public function store(StoreLevelRequest $request)
  {
    // if (Level::where('name->ar', $request->name_ar)->orWhere('name->en', $request->name_en)->exists()) {
    //   return redirect()->back()->withErrors(__('validation.unique'));
    // }

    try {
      $request->validated();

      $level = new Level;

      // $translations = [
      //   'en' => $validated['name_en'],
      //   'ar' => $validated['name_ar'],
      // ];
      // $level->setTranslations('name', $translations);

      $level->name = ['en' => $request->name_en, 'ar' => $request->name_ar];

      if ($request->notes == NULL) {
        $level->notes = 'Record created by: <strong>' . Auth::user()->name . '</strong>, on: ' . Date::now();
      } else {
        $level->notes = $request->notes . '<br>Record created by: <strong>' . Auth::user()->name . '</strong>, on: ' . Date::now();
      }

      $level->save();

      toastr()->success(__('messages.success_save'));
      return redirect(route('level.index'));
    } catch (\Throwable $e) {

      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }


  public function show($id)
  {
  }


  public function edit($id)
  {
  }


  public function update(StoreLevelRequest $request)
  {
    try {
      $level = Level::findOrFail($request->id);

      $validated = $request->validated();

      $level->name = ['en' => $request->name_en, 'ar' => $request->name_ar];

      if ($request->notes == NULL) {
        $level->notes = 'Record updated by: <strong>' . Auth::user()->name . '</strong>, on: ' . Date::now();
      } else {
        $level->notes = $request->notes . '<br>Record updated by: <strong>' . Auth::user()->name . '</strong>, on: ' . Date::now();
      }

      $level->save();

      toastr()->success(__('messages.success_edit'));
      return redirect(route('level.index'));
    } catch (\Throwable $e) {

      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  public function destroy(Request $request)
  {
    try {

      $level = Level::findOrFail($request->id);

      if (count($level->grades) == 0) {
        $level->delete();
        toastr()->success(__('messages.success_delete'));
        return redirect(route('level.index'));
      } else {
        toastr()->error(__('messages.cannot_delete'));
        return redirect(route('level.index'));
      }
    } catch (\Throwable $e) {

      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
}
