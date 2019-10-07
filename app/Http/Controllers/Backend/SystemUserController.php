<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\Admin;
use Carbon\Carbon;
class SystemUserController extends Controller{

    public function index()
    {
        return view('backend.system-user.index', ['page_title' => 'Admin Users']);
    }

    public function listAjax(){

        $request = request()->all();
        $data = [];
        $return_data = [];
        $query = new Admin();
        $sortColumn = array('name','email','','status');
        $sort_order = $request['order']['0']['dir'];
        $order_field = $sortColumn[$request['order']['0']['column']];
        if($order_field != ''){
            if($sort_order == 'asc') {
                $query = $query->orderBy($order_field, 'ASC');
            }else{
                $query = $query->orderBy($order_field, 'DESC');
            }
        }
        foreach ($request['columns'] as $key=>$val){
            if (trim($val['search']['value']) != '') {
                $query = $query->where($val['data'],'like',"%" .$val['search']['value']. "%");
            }
        }
        $query = $query->where('id','<>',auth()->guard('admin')->user()->id)->where('user_type','<>',1);
        $iTotalRecords = $query->count();
        $iDisplayLength = intval($request['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($request['start']);
        $sEcho = intval($request['draw']);
        $records = $query->skip($iDisplayStart)->take($iDisplayLength)->get();
        foreach ($records as $key=>$val){
            $index = 0;
            $data[$key]['name'] = $val['name'];
            $data[$key]['email'] = $val['email'];
            $data[$key]['photo'] = $val['image'];
            $data[$key]['status'] = $val['status_val'];
            $action = '<div class="actions"><a class="edit btn btn-warning btn-sm" data-toggle="modal" data-modal="#kt_table_1" data-type="edit"  data-key="'.$key.'" data-action="'.route('admin.system-user.update',$val['id']).'"   href="#add">Edit</a> </div>'; /*<a data-toggle="confirmation"
data-placement="top" href="javascript:void(0);" data-title="delete"  class=" btn btn-danger btn-sm delete-data" data-modal="#m_table_1" data-key="'.$key.'" data-action="'.route('admin.system-user.delete',$val['id']).'"><i class="fa fa-trash"></i>  </a>*/
            $data[$key]['action'] = $action;
            $return_data[$key] = $val;
        }
        $records["aaData"] = $data;
        $records["record_data"] = $return_data;
        $records["sEcho"] = $sEcho;
        $records["iTotalDisplayRecords"] = $iTotalRecords;
        $records["iTotalRecords"] = $iTotalRecords;

        return response()->json($records);
    }

    public function store(){
        $data = request()->all();
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'phone' => 'required|numeric|unique:admins',
            'password' => 'required|string|min:6'
        ]);
        $data['password1'] = $data['password'];
        $data['password'] = bcrypt($data['password']);
        $data['added_by'] = auth()->guard('admin')->user()->id;
        $admin = Admin::create($data);
        $mail = [];
        $mail['email'] = $data['email'];
        $mail['view'] = 'emails.template.new-system-user';
        $mail['subject'] = 'System User Register';
        $mail['password'] = $data['password1'];
        $mail['name'] =  $data['name'];
        $mail['url'] =  url(ADMIN);
        $emailJob = (new SendEmailJob($mail))->delay(Carbon::now()->addSeconds(3));
        dispatch($emailJob);
        return response()->json(['status'=>true,'msg'=>'User Added Successfully.']);
    }
    public function changeStatus(){
        $request = request()->all();
        Admin::where('id',$request['id'])->update(['status'=>$request['status']]);
        return response()->json(true);
    }

    public function update($id){
        $data = request()->all();
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,'.$id.',id'
        ]);
        $user = Admin::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        if(@$data['password'] && trim($data['password']) != '')
        {
            $user->password = bcrypt($data['password']);
        }
        $user->save();
        return response()->json(['status'=>true,'msg'=>'User Updated Successfully.']);
    }

    public function destroy($id)
    {
        Admin::destroy($id);
        return response()->json(['status'=>true,'msg'=>'User Deleted Successfully.']);
    }
}