<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class PDFController extends Controller
{
        /**

     * Write code on Method

     *

     * @return response()

     */

    public function index()

    {
        $surat = ((Surat::where('pasien_id', auth()->user()->id)->get())->last())->toArray();
        $surat["email"] = "farhantsyh@icloud.com";
        $surat["title"] = "Pembuatan Surat Rujukan";

        $pdf = PDF::loadView('pdf', $surat);

        Mail::send('pdf', $surat, function($message)use($surat, $pdf) {
            $name = "Surat_Rujukan".uniqid();
            $message->to($surat["email"], $surat["email"])

                    ->subject($surat["title"])

                    ->attachData($pdf->output(), $name.".pdf");

        });

        return redirect('/unduh-surat')->with('success', 'Email sent successfully!');

    }
}
