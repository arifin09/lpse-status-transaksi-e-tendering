<?php namespace Bantenprov\StatusTransaksiEtendering\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\StatusTransaksiEtendering\Facades\StatusTransaksiEtendering;

/* Models */
use Bantenprov\StatusTransaksiEtendering\Models\Bantenprov\StatusTransaksiEtendering\StatusTransaksiEtendering as StatusTransaksiEtendering;
use Bantenprov\StatusTransaksiEtendering\Models\Bantenprov\StatusTransaksiEtendering\Province;
use Bantenprov\StatusTransaksiEtendering\Models\Bantenprov\StatusTransaksiEtendering\Regency;

/* etc */
use Validator;

/**
 * The StatusTransaksiEtenderingController class.
 *
 * @package Bantenprov\StatusTransaksiEtendering
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StatusTransaksiEtenderingController extends Controller
{

    protected $province;

    protected $regency;

    protected $lpse_status_transaksi_e_tendering;

    public function __construct(Regency $regency, Province $province, StatusTransaksiEtendering $lpse_status_transaksi_e_tendering)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->lpse_status_transaksi_e_tendering     = $lpse_status_transaksi_e_tendering;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $lpse_status_transaksi_e_tendering = $this->status-transaksi-e-tendering->find($id);

        return response()->json([
            'negara'    => $status-transaksi-e-tendering->negara,
            'province'  => $status-transaksi-e-tendering->getProvince->name,
            'regencies' => $status-transaksi-e-tendering->getRegency->name,
            'tahun'     => $status-transaksi-e-tendering->tahun,
            'data'      => $status-transaksi-e-tendering->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->status-transaksi-e-tendering->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->status-transaksi-e-tendering->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'PDRB '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

