<?php

namespace App\Http\Controllers;
use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    
    public function vaoFormReview($order_item_id) {
        
        $orderItem = OrderItem::find($order_item_id);
        // dd($orderItem,$order_item_id);
        return view('user.review.review',compact('orderItem','order_item_id'));//ở cái view này nó phải khớp từng centimet
        //cái form add của ông nó đang nằm ở folder user phải ko
        //thì user là tên foler, review là tên file review.blade.php 
        // ok chưa, ủa khoan ông, cái user\review là sao vậy ông
        //tự đặt chớ sao :v chớ đâu ra ông kaka, ý tui là sao nó lại là user\review mà k phải là user xong file review ấy ông
        //ví dụ như fb của ông, fb.com/Quang 
        //thì cái Quang là mình tự đặt
        //ở route nó là " / " còn ở controller nó là " . " 
        //"." là chỉ tới chỗ mà nó nằm á 
        // tui hơi rối, chưa hiểu lắm, nhưng tạm vậy, có gì tui làm, với làm delete với view, điều hướng sai, có gì mai ông chỉnh dùm nhé
        //ok, cái route là điều hướng web
        //controller điều hướng file 
        //nhớ mấy cái ->name('') thg video nó đặt đâu thi ghi vào kẻo sai 
        //oke ông, mình thử test cái add xem được k nha
        //OK:v

    }

     public $order_item_id;
    public $rating;
    public $comment;

    public function mount($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }


    public function addReview(Request $request)
    {   
        $request->validate([
            'rating' => 'required',
            'comment' => 'required'
        ]);
        
        
        $review = new Review();
        $review->rating = $request->input('rating');
        $review->comment = $request->input('comment');
        $review->order_item_id= $request->input('order_item_id');
        
        $review->save();
        

        $orderItem = OrderItem::find($request->input('order_item_id')) ;
        $orderItem->rstatus = true;
        $orderItem->save();
        session()->flash('message','Your review has been added successfully');
        return redirect('/shop');
    }
}
