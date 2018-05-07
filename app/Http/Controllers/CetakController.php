<?php

namespace App\Http\Controllers;

use PDF;
use App;
use App\Models\Cart;
use App\Models\Tanah;
use App\Models\Kasir;
use App\Models\Kredit;
use App\Models\Pembeli;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function cetakDashboard()
    {
      $kredits = Kredit::where('status', 2)
                        ->get();

      $pdf = PDF::loadView('report.cetakDashboard', ['kredits'=>$kredits]);
      return $pdf->stream('dashboard.pdf');
    }

    public function cetakKwitansi($id)
    {

      function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
          $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
          $temp = penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
          $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
          $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
          $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
          $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
          $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
          $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
          $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
          $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
        }
        return $temp;
      }

      function terbilang($nilai) {
        if($nilai<0) {
          $hasil = "minus ". trim(penyebut($nilai));
        } else {
          $hasil = trim(penyebut($nilai));
        }
        return $hasil;
      }

      $kasir = Kasir::findorfail($id);
      $kredit = Kredit::findorfail($kasir->kredit_id);
      $perbulan = $kredit->angsuran_perbulan;
      $angka = terbilang($perbulan);

      $pdf = PDF::loadView('report.cetakKwitansi', ['kasir'=>$kasir,'angka'=>$angka,'kredit'=>$kredit], [], ['format' => 'A4']);

      return $pdf->stream('kwitansi.pdf');
    }
}
