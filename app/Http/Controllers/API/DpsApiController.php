<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Controllers\Api\QueryFilters\DpsQueryFilter;
use App\User;
use App\Role;
use App\DpsList;
use Illuminate\Support\Facades\Validator;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
Use Redirect;

class DpsApiController extends BaseApiController
{
    public function index()
    {
        return User::all();
    }


    public function dpsDatatable(Request $request)
    {
        $dpsQueryFilter = new DpsQueryFilter($request->all());
        $dpsQuery = DpsList::orderBy('id', 'ASC');
        if ($dpsQueryFilter->get_search_text() != null) {
            $dpsQuery = $dpsQuery->where("nama", "like", "%" . $dpsQueryFilter->get_search_text() . "%");
        }
        $count = (clone $dpsQuery)->count();
        $result = $dpsQuery->limit($dpsQueryFilter->get_length())->offset($dpsQueryFilter->get_start());
        $data_get = $result->get();
        $data = $this->set_datatable_response($dpsQueryFilter->get_draw(), $count, $result->get());
        return $this->success_response_datatable();
    }

    public function createOrUpdate(Request $request){
        $ruleUser = [
            'nkk' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'tempat_lahir'=> 'required',
            'tgl_lahir' => 'required',
            'kawin' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'difabel' => 'required',
            'sumberdata' => 'required',
            'tps' => 'required'
        ];
        $validator = Validator::make($request->all(), $ruleUser);

        if($validator->fails()){
            return response($validator->messages()->toArray(), 400);
        }
        $data = [
            'nkk' => $request->nkk,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir'=> $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'kawin' => $request->kawin,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'difabel' => $request->difabel,
            'sumberdata' => $request->sumberdata,
            'tps' => $request->tps,
        ];

        if($request->id == ""){
            $dps_list = new DpsList([
                'nkk' => $request->nkk,
                'nik' => $request->nik,
                'nama' => $request->nama,
                'tempat_lahir'=> $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'kawin' => $request->kawin,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'difabel' => $request->difabel,
                'sumberdata' => $request->sumberdata,
                'tps' => $request->tps,
            ]);
            $dps_list->save();
        } else {
            $update_dps = DpsList::where('id', $request->id);
            $update_dps = $update_dps->update($data);
        }
        return response()->json([
            'message' => 'Successfully created or update user !'
        ], 201);
    }

    public function delete($id){
        $dps =  DpsList::find($id);
        if (!$dps) {
            $data = [
                "message" => "id not found",
            ];
        } else {
            $dps->delete();
            $data = [
                "message" => "success_deleted"
            ];
        }
        return response()->json($data, 200);
    }

    public function detail($id, Request $request){
        $query = DpsList::where("id", $id);
        $data_get = $query->first();
        return $data_get;
    }

    public function getByNik($nik, Request $request){
        $query = DpsList::where("nik", "like", "%".$nik."%");
        $data_get = $query->first();
        return $data_get;
    }
}
