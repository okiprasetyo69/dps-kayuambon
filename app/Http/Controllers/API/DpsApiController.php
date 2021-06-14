<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Controllers\Api\QueryFilters\UserQueryFilter;
use App\User;
use App\Role;
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


    public function userDatatable(Request $request)
    {
        $userQueryFilter = new UserQueryFilter($request->all());
        $userQuery = User::orderBy('id', 'ASC');
        if ($userQueryFilter->get_search_text() != null) {
            $userQuery = $userQuery->where("name", "like", "%" . $userQueryFilter->get_search_text() . "%");
        }
        $count = (clone $userQuery)->count();
        $result = $userQuery->limit($userQueryFilter->get_length())->offset($userQueryFilter->get_start());
        $data_get = $result->get();
        $data = $this->set_datatable_response($userQueryFilter->get_draw(), $count, $result->get());
        return $this->success_response_datatable();
    }

    public function createOrUpdate(Request $request){
        /*
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8',
            'c_password'=> 'required|same:password',
            'role_id' => 'required',
            'role_name' => 'required'
        ]);
        */
        $ruleUser = [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8',
            'c_password'=> 'required|same:password',
            'role_id' => 'required',
            'role_name' => 'required'
        ];
        $validator = Validator::make($request->all(), $ruleUser);

        if($validator->fails()){
            return response($validator->messages()->toArray(), 400);
            //return Redirect::back()->withErrors($validator);
        }
        
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ];

        if($request->id == ""){
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => $request->role_id,
            ]);
            //Give role permission based laravel spatie
            $user->assignRole($request->role_name);
            $user->save();
            //TODO : Its can used send email but please check connection to mail cz Connection could not be established with host
            /*
            $userMail = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,

            ]);
            Mail::send('email.index', ['user' => $userMail, 'data' => $data], function ($message) use ($user, $data) {
                $message->from('hris@cisangkan.co.id', 'Absence Online Cisangkan');
                $message->to($user->email, $user->name, $user->password)
                        ->subject('Authentication Absence Online');
            });
            */
        } else {
            $update_user = User::where('id', $request->id);
            $update_user = $update_user->update($data);
            $update_role = DB::table('model_has_roles')->where('model_id', $request->id);
            $update_role = $update_role->update(['role_id'=>$request->role_id]);
           
        }
        return response()->json([
            'message' => 'Successfully created or update user !'
        ], 201);
    }

    public function delete($id){
        $user =  User::find($id);
        $user_role = DB::table('model_has_roles')->where('model_id', $id);
        if (!$user) {
            $data = [
                "message" => "id not found",
            ];
        } else {
            $user->delete();
            $user_role->delete();
            $data = [
                "message" => "success_deleted"
            ];
        }
        return response()->json($data, 200);
    }

    public function detail($id, Request $request){
        $userQueryFilter = new UserQueryFilter($request->all());
        $query = User::where("id", $id);
        $data_get = $query->first();
        return $data_get;
    }

}
