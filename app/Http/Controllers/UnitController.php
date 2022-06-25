<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Grade;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, Subject $subject, Grade $grade, Chapter $chapter)
    {
        $subject_id = $request->subject->subject_id;
        $grade_id   = $request->grade->grade_id;
        $chapter_id = $request->chapter->chapter_id;

        $units = Unit::orderBy('unit_id', 'desc')->where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->paginate(10);
        return view('Unit.index', compact('units', 'subject_id', 'grade_id', 'chapter_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($subject_id, $grade_id, $chapter_id)
    {

        return view('Unit.create', compact('subject_id', 'grade_id', 'chapter_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [

            'name' => 'required|min:5|max:50',
            'description' => 'required|min:5|max:240'
        ]);


        $subject_id = $request->subject_id;
        $grade_id   = $request->grade_id;
        $chapter_id = $request->chapter_id;

        $unit = new Unit();
        $unit->name = $request->name;
        $unit->subject_id = $subject_id;
        $unit->chapter_id = $chapter_id;
        $unit->grade_id = $grade_id;
        $unit->description = $request->description;
        $unit->admin_approve = Auth::user()->role == 1 ? 1 : NULL;
        $unit->save();
        if (Auth::user()->role == 1) {
            return redirect()->route('admin.unit.index', [$subject_id, $grade_id, $chapter_id])->with('success', 'Unit created successfully');
        } else {
            return redirect()->route('teacher.unit.index', [$subject_id, $grade_id, $chapter_id])->with('success', 'Unit created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
    }




    /**
     * Unit approve by admin
     * 
     * @param int $unit_id
     * 
     * @return Boolan
     */

    public function unitApproveByAdmin($unit_id)
    {
        $unit = Unit::where('unit_id', $unit_id)->first();
        $unit->admin_approve = 1;
        $unit->save();
        return redirect()->back()->with('success', 'Unit approve successfully');
    }


    /**
     * Unit approve by admin
     * 
     * @param int $unit_id
     * 
     * @return Boolan
     */

    public function unitApproveByTeacher($unit_id)
    {
        $unit = Unit::where('unit_id', $unit_id)->first();
        $total_approve =  explode(",", $unit->teacher_approve);

        if (is_null($unit->teacher_approve)) {
            $unit->teacher_approve = Auth::user()->id;
        } else {
            if (in_array(Auth::user()->id, $total_approve)) {
                return redirect()->back()->with('warning', 'You already approve this unit');
            } else {
                $unit->teacher_approve = $unit->teacher_approve . "," . Auth::user()->id;
            }
        }
        $unit->save();
        return redirect()->back()->with('success', 'You successfully approve this unit');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($unit_id)
    {
        $unit = Unit::where('unit_id', $unit_id)->first();
        $unit->delete();
        return redirect()->back()->with('success', 'Unit deleted successfully');
    }
}
