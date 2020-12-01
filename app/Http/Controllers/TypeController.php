<?php

namespace App\Http\Controllers;

use Request;
use App\Type;
use DB;
class TypeController extends Controller
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
        $type = DB::table('CONST_TYPE')->orderby('type_id')->get();
        return view('type')->with(['type'=>$type]);
    }
    public function store()
    {
        $type = new Type;
        $type->type_name = Request::input('type_name');
        $type->save();
        return Redirect('type');
    }

    public function update(Request $request)
    {
        $method = DB::table('CONST_TYPE')
            ->where('type_id', Request::input('type_id'))
            ->update(['type_name' => Request::input('type_name')]);
        return Redirect('type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Type::where('type_id', '=', $id)->delete();
        return Redirect('type');
    }
}
