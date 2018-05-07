<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Tanah;
use App\Models\Kasir;
use App\Models\Kredit;
use App\Models\Pembeli;
use App\Models\CartItem;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function cekHistory()
     {
         return view('users/cekHistory');
     }

     public function showHistory(Request $request)
     {
       $cari_k = urldecode($request->input('cari'));
       $trim_cari= trim($cari_k);
       if(!empty($trim_cari))
       {
         $kredit = Kredit::where('id_kredit', $trim_cari)->first();
            if($kredit)
            {
               $total = 0;
               $histories = Kasir::where('kredit_id', $kredit->id )
                                 ->orderBy('created_at','desc')
                                 ->paginate(2);

               foreach ($kredit->cart->cartItems as $i){
                 $total += $i->tanah->harga_kavling;
               }
               return view('users/history',compact(['kredit','total','histories']));
         }else {
           return redirect('/cek-history')->with('status','ID Kredit tidak ada !');
         }
       } else {
         return redirect('/cek-history')->with('status','ID Kredit tidak ada !');
       }
     }
}
