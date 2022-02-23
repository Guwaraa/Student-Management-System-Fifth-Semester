<?php

namespace App\Http\Controllers\ExamDetail;

use App\Http\Controllers\Controller;
use App\Models\studentdetail;
use App\Models\subjectdetail;
use Illuminate\Http\Request;

class ExamSeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firstyear=array();
        $secondyear=array();
        $thirdyear=array();
        $fourthyear=array();
        for ($i=1; $i<=40 ; $i++) {
            $firstyear[$i-1]=$i;
            $secondyear[$i-1]=$i+40;
            $thirdyear[$i-1]=$i+80;
            $fourthyear[$i-1]=$i+120;


        }
        shuffle($firstyear);
        shuffle($secondyear);
        shuffle($thirdyear);
        shuffle($fourthyear);
        $firstyearcount=0;
        $secondyearcount=0;
        $thirdyearcount=0;
        $fourthyearcount=0;



        return view("admin.examdetail.examseat.index", compact('firstyear','secondyear','thirdyear','fourthyear','firstyearcount','secondyearcount','thirdyearcount','fourthyearcount'));
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
        //
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
