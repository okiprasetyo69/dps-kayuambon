<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseApiController;
use App\Absence;
use App\Http\Controllers\Api\QueryFilters\AbsenceQueryFilter;

class AbsenceApiController extends BaseApiController
{
    public function index()
    {
        return Absence::all();
    }

    public function getListDataAbsence(Request $request){
        $absenceQueryFilter = new AbsenceQueryFilter($request->all());
        $absenceQuery = Absence::orderBy('absence_date', 'DESC');
       
        if ($absenceQueryFilter->get_search_text() != null) {
            $absenceQuery = $absenceQuery->where("name", "like", "%" . $absenceQueryFilter->get_search_text() . "%");
        }

        if($request->absence_date != ""){
            $absenceQuery = $absenceQuery->where('absence_date', $request->absence_date);
        }
        
        $count = (clone $absenceQuery)->count();
        $result = $absenceQuery->limit($absenceQueryFilter->get_length())->offset($absenceQueryFilter->get_start());

        $data_get = $result->get();

        foreach ($data_get as $key => $value) {
            if (!file_exists(public_path('upload/' . $value->signature))) {
                $value->signature_url = url('img/room-icon.png');
            } else {
                $value->signature_url = url('upload/' . $value->signature);
            }
        }

        $data = $this->set_datatable_response($absenceQueryFilter->get_draw(), $count, $result->get());
        return $this->success_response_datatable();
    }

    public function save(Request $request)
    {
        $folderPath = public_path('upload/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $signature = uniqid() . '.'.$image_type;
        $file = $folderPath . $signature;
        file_put_contents($file, $image_base64);

        $absence_date = $request->absence_date;
        $absence_name = $request->name; 
        $absence_position = $request->position;
        $absence_signature = $signature;

        $data = [
                'absence_date' => $absence_date,
                'name' => $absence_name, 
                'position' => $absence_position, 
                'signature' => $absence_signature
            ];

        $create_absence = Absence::create($data);
        return response()->json(['success'=>'Form is successfully submitted!', 'data' => $data ]);
    }


}
