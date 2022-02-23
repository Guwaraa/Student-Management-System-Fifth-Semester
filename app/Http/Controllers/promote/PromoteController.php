<?php

namespace App\Http\Controllers\promote;

use App\Http\Controllers\Controller;
use App\Models\studentdetail;
use App\Models\User;
use Illuminate\Http\Request;

class PromoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.promote.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semester=$request->get('semester');
        $changesemester=$request->get('changesemester');
        $detail=studentdetail::get();

        foreach($detail as $data)
        {
            if($data->Semester==$semester)
            {
                $newdata=studentdetail::find($data->id);
                $newdata->Semester=$changesemester;
                $newdata->save();
            }
        }
        $detail=User::get();

        foreach($detail as $data)
        {
            if($data->Semester==$semester)
            {
                $newdata=User::find($data->id);
                $newdata->Semester=$changesemester;
                $newdata->save();
            }
        }
        return redirect()->back();

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
