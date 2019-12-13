<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Admin;
use App\Role;
use App\Location;
use App\Transaction;
use App\System_settings;
use App\Invoice;

class transactionController extends Controller
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

        $allbox = Transaction::orderBy('id')->join('location', 'transaction.location_id','=','location.id') ->select('transaction.*','location.id')->where('transaction.location_id','=', auth()->user()->location_id)->count();
        $actbox = Transaction::orderBy('id')->join('location', 'transaction.location_id','=','location.id') ->select('transaction.*','location.id')->where('transaction.location_id','=', auth()->user()->location_id)->where('transaction.status','=','open')->count();
        $usedbox = Transaction::orderBy('id')->join('location', 'transaction.location_id','=','location.id') ->select('transaction.*','location.id')->where('transaction.location_id','=', auth()->user()->location_id)->where('transaction.status','=','cost')->count();
        $trashbox = Transaction::orderBy('id')->join('location', 'transaction.location_id','=','location.id') ->select('transaction.*','location.id')->where('transaction.location_id','=', auth()->user()->location_id)->where('transaction.status','=','close')->count();
       
        $admin = Admin::orderBy('id')->select('admins.*')
                                    ->where('admins.role_id', '=', '2')
                                    ->get();
        $transaction = new Transaction;
        $transactions = $transaction::orderBy('id')->join('users', 'transaction.user_id','=','users.id')  
                                    ->join('box', 'transaction.box_id','=','box.box_id')                         
                                    ->select('transaction.*','users.first_name', 'users.last_name','users.user_id','users.email','users.phoneno','box.box_id','box.status AS box_status')
                                    ->get();
                                    return view('operator.transaction', ['data'=> $transactions, 'admi'=> $admin, 'count1'=> $allbox, 'count2'=> $actbox, 'count3'=> $usedbox, 'count4'=> $trashbox]);
       
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
        $addtransaction = new Location;
        // $word = "aztm".date('sdmy');
        // $cot= str_shuffle(substr($word, 0, 8));
        $addtransaction -> location_name = $request -> input('name');
        $addtransaction -> address = $request -> input('address');
        $addtransaction -> contact_no = $request -> input('contact');
        $addtransaction -> contact_email = $request -> input('email');
        $addtransaction -> admin_id = $request -> input('admin_id');
            
                $addtransaction->save();
                if($addtransaction->save()){
                    return redirect('/transaction')->with('success', 'Saved Successfully');
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showinvoice($id)
    {
        return view('buyer.invoice');
    }

    public function userApproved($id)
    {

        $updatexrf2 = Transaction::find($id);        
        $updatexrf2 -> status = 'proceed';

        $updatexrf2->save();
        // $addinvoice2->save();

        return redirect('/transaction');
          
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $editpresenter = Presenters::find($id);
        // $role = Role::all();
        // $cat = Category::all();
        // return view('users.edit-People')-> with('data', $editpresenter)->with('dat', $role)->with('cdata', $cat);

        $admin = Admin::orderBy('id')->select('admins.*')
                                    ->where('admins.role_id', '=', '2')
                                    ->paginate();

        $admin_value = System_settings::all();                 
        $transaction = new Transaction;
        $transactions = $transaction::orderBy('id')->join('users', 'transaction.user_id','=','users.id')  
                                    ->join('box', 'transaction.box_id','=','box.box_id')
                                    ->join('location', 'box.location_id','=','location.id')                         
                                    ->select('transaction.*','users.first_name', 'users.last_name', 'location.location_name','users.user_id','users.email','users.phoneno','box.box_id','box.location_id','box.status AS box_status')
                                    ->where('transaction.id', '=', $id)
                                    ->get();
                                    // echo $admin_value;
                                    return view('operator.xrf', ['data'=> $transactions, 'admi'=> $admin, 'value' => $admin_value]);
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
        $update = Location::find($id); 

        if($update -> status == 'active'){
            $update -> status = 'suspended';
        } else{ $update -> status = 'active'; } 
       
        $update->save();
        if($update->save()){
            return redirect('/transaction')->with('success', 'Saved Successfully');
        }
 
    }

    public function updatexrf(Request $request )
    {
        $id= $request-> input('id');
        $date = Carbon::now();  
        $date2= $date->toDateString();
        $time2= $date->toTimeString();

        $addinvoice = new Invoice;        
        $addinvoice -> transaction_id = $request -> input('id');
        $addinvoice -> inv_date = $date->toDateString();
        $addinvoice -> inv_time = $date->toTimeString();
        $addinvoice -> description = $request -> input('note');

        $updatexrf = Transaction::find($request-> input('id'));
        $updatexrf -> xrf_value = $request -> input('xrfvalue');
        $updatexrf -> karate = $request -> input('karate');
        $updatexrf -> status = 'cost';
        $updatexrf -> cost = $request -> input('name');        
        
        $updatexrf->save();
        $addinvoice->save();

        $t_invoice = Invoice::orderBy('id')->select('invoice.*')->where('invoice.transaction_id', '=', $id)->get(); 
        $update = Location::all(); 
        $transactions = Transaction::orderBy('id')->join('users', 'transaction.user_id','=','users.id')  
        ->join('box', 'transaction.box_id','=','box.box_id')                         
        ->select('transaction.*','users.first_name', 'users.last_name','users.user_id','users.email','users.phoneno', 'users.bank_name','box.box_id','box.location_id','box.status AS box_status')
        ->where('transaction.id', '=', $id)
        ->get();

        if( $updatexrf->save()){    

            return view('operator.invoice', ['data'=> $transactions, 'location'=> $update, 'invoice'=>$t_invoice, 'dat'=> $date2, 'tim'=>$time2 ]);
        }else {
            return 'non';
        }
 
    }

    public function printInvoice($id)
    {
        $t_invoice = Invoice::orderBy('id')->select('invoice.*')->where('transaction_id', '=', $id)->get(); 
        $update = Location::all(); 
        $transactions = Transaction::orderBy('id')->join('users', 'transaction.user_id','=','users.id')  
        ->join('box', 'transaction.box_id','=','box.box_id')                         
        ->select('transaction.*','users.first_name', 'users.last_name','users.user_id','users.email','users.phoneno', 'users.bank_name','box.box_id','box.location_id','box.status AS box_status')
        ->where('transaction.id', '=', $id)
        ->get();

        return view('operator.invoice', ['data'=> $transactions, 'location'=> $update, 'invoice'=> $t_invoice]);
    }

    public function payer1($id)
    {

        $updatexrf2 = Transaction::find($id);        
        $updatexrf2 -> status = 'proceed';

        $updatexrf2->save();
        // $addinvoice2->save();

        return redirect('/transaction');
          
    }

    public function payer2($id)
    {

        $updatexrf2 = Transaction::find($id);        
        $updatexrf2 -> status = 'proceed';

        $updatexrf2->save();
        // $addinvoice2->save();

        return redirect('/transaction');
          
    }

    public function payer3($id)
    {

        $updatexrf2 = Transaction::find($id);        
        $updatexrf2 -> status = 'proceed';

        $updatexrf2->save();
        // $addinvoice2->save();

        return redirect('/transaction');
          
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = transaction::find($id);
        $delete ->delete();
       return redirect('/transaction');
    }
}
