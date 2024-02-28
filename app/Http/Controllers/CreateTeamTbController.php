<?php

namespace App\Http\Controllers;

use App\Models\create_department_tb;
use App\Models\create_team_tb;
use Illuminate\Http\Request;

class CreateTeamTbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = create_team_tb::with('department')->orderBy('team_id', 'desc')->get();
        $departments = create_department_tb::orderBy('department_id', 'desc')->get();
        return view('team.list_team', compact('teams','departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'team_id' => 'required',
            'team_name' => 'required',
            'department_id' => 'required',
        ]);

        create_team_tb::create($request->post());

        $teams = create_team_tb::with('department')->orderBy('team_id', 'desc')->get();
        $departments = create_department_tb::orderBy('department_id', 'desc')->get();


        return view('team.list_team', compact('teams', 'departments'))->with('success', 'Team has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(create_team_tb $create_team_tb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(create_team_tb $create_team_tb)
    {
        $departments = create_department_tb::orderBy('department_id', 'desc')->get();

        return view('team.edit',compact('create_team_tb','departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, create_team_tb $create_team_tb)
    {
        $request->validate([
            'team_id' => 'required',
            'team_name' => 'required',
            'department_id' => 'required',
        ]);
        
        $create_team_tb->fill($request->post())->save();

        $teams = create_team_tb::with('department')->orderBy('team_id', 'desc')->get();
        $departments = create_department_tb::orderBy('department_id', 'desc')->get();


        return view('team.list_team', compact('teams', 'departments'))->with('success', 'Team has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(create_team_tb $create_team_tb)
{
    try {
        $create_team_tb->delete();

        $teams = create_team_tb::with('department')->orderBy('team_id', 'desc')->get();
        $departments = create_department_tb::orderBy('department_id', 'desc')->get();

        return redirect()->route('list-team.index')->with(compact('teams', 'departments'))->with('success', 'Đội đã được xóa thành công.');
    } catch (\Exception $e) {
        return redirect()->route('list-team.index')->with('error', 'Đã xảy ra lỗi khi xóa đội.');
    }
}


}
