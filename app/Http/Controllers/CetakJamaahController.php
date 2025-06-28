<?php


namespace App\Http\Controllers;

use App\Models\PendaftaranHaji;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakJamaahController extends Controller
{
    public function cetakPDF()
    {
        $data = PendaftaranHaji::all();
        foreach ($data as $datas) {
            # code...
            // dd($datas);
        }
        $pdf = Pdf::loadView('myPDF', ['data' => $data]);
        return $pdf->download('Pendaftaran_haji.pdf');
    }

    public function cetak_jamaah_by_id($id)
    {
        $data_jamaah = PendaftaranHaji::where('id', '=', $id)->first();
        // dd($data_jamaah);
        $pdf = Pdf::loadView('cetak', ['data' => $data_jamaah]);
        return $pdf->stream('Pendaftaran_haji_by_user.pdf');
    }
}
