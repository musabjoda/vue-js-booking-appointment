<?php

namespace App\Http\Controllers;

use App\ExpertDetails;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
class ExpertDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // $current = new Carbon;
        // $user=User::all();
        // dd([$user->timezone$current->timezone('Africa/Khartoum')]);
        
        $expert = ExpertDetails::with('user')->get();
        
        return response(['data' => $expert]);
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
        
        // $featured = $request->image;
        // $featured_new_name = time().$featured->getClientOriginalName();
        // $featured->move('uploads/profile',$featured_new_name);

        $expert_detail = ExpertDetails::create($request->all());
        return response()->json($expert_detail, 200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpertDetails  $expertDetails
     * @return \Illuminate\Http\Response
     */
    public function show(ExpertDetails $expert_detail)
    {
                

        $show_expert=ExpertDetails::with('user')->where('id', $expert_detail)->first();
        //  dd($expert_detail->work_from);
        
          return ['data' => $show_expert];
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpertDetails  $expertDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpertDetails $expertDetails)
    {
        return $expertDetails;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpertDetails  $expertDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpertDetails $expertDetails)
    {
        $expert_update=$expertDetails->update($request->all());
        return $expertDetails;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpertDetails  $expertDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpertDetails $expertDetails)
    {
        //
        $expertDetails->delete();
        return resopnse()->json('deleted Successfully');
    }
}
