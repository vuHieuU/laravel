<?php
namespace App\Http\Services;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use App\Models\Product;
use App\Models\customer;
use App\Models\cart;
use DB;
class cartServices{
    public function create($request){
       $qty = (int)$request->input('num_product');
       $product_id = (int)$request->input('product_id');

       if($qty <= 0 || $product_id <= 0){
        Session::flash('error','số lượng không chính xác');
        return false;
       }

    //    Session::forget('carts');

       $carts = Session::get('carts'); 
       if(is_null($carts)){
            Session::put('carts',[
                $product_id => $qty
                ]);
            return true;
        }
        $exists = Arr::exists($carts,$product_id);
        if($exists){
             $carts[$product_id] = $carts[$product_id] + $qty;
             Session::put('carts',$carts);
             return true;
        }
        $carts[$product_id] = $qty;
        Session::put('carts',$carts);
    }
    public function getProduct(){
        $carts = Session::get('carts'); 
        if(is_null($carts)) return [];
        $productId = array_keys($carts);
         return Product::select('id','name','price','price_sale','thumb')
        ->where('active' , 1)
        ->whereIn('id',$productId) 
        ->get();

    }
    public function updateCart($request){
         Session::put('carts',$request->input('num_product'));
         return true;
    }
    public function removeId($id){
        $carts = Session::get('carts');
         unset($carts[$id]);
         
         Session::put('carts',$carts);
         return true;

    }
   public function addCart($request){
        try {
            DB::beginTransaction();
            $carts = Session::get('carts');
            if(is_null($carts)) 
            return false;
            $customer = customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'addess' => $request->input('addess'),
                'email' => $request->input('email'),
                'content' => $request->input('content'),
            ]);
            $this->infoCart($carts,$customer->id);
            DB::commit();
            Session::flash('success','đặt hàng thành công');
            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error','đặt hàng không thành công');
            return false;
        }
        return true;
    }
    protected function infoCart($carts,$customer_id){
        $carts = Session::get('carts');
        $productId = array_keys($carts);
        $Products = Product::select('id','name','price','price_sale','thumb')
       ->where('active' , 1)
       ->whereIn('id',$productId) 
       ->get();

       $data = [];
       foreach ($Products as $item) {
           $data[] = [
            'customer_id' => $customer_id,
            'product_id' =>$item->id,
            'pty'=> $carts[$item->id],
            'price'=>$item->price,
           ];
        }
        return cart::insert($data);
    }
}