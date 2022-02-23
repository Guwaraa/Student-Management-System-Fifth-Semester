<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\notice;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $detail = new notice();
        $image = $request->get('image');
        $name = $request->get('name');
        $public = $request->get('select');
        $title = $request->get('title');
        $notice = $request->get('notice');
        $semester = $request->get('selectsemester');
        $detail->name = $name;
        $detail->semester = $public;
        $detail->title = $title;
        $detail->notice = $notice;
        $detail->image = $image;
        if ($public == "semester") {
            foreach ($semester as $data) {
                $detail = new notice();
                $detail->name = $name;
                $detail->semester = $public;
                $detail->title = $title;
                $detail->notice = $notice;
                $detail->image = $image;
                $detail->semester = $data;
                $detail->save();
            }
        } else {
            $detail->save();
        }
        return redirect()->route('homepage');
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
