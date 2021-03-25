<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
Use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty(session('error_msg')))
            Alert::error('Gagal !', session('error_msg'));
        if (!empty(session('success')))
            Alert::success('Success !', session('success'));

        $type = $request->query('type');
        switch ($type) {
            case User::ROLE_USER:
                $title = 'Listing '.ucfirst(User::ROLE_USER);
                break;
            case User::ROLE_AGENT:
                $title = 'Listing '.ucfirst(User::ROLE_AGENT);
                break;
            default :
                $title = 'Listing '.ucfirst(User::ROLE_ADMIN);
                break;
        }

        $data['title'] = $title;
        $data['type'] = $type;
        return view('admin.user.index', $data);
    }

    public function datatable(Request $request)
    {
        $type = $request->query('type');
        $role = "";
        switch ($type) {
            case User::ROLE_USER:
                $role = User::ROLE_USER;
                break;
            case User::ROLE_AGENT:
                $role = User::ROLE_AGENT;
                break;
            default :
                $role = User::ROLE_ADMIN;
                break;
        }

        $model = User::where('role', $role)->get();
        $dTable = DataTables()->of($model)->addIndexColumn()
            ->editColumn('name', function ($data) {
                return $data->name;
            })
            ->editColumn('username', function ($data) {
                return $data->username;
            })
            ->editColumn('email', function ($data) {
                return $data->email;
            })
            ->editColumn('phone', function ($data) {
                return $data->phone;
            })
            ->editColumn('date', function ($data) {
                return $data->created_date;
            })
            ->editColumn('date', function ($data) {
                return $data->new_date;
            })
            ->addColumn('action', function ($data) {
                $btn = "";
                $btn .= '
                        <a class="btn btn-warning btn-sm" href="' . route('admin.user.edit', $data->id) . '">
                            <i class="fas fa-pencil-alt"> </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="'.route('admin.user.destroy', $data->id).'"  onclick="return confirm(\'Anda yakin akan menghapus item ini ?\');">
                            <i class="fas fa-trash"> </i>
                            Delete
                        </a>';
                return $btn;
            })
            ->rawColumns(['action', 'image']);

        return $dTable->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type = $request->query('type');
        $xtype = "";
        switch ($type) {
            case User::ROLE_USER:
                $title = 'Buat '.ucfirst(User::ROLE_USER);
                $xtype = User::ROLE_USER;
                break;
            case User::ROLE_AGENT:
                $title = 'Buat '.ucfirst(User::ROLE_AGENT);
                $xtype = User::ROLE_AGENT;
                break;
            default :
                $title = 'Buat '.ucfirst(User::ROLE_ADMIN);
                $xtype = User::ROLE_ADMIN;
                break;
        }

        $data['title'] = $title;
        $data['type'] = $xtype;
        return view('admin.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, UserRequest $request)
    {
        $type = $request->query('type');
        switch ($type) {
            case User::ROLE_ADMIN :
                $xtype = User::ROLE_ADMIN;
                break;
            case User::ROLE_AGENT:
                $xtype = User::ROLE_AGENT;
                break;
            default :
                $xtype = User::ROLE_USER;
                break;
        }

        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = $request->password;
            $user->phone = $request->phone;
            $user->role = $xtype;
            $user->type = $request->type;
            $user->address = $request->address;
            $user->save();
        } catch (\Exception $e) {
            return redirect()->route('admin.user.index', ['type' => $type])->with('error_msg', 'Data gagal dirubah !');
        }

        return redirect()->route('admin.user.index', ['type' => $type])->withSuccess('Data berhasil dirubah !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['single'] = $user;
        $data['title'] = 'Ubah User '.$user->name;
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UserRequest $request)
    {
        $type = $request->type_user;
        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            
            if (!empty($request->password))
                $user->password = $request->password;
            $user->phone = $request->phone;
            $user->type = $request->type;
            $user->address = $request->address;
            $user->save();
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->route('admin.user.index', ['type' => $user->role])->with('error_msg', 'Data gagal dirubah !');
        }

        return redirect()->route('admin.user.index', ['type' => $user->role])->withSuccess('Data berhasil dirubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $e) {
            return back()->with('error_msg', 'Data gagal dihapus !');
        }
        
        return back()->withSuccess('Data berhasil dihapus !');
    }
}
