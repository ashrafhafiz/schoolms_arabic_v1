<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionRequest;
use App\Models\Grade;
use App\Models\Level;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    public function index()
    {
        $data['levels'] = Level::all();
        $data['grades'] = Grade::all();
        $data['sections'] = Section::all();
        $data['teachers'] = Teacher::all();
        return view('section.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(StoreSectionRequest $request)
    {
        // return $request;

        try {

            $validated = $request->validated();

            $section = new Section();
            $section->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            // $section->level_id = $request->level_id;
            $section->grade_id = $request->grade_id;
            $section->status = 1;
            $section->save();

            $section->teachers()->attach($request->teacher_id);

            toastr()->success(__('messages.success_save'));
            return redirect()->route('section.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(StoreSectionRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $section = Section::findOrFail($request->id);

            $section->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            // $section->level_id = $request->level_id;
            $section->grade_id = $request->grade_id;

            if (isset($request->status)) {
                $section->status = 1;
            } else {
                $section->status = 0;
            }

            // Update pivot table sections_teachers_table
            if (isset($request->teacher_id)) {
                $section->teachers()->sync($request->teacher_id);
            } else {
                $section->teachers()->sync(array());
            }

            $section->save();
            toastr()->success(__('messages.success_edit'));

            return redirect()->route('section.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        Section::findOrFail($request->id)->delete();

        $records = DB::table('teachers_sections')->where('section_id', $request->id)->get();

        if (!empty($records)) {
            DB::table('teachers_sections')->where('section_id', $request->id)->delete();
        }

        toastr()->success(__('messages.success_delete'));
        return redirect()->route('section.index');
    }

    public function GradesPerLevel($level_id)
    {
        // $gardesperlevel = Level::with(['grades'])->find($level_id)->grades->pluck('name');
        $gardesperlevel = Grade::where('level_id', $level_id)->pluck('name', 'id');

        return $gardesperlevel;
    }

    public function SectionsPerGrade($grade_id)
    {
        // $sectionspergrade = Grade::with(['sections'])->find($grade_id)->sections->pluck('name');
        $sectionspergrade = Section::where('grade_id', $grade_id)->pluck('name', 'id');

        return $sectionspergrade;
    }
}
