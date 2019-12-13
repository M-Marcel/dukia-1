<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Role;
use App\Location;
use App\Box;

class boxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        switch(auth()->user()->role_id){
            // case '1': return view('admin.index');
            // break;

            // case '2': return view('admin.index');
            // break;

            // case '3': return view('admin.index');
            // break;

            // case '4': return view('operator.index');
            // break;

            case '5': return view('vault.index');
            break;

            case '6': return view('payer.index');
            break;            

            case '7': return view('logistics.index');
            break;

            case '8': return view('process.index');
            break;

            case '9': return view('equip.index');
            break;  

            case '10': return view('lab.index');
            break; 
            
            case '11': return view('loan.index');
            break;  

            // default: return view('welcome');
            // break;
        }
        
        // $allbox = Box::count();
        // $actbox = Box::where('status','=','active')->count();
        // $usedbox = Box::where('status','=','used')->count();
        // $trashbox = Box::where('status','=','trash')->count();
        
        $allbox = Box::orderBy('id')->join('location', 'box.location_id','=','location.id') ->select('box.*','location.id')->where('box.location_id','=', auth()->user()->location_id)->count();
        $actbox = Box::orderBy('id')->join('location', 'box.location_id','=','location.id') ->select('box.*','location.id')->where('box.location_id','=', auth()->user()->location_id)->where('box.status','=','active')->count();
        $usedbox = Box::orderBy('id')->join('location', 'box.location_id','=','location.id') ->select('box.*','location.id')->where('box.location_id','=', auth()->user()->location_id)->where('box.status','=','used')->count();
        $trashbox = Box::orderBy('id')->join('location', 'box.location_id','=','location.id') ->select('box.*','location.id')->where('box.location_id','=', auth()->user()->location_id)->where('box.status','=','trash')->count();


        $location = auth()->user()->location_id;
        $admin = Location::orderBy('id')->select('location.*')->paginate();
        $box = new Box;
        $boxs = $box::orderBy('id') ->join('location', 'box.location_id','=','location.id')                       
                                    ->select('box.*', 'location_name')
                                    // ->where('box.location_id', '=',  $location)
                                    ->paginate();
                                    return view('operator.box', ['data'=> $boxs, 'admi'=> $admin, 'count1'=> $allbox, 'count2'=> $actbox, 'count3'=> $usedbox, 'count4'=> $trashbox]);
       
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

    public function print()
    {
        $boxs = Box::all();                                
        return view('operator.printbox')->with('data', $boxs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addbox = new Box;
        $word = "dclnorbx".$request -> input('name').date('sdmy');
        $cot= str_shuffle(substr($word, 0, 18));
        $addbox -> box_id = $cot;
        $addbox -> location_id = $request -> input('location_id');
        $addbox -> user_id = $request -> input('user_id');
        $addbox -> description = $request -> input('location_name');           
            
                $addbox->save();
                if($addbox->save()){
                    return redirect('/box')->with('success', 'Saved Successfully');
                }
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
        $update = Box::find($id); 

        if($update -> status == 'active'){
            $update -> status = 'suspended';
        } else{ $update -> status = 'active'; } 
       
        $update->save();
        if($update->save()){
            return redirect('/box')->with('success', 'Saved Successfully');
        }
 
    }

    public function updatebox(Request $request)
    {
        $updatebox = Box::find($request-> input('id'));
        $updatebox -> box_id =  $request -> input('box_id');
        $updatebox -> location_id = $request -> input('location_id');
        $updatebox -> description = $request -> input('box_info');     
       
        $updatebox->save();
        if($updatebox->save()){
            return redirect('/box')->with('success', 'Saved Successfully');
        }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = box::find($id);
        $delete ->delete();
       return redirect('/box');
    }
}
