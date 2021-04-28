<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
Use Alert;
use Illuminate\Support\Facades\Storage;
use Auth;
use Modules\User\Http\Requests\UserRequest;

use App\Models\User;
use App\Models\RefRole;
use App\Models\Media;
use App\Models\RefStatus;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if (!empty(session('error_msg')))
            Alert::error('Gagal !', session('error_msg'));
        if (!empty(session('success')))
            Alert::success('Success !', session('success'));

        $type = $request->query('type');
        switch ($type) {
            case strtolower(RefRole::TXT_ADMIN):
                $title = 'Listing '.RefRole::TXT_ADMIN;
                break;
            case strtolower(RefRole::TXT_MITRA):
                $title = 'Listing '.RefRole::TXT_MITRA;
                break;
            default :
                $title = 'Listing '.RefRole::TXT_USER;
                break;
        }

        $data['title'] = $title;
        $data['type'] = $type;
        return view('user::admin.index', $data);
    }

    public function datatable(Request $request)
    {
        $type = $request->query('type');
        $role = "";
        switch ($type) {
            case strtolower(RefRole::TXT_ADMIN):
                $role = RefRole::REF_ADMIN;
                break;
            case strtolower(RefRole::TXT_MITRA):
                $role = RefRole::REF_MITRA;
                break;
            default :
                $role = RefRole::REF_USER;
                break;
        }

        $model = User::where('role', $role)->get();
        $dTable = DataTables()->of($model)->addIndexColumn()
            ->editColumn('name', function ($data) {
                return $data->name;
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
            ->addColumn('action', function ($data) {
                $btn = "";
                $btn .= '
                        <a class="btn btn-warning btn-sm" href="' . route('admin.user.edit', $data->id) . '">
                            <i class="fa fa-pencil"> </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="'.route('admin.user.destroy', $data->id).'"  onclick="return confirm(\'Anda yakin akan menghapus item ini ?\');">
                            <i class="fa fa-trash"> </i>
                            Delete
                        </a>';
                return $btn;
            })
            ->rawColumns(['action', 'image']);

        return $dTable->make(true);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $type = $request->query('type');
        $xtype = "";
        switch ($type) {
            case strtolower(RefRole::TXT_ADMIN):
                $title = 'Buat '.ucfirst(RefRole::TXT_ADMIN);
                $xtype = strtolower(RefRole::TXT_ADMIN);
                break;
            case strtolower(RefRole::TXT_MITRA):
                $title = 'Buat '.ucfirst(RefRole::TXT_MITRA);
                $xtype = strtolower(RefRole::TXT_MITRA);
                break;
            default :
                $title = 'Buat '.ucfirst(RefRole::TXT_USER);
                $xtype = strtolower(RefRole::TXT_USER);
                break;
        }

        $data['title'] = $title;
        $data['type'] = $xtype;
        return view('user::admin.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(User $user, UserRequest $request)
    {
        $type = $request->query('type');
        $xrole = "";
        switch ($type) {
            case strtolower(RefRole::TXT_ADMIN):
                $xrole = RefRole::REF_ADMIN;
                break;
            case strtolower(RefRole::TXT_MITRA):
                $xrole = RefRole::REF_MITRA;
                break;
            default :
                $xrole = RefRole::REF_USER;
                break;
        }
        
        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->phone = $request->phone;
            $user->image_id = null;
            $user->role = $xrole;
            $user->identity = $request->identity;
            $user->active_status = RefStatus::status($request->active_status)->ref;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->save();
            if ($request->hasFile('avatar')) {
                if ($file = $request->avatar->store('/upload', 'public')) {
                    $cols = [
                        'user_id' => $user->id,
                        'file' => str_replace('upload/', '', $file),
                        'type' => Media::AVATAR
                    ];

                    $this->_clearMedia($user->id);
                    $image_id = Media::insertGetId($cols);
                    
                    $user = User::find($user->id);
                    $user->image_id = $image_id;
                    $user->save();
                }
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.user.index', ['type' => $type])->with('error_msg', 'Data gagal ditambah !');
        }

        return redirect()->route('admin.user.index', ['type' => $type])->withSuccess('Data berhasil ditambah !');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(User $user)
    {
        $data['single'] = $user;
        $data['title'] = 'Ubah User '.$user->name;
        return view('user::admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(User $user, UserRequest $request)
    {
        try {
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->hasFile('avatar')) {
                if ($file = $request->avatar->store('/upload', 'public')) {
                    $this->_clearMedia($user->id);
                    // Media::where(['type' => Media::AVATAR, 'user_id' => Auth::id()])->delete();
                    $cols = [
                        'user_id' => $user->id,
                        'file' => str_replace('upload/', '', $file),
                        'type' => Media::AVATAR
                    ];
                    $image_id = Media::insertGetId($cols);
                }
                $user->image_id = $image_id;
            }

            if (!empty($request->password))
                $user->password = $request->password;
            $user->phone = $request->phone;
            $user->identity = $request->identity;
            $user->active_status = RefStatus::status($request->active_status)->ref;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->save();
        } catch (\Exception $e) {
            return redirect()->route('admin.user.index', ['type' => strtolower($user->ref_role->title)])->with('error_msg', 'Data gagal dirubah !');
        }

        return redirect()->route('admin.user.index', ['type' => strtolower($user->ref_role->title)])->withSuccess('Data berhasil dirubah !');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
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

    private function _clearMedia($userId) {
        if (empty($userId))
            $userId = Auth::id();
        
        $mediaModel = Media::where(['user_id' => $userId, 'type' => Media::AVATAR]);
        $media = clone $mediaModel;

        $file = $media->pluck('file');
        foreach ($file as $key => $value) {
            Storage::disk('public')->delete('upload/'.$value);
        }

        return $media->delete();
    }
}
