<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\ManageBill;
use App\Models\ManageProduct;
use App\Models\ManageTable;
use App\Models\OrderDetail;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
// use TCG\Voyager\Http\Controllers as baseController;
// class BookTableController extends baseController;


class BookTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Category::all();
        $table = ManageTable::where('id', $request->id)->first();
        $order = OrderDetail::join('manage_bills','order_details.order_id','=','manage_bills.id')
        ->join('manage_products','order_details.product_id','=','manage_products.id')
        ->where('manage_bills.id_ban', $request->id)
        ->get()->toArray();
        return view('book_table.book_table', ['data' => $data,'table'=>$table,'order'=>$order]);
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
        $sum= 0;
        $create= [];
        foreach($request->product as $key => $product ){
            $sum = $sum + $product['total'];
        }
        $checkIdBan = ManageBill::where('id_ban',$request->ban_id)->get()->toArray();
        if(empty($checkIdBan)){
            $order = ManageBill::create([
                "user_id" => Auth::id(),
                "id_ban" => $request->ban_id, 
                "total" => $sum,
             ]);
            foreach($request->product as $key => $product ){
                $create[] = [
                    "order_id" => $order->id,
                    "quantyti" =>$product['total'],
                    "product_id" =>$product['id'],
                ]; 
            }
            OrderDetail::insert($create);
            ManageTable::where('id',$order->id_ban)->update(['status'=>1]);
        } else {
            $getTotal = ManageBill::where('id_ban',$request->ban_id)->first();
            $sum = $getTotal->total + $sum;
            $order = ManageBill::where('id_ban',$request->ban_id)->update([
                "total" => $sum,
             ]);
            $allDataOrder = OrderDetail::where('order_id',$getTotal->id)->get()->toArray();
            
            foreach($request->product as $key => $product ){
                $checkIs = true;
                foreach ($allDataOrder as $productOrder){
                    if ($product['id'] == $productOrder['product_id']){
                        $checkIs = false;
                        $quantity = $product['total']+ $productOrder['quantyti'];
                        OrderDetail::where([
                            ['product_id',$productOrder['product_id']],
                            ['order_id',$getTotal->id],
                        ])->update(['quantyti'=> $quantity]);
                    } 
                }
                if($checkIs == true){
                    $create[] = [
                        "order_id" => $getTotal->id,
                        "quantyti" =>$product['total'],
                        "product_id" =>$product['id'],
                    ]; 
                    OrderDetail::insert($create);
                }
            }
        }
         
         return redirect()->route('danhsach',['id' => $request->ban_id]);;
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
        dd($id);
    }

    public function getProduct(Request $request){
        $productId = $request->productId;
        $data = ManageProduct::find($productId);
        return $data;
    }
}
