<?php

namespace App\Http\Livewire;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class UserOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id) {
        $this->order_id = $order_id;
    }

    public function render()
    {
        //User:
        $order = Order::where('user_id', Auth::user()->id)->where('id', $this->order_id)->first();
        //dd($order);
        //$order = Order::where('id', $this->order_id)->first();
        return view('livewire.user-order-details-component', ['order'=>$order])->layout('layouts.base');
    }
}
