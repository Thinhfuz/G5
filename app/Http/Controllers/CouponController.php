<?php

namespace App\Http\Controllers;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public $expiry_date;

    public function get() {
        $coupons = Coupon::all();
        return view('admin.coupons.coupons', compact('coupons'));
    }

    public function getOnly($id) {
        $coupons = Coupon::find($id)->first();
        return view('admin.coupons.detail', compact('coupons'));
    }

    public function delete($id) {
        $coupons = Coupon::find($id);
        $coupons->delete();
        return redirect('coupons'); 
    } 

    public function create() {
        return view('admin.coupons.add');
    }

    public function createCoupon(Request $request) {
        $request->validate([
            'code' => 'unique:coupons',
            'type' => 'required',
            'value' => 'numeric',
            'cart_value' => 'numeric',
            'expiry_date' => 'required'
        ]);
        
        $coupon = new Coupon();
        $coupon->code = $request->input('code');
        $coupon->type = $request->input('type');
        $coupon->value = $request->input('value');
        $coupon->cart_value = $request->input('cart_value');
        $coupon->expiry_date = $request->input('expiry_date');
        $coupon->save();
        
        $request->session()->flash('message', 'Coupon has been created successfully!');

        return redirect('coupons');
    }

    public function edit($id) {
        $coupons = Coupon::find($id);
        return view('admin.coupons.edit', compact('coupons'));
    }

    public function editCoupon(Request $request, $id) {
        $request->validate([
            'code' => 'required',
            'type' => 'required',
            'value' => 'numeric',
            'cart_value' => 'numeric',
            'expiry_date' => 'required'
        ]);
        
        $coupon = Coupon::find($id);
        $coupon->code = $request->input('code');
        $coupon->type = $request->input('type');
        $coupon->value = $request->input('value');
        $coupon->cart_value = $request->input('cart_value');
        $coupon->expiry_date = $request->input('expiry_date');
        $coupon->exists = true;
        $coupon->save();
        $request->session()->flash('message', 'Coupon has been updated successfully!');
        
        return redirect('coupons');
    }
}
