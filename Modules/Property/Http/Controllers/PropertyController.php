<?php

namespace Modules\Property\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Storage;
use Session;
// use App\Models\Image;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\RefProvince;
use App\Models\RefCity;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Listing Property';
        return view('property::property.index', $data);
    }

    public function datatable()
    {
        $model = Property::with(['thumbnail', 'refType'])
                    ->select("properties.*","users.id as users_id", 'users.name as user_name')
                    ->Join("users", 'users.id', 'properties.user_id')
            // ->where('user_id', Auth::id())
                    ->orderBy('created_at', 'desc');

        $dTable = DataTables()->eloquent($model)
            ->addIndexColumn()
            ->editColumn('title', function ($data) {
                return $data->title;
            })
            ->editColumn('author', function ($data) {
                return $data->user_name;
            })
            ->editColumn('image', function ($data) {
                $thumb = 'No Thumbnail';
                if (!empty($data->thumbnail)) {
                    $thumb = '<a data-fancybox="gallery" href="/storage/' . $data->thumbnail->sortBy('sequence')->first()->file . '"><img src="/storage/' . $data->thumbnail->sortBy('sequence')->first()->file . '" style="width:60px" class="img_responsive"></a>';
                }
                return $thumb;
                // return print_r($data->thumbnail()->orderBy('sequence')->get());
            })
            ->editColumn('type', function ($data) {
                return ucfirst($data->refType->title);
            })
            ->editColumn('price', function ($data) {
                return "Rp." . number_format($data->basic_price);
            })
            ->editColumn('active_status', function ($data) {
                $btn = '<a class="btn btn-warning btn-sm">Non Aktif</a>';

                if ($data->active_status == 1) {
                    $btn = '<a class="btn btn-success btn-sm">Aktif</a>';
                }

                return $btn;
            })
            ->editColumn('last_update', function ($data) {
                return $data->updated_at ? $data->updated_at->diffForhumans() : "-";
            })
            ->addColumn('action', function ($data) {
                $btn = "";
                $btn .= '
                        <button class="btn btn-warning btn-sm" onclick="getDetail('.$data->id.')" >
                            <i class="fas fa-pencil-alt"> </i>
                            Edit
                        </button>
                        <form method="post" action="'.route('admin.property.destroy', $data->id).'">
                        '.csrf_field().'
                        <button type="submit" class="btn btn-danger btn-sm"  onclick="return confirm(\'Anda yakin akan menghapus item ini ?\');">
                            <i class="fas fa-trash"> </i>
                            Delete
                        </button>
                        </form>
                        ';
                return $btn;
            })
            ->rawColumns(['action', 'image', 'active_status']);

        return $dTable->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->back()->with('notif_success', 'Berhasil menghapus property '.$property->title);
    }

    public function edit_popup(Request $request) {
        $id = $request->id;
        $property = Property::find($id);

        return view('property::layouts.edit-popup', ["property" => $property]);
    }

    public function update_status(Property $property, Request $request) {
        $property->active_status = $request->status;
        $property->is_featured = $request->is_featured;
        $property->save();
        return redirect()->back()->with('notif_success', 'Berhasil merubah status property '.$property->title);
    }

    public function delete_image(Request $request) {
        $propertyImage = PropertyImage::find($request->gallery_id);
        $property = $propertyImage->property;

        // dd($propertyImage ,$property, $property->gallery, count($property->gallery));

        if (count($property->gallery) < 2) {
            return redirect()->back()->with('notif_error', 'Tidak dapat menghapus image pada '.$property->title. ' karena minimal image = 1');    
        } 

        $propertyImage->delete();

        return redirect()->back()->with('notif_success', 'Berhasil menghapus image property '.$property->title);
    }
}