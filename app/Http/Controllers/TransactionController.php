<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use DB;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Models\Transaction::join('transaction_detail', 'transaction.id', '=','transaction_detail.transaction_id')
                ->select(['transaction.*','transaction_detail.trans_name', 
                          'transaction_detail.total', 'transaction_detail.category_type', 
                          'transaction_detail.id as detail_id' ]);
        
        if($request->date_paid1 && $request->date_paid2){
            $data=$data->whereBetween('date_paid', [$request->date_paid1, $request->date_paid2]);
        }

        if($request->category_type){
            $data= $data->where('category_type', $request->category_type);
        }

        if($request->search){
            $data= $data->where('transaction_detail.trans_name','LIKE', '%'.$request->search.'%');
        }
        $data = $data->orderBy('transaction.id', 'asc')
                     ->orderBy('transaction_detail.trans_name', 'asc');
        
        $perPage = $request->perPage ?? 10; 
        
        $data = $data->paginate($perPage);    

        $date = Carbon::now();
        
        return view('test2.transaction.view', compact('data'))->with('date', $date)->with('perPage', $perPage);
    }


    public function list(Request $request)
    {
        $data = Models\Transaction::join('transaction_detail', 'transaction.id', '=','transaction_detail.transaction_id')
                ->select(['transaction.*','transaction_detail.trans_name', 
                          'transaction_detail.total', 'transaction_detail.category_type' ]);


        if($request->date_paid1 && $request->date_paid2){
            $data=$data->whereBetween('date_paid', [$request->date_paid1, $request->date_paid2]);
        }

        if($request->category_type){
            $data= $data->where('category_type', $request->category_type);
        }

        if($request->search){
            $data= $data->where('transaction_detail.trans_name','LIKE', '%'.$request->search.'%');
        }
        
        $perPage = $request->perPage ?? 10; 
        
        $data = $data->paginate($perPage); 

        $date = Carbon::now();

        return view('test2.transaction.list', compact('data'))->with('date', $date)->with('perPage', $perPage);
    }

    public function recap(Request $request)
    {
        $data = Models\Transaction::join('transaction_detail', 'transaction.id', '=','transaction_detail.transaction_id')
                ->select(['transaction.date_paid','transaction_detail.category_type', \DB::RAW('Sum(total) as total') ]);
        
        if($request->date_paid1 && $request->date_paid2){
            $data=$data->whereBetween('date_paid', [$request->date_paid1, $request->date_paid2]);
        }

        if($request->category_type){
            $data= $data->where('category_type', $request->category_type);
        }

        if($request->search){
            $data= $data->where('transaction_detail.trans_name','LIKE', '%'.$request->search.'%');
        }
        
        $data = $data->groupBy(['transaction.date_paid', 'transaction_detail.category_type']); 

        $perPage = $request->perPage ?? 10; 
        
        $data = $data->paginate($perPage);  

        $date = Carbon::now();
        return view('test2.transaction.recap', compact('data'))->with('date', $date)->with('perPage', $perPage);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test2.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            
            $validatedData = $request->validate([
                'description' => 'required',
                'rate_euro' => 'required|numeric',
                'code' => 'required',
                'date_paid' => 'required',
                ]);

            DB::beginTransaction();
                
            $transaction = new Models\Transaction;
            $transaction->description = $request->description;
            $transaction->code = $request->code;
            $transaction->rate_euro = $request->rate_euro;
            $transaction->date_paid = $request->date_paid;
            $transaction->save();
           
            if($request->data1){
                foreach ($request->data1 as $item) {
                    $item = (object) $item;
                    if($item->name && $item->value){
                        $trans = Models\Transaction::find($transaction->id);
                        $data = array(
                            "transaction_id" => $trans->id,
                            "category_type" => $request->category_type1,
                            "trans_name" => $item->name,
                            "total" => $item->value
                        );

                        $trans->detail()->create($data);
                        
                    }
                }
            }
    
            if($request->data2){
                foreach ($request->data2 as $item) {
                    $item = (object) $item;
                    if($item->name && $item->value){
                        $trans = Models\Transaction::find($transaction->id);
                        $data = array(
                            "transaction_id" => $trans->id,
                            "category_type" => $request->category_type2,
                            "trans_name" => $item->name,
                            "total" => $item->value
                        );

                        $trans->detail()->create($data);
                    }
                }            
            }  

            DB::commit();
           
        } catch (\Exception $e) {
             DB::rollback();
             \Log::info($e->getMessage());
             dd($e);
             return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

        return redirect('/trans/view')->with('success','Data is successfully saved');
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
        $data = Models\Transaction::with('detail')->find($id);
        
        return view('test2.transaction.edit', compact('data'));
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
        try {
            // dd($request);
            $validatedData = $request->validate([
                'description' => 'required',
                'rate_euro' => 'required|numeric',
                'code' => 'required',
                'date_paid' => 'required',
            ]);

            DB::beginTransaction();

            $transaction = Models\Transaction::find($id);
            $transaction->description = $request->description;
            $transaction->code = $request->code;
            $transaction->rate_euro = $request->rate_euro;
            $transaction->date_paid = $request->date_paid;
            $transaction->save();
    
            
            if($request->data1){
                foreach ($request->data1 as $item) {
                    $item = (object) $item;
                    if($item->name && $item->value){
                        $trans = Models\Transaction::find($transaction->id);
                        
                        $detail_id = array(
                            "id" => ($item->id) ? $item->id : null,
                        );

                        $data = array(
                            "transaction_id" => $trans->id,
                            "category_type" => $request->category_type1,
                            "trans_name" => $item->name,
                            "total" => $item->value
                        );

                        $trans->detail()->updateOrCreate($detail_id, $data);
                    }
                }
            }
    
            if($request->data2){
                foreach ($request->data2 as $item) {
                    $item = (object) $item;
                    if($item->name && $item->value){
                        $trans = Models\Transaction::find($transaction->id);
                        
                        $detail_id = array(
                            "id" => ($item->id) ? $item->id : null,
                        );

                        $data = array(
                            "transaction_id" => $trans->id,
                            "category_type" => $request->category_type2,
                            "trans_name" => $item->name,
                            "total" => $item->value
                        );

                        $trans->detail()->updateOrCreate($detail_id, $data);
                    }
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
       
        return redirect('/trans/view')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $idtrs = null;
    
            $detail= Models\TransactionDetail::find($id);
            
            if($detail){
                $idtrs = $detail->transaction_id;
            }
            $detail->delete();
    
            $data = Models\TransactionDetail::where('transaction_id', $idtrs)->first();
            if(!$data){
                $header = Models\Transaction::find($idtrs);
                $header->delete();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

        return redirect('/trans/view')->with('success', 'Data is successfully deleted');
    }
}
