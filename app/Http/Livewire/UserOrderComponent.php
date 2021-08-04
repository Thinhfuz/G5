<?php

namespace App\Http\Livewire;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrderComponent extends Component
{
    
    public function render()
    {
        //User
        $orders = Order::where('user_id', Auth::user()->id)->paginate(12);
        //dd($orders);
        //$orders = Order::orderBy('created_at', 'DESC')->paginate(12);
        return view('livewire.user-order-component', ['orders'=>$orders])->layout('layouts.base');
    }
}
