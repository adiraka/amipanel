<?php

namespace Amipanel\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Sentinel;
use Datatables;
use Amipanel\User;
use Amipanel\Employee;
use Amipanel\Http\Requests;

class EmployeeController extends Controller
{
    public function getAddEmployee()
    {
        return view('employee.add');
    }

    public function postAddEmployee(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'job_position' => 'required',
            'role' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ];

        $role = '';

        if ($request->role == 'admin') {
            $role = Sentinel::findRoleBySlug('admin');
        } elseif ($request->role == 'member') {
            $role = Sentinel::findRoleBySlug('member');
        } elseif ($request->role == 'manager') {
            $role = Sentinel::findRoleBySlug('manager');
        } else {
            $role = '';
        }

        $employee = new Employee;
        $employee->name = $request->first_name.' '.$request->last_name;
        $employee->position = $request->job_position;

        $user = Sentinel::registerAndActivate($data);
        $role->users()->attach($user);
        $user->employee()->save($employee);

        Session::flash('success','Employee has been added.');
        return redirect()->back();
    }

    public function viewEmployee(Request $request)
    {
        if ($request->ajax()) {
            $employees = collect();
            $users = User::all();

            foreach ($users as $user) {
                $employees->push([
                    'id' => $user->id,
                    'email' => $user->email,
                    'name' => $user->employee->name,
                    'last_login' => $user->last_login,
                    'role' => sentinel::findUserById($user->id)->roles()->get()->first()->name,
                    'p_o_b' => $user->employee->p_o_b,
                    'd_o_b' => $user->employee->d_o_b,
                    'gender' => $user->employee->gender,
                    'religion' => $user->employee->religion,
                    'address' => $user->employee->address,
                    'phone' => $user->employee->phone,
                    'position' => $user->employee->position
                ]);
            }

            return Datatables::of($employees)
                ->addColumn('action', function($employee){
                    return '
                        <a href="'.route('getEmployee', ['id' => $employee['id']]).'" class="btn btn-success btn-sm"><i class="material-icons">mode_edit</i></a>&nbsp;
                        <a href="'.route('alertEmployee', ['id' => $employee['id']]).'" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a>
                    ';
                })
                ->make(true);
        }
        return view('employee.view');
    }

    public function getEmployee($id)
    {
        $user = Sentinel::findById($id);
        return view('employee.get')->with([
            'user' => $user,
        ]);
    }

    public function editEmployee(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = Sentinel::findById($request->id);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        Sentinel:: update($user, $data);

        Session::flash('success','Employee has been updated.');
        return redirect()->route('viewEmployee');
    }

    public function alertEmployee($id)
    {
        $user = Sentinel::findById($id);
        return view('employee.delete')->with([
            'user' => $user,
        ]);
    }

    public function deleteEmployee(Request $request)
    {
        $id = $request->id;
        $user = Sentinel::findById($id);
        $user->employee()->delete();
        $user->delete();
        Session::flash('success','Employee has been deleted.');
        return redirect()->route('viewEmployee');
    }
}
