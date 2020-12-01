<?php

namespace App\Http\Controllers;

use Request;
use App\Owner;
use DB;
class OwnerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $owner = DB::table('const_owner')->orderby('owner_id')->get();
        return view('owner')->with(['owner'=>$owner]);
    }
    public function store()
    {
        $owner = new Owner;
        $owner->owner_name = Request::input('owner_name');
        $owner->save();
        return Redirect('owner');
    }

    public function update(Request $request)
    {
        $owner = DB::table('CONST_OWNER')
            ->where('owner_id', Request::input('owner_id'))
            ->update(['owner_name' => Request::input('owner_name')]);
        return Redirect('owner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Owner::where('owner_id', '=', $id)->delete();
        return Redirect('owner');
    }
}
