<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // public function index()
    // {
    //     return view('dashboard.index', [
    //         'title' => 'Form laporan penjualan'
    //     ]);
    // }

    public function proses(Request $request)
    {
        try {
            $bulan = $request->bulan;
            $tahun = $request->tahun;
            $bulan_transaksi = date('Y-m', strtotime($request->tahun . '-' . $request->bulan));
            $transactionitem = Order::whereHas('cart', function ($q) use ($bulan_transaksi) {
                $q->where('payment_status', 'sudah');
                $q->where('created_at', 'like', $bulan_transaksi . '%');
            })->get();

            return view('dashboard.report.process', [
                'title' => 'Laporan Penjualan',
                'transactionitem' => $transactionitem,
                'bulan' => $this->cetakbulan($bulan),
                'tahun' => $tahun
            ]);
        } catch (Exception $e) {
            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }

        // return response()->json($bulan);
    }

    public function cetakbulan($bulan)
    {
        switch ($bulan) {
            case '1':
                return "Januari";
                break;
            case '2':
                return "Februari";
                break;
            case '3':
                return "Maret";
                break;
            case '4':
                return "April";
                break;
            case '5':
                return "Juni";
                break;
            case '6':
                return "Juli";
                break;
            case '7':
                return "Agustus";
                break;
            case '8':
                return "September";
                break;
            case '10':
                return "Oktober";
                break;
            case '11':
                return "November";
                break;
            case '12':
                return "Desember";
                break;

            default:
                return "";
                break;
        }
    }

    public function generatePDFReport(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $bulan_transaksi = date('Y-m', strtotime($request->tahun . '-' . $request->bulan));
        $transactionitem = Order::whereHas('cart', function ($q) use ($bulan_transaksi) {
            $q->where('payment_status', 'sudah');
            $q->where('created_at', 'like', $bulan_transaksi . '%');
        })->get();

        $data = [
            'transactionitem' => $transactionitem,
            'bulan' => $this->cetakbulan($bulan),
            'tahun' => $tahun
        ];

        $pdf = Pdf::loadView('pdf.laporan', $data)->setOption(['dpi' => 150, 'defaultFont' => 'san-serif']);
        return $pdf->download('Laporan.pdf');
    }
}
