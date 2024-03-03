<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\EmployeeUpdateRequest;

/***** Models ******/
use App\Models\User;

class EmployeeController extends Controller
{

    public function index(){
        $employees = User::where('comp_id','>', 0)->orderBy('comp_id')->get();
        // dd($employee);
        return view('backend.employee.index', compact('employees'));
    }


    public function pending(){
        $pendingEmployees = User::where('comp_id', 0)->orderBy('id')->get();
        return view('backend.employee.pending', compact('pendingEmployees'));
    }


    public function approve($id){
        $employee = User::where('id', $id)->first();
        return view('backend.employee.approve', compact('employee'));
    }


    public function update(EmployeeUpdateRequest $request, $id){
        // return $request->all();
        // dd($request->hasFile('image'));
        // $employee = User::find($id);
        // if($request->hasFile('image')){
        //     // Storage::delete($employee->image);
        //     $image = $request->file('image')->store('public/user');
        //     // $employee->update(['comp_id' => $request->comp_id, 'image'=> $image, 'nid' => $request->nid, 'phone' => $request->phone, 'address' => $request->address, 'social_media_link' => $request->social_media_link]);
        //     $employee->update([
        //         'comp_id' => $request->comp_id,
        //         'image'=> $image,
        //         'nid' => $request->nid,
        //         'phone' => $request->phone,
        //         'address' => $request->address,
        //         'social_media_link' => $request->social_media_link,
        //     ]);
        // }else {
        //     $employee->update(['comp_id' => $request->comp_id, 'nid' => $request->nid, 'phone' => $request->phone, 'address' => $request->address, 'social_media_link' => $request->social_media_link]);
        // }

        $employee = User::find($id);

        $employee->comp_id = $request->comp_id;
        if($request->hasFile('image')){
            $image = $request->file('image')->store('public/user');
            $employee->image= $image;
        }
        $employee->nid = $request->nid;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->social_media_link = $request->social_media_link;
        $employee->save();

        return redirect()->route('employee.index')->with('message','Employee updated successfully.');
    }




}
