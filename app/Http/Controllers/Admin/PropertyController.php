<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;
use App\Models\Facility;
use App\Models\Image;
use App\Models\Property;
use App\Models\Province;
use App\Models\City;
use App\Models\PropertyTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Http;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \Session::forget('dz-sess');
        $data['title'] = 'Listing Property';
        return view('admin.property.index', $data);
    }

    public function datatable()
    {
        $model = Property::with(['user', 'thumbnail', 'category'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        $dTable = DataTables()->of($model)->addIndexColumn()
            ->editColumn('title', function ($data) {
                return $data->title;
            })
            ->editColumn('author', function ($data) {
                return $data->user->name;
            })
            ->editColumn('image', function ($data) {
                $thumb = 'No Thumbnail';
                if (!empty($data->thumbnail)) {
                    $thumb = '<img src="/storage/upload/' . $data->thumbnail->file . '" style="width:60px !important;height:auto !important;">';
                }
                return $thumb;
            })
            ->editColumn('type', function ($data) {
                return ucfirst($data->category->name);
            })
            ->editColumn('price', function ($data) {
                return "Rp." . number_format($data->price);
            })
            ->editColumn('date', function ($data) {
                return $data->new_date;
            })
            ->addColumn('action', function ($data) {
                $btn = "";
                $btn .= '
                        <a class="btn btn-warning btn-sm" href="' . route('admin.property.edit', $data->id) . '">
                            <i class="fas fa-pencil-alt"> </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="'.route('admin.property.destroy', $data->id).'"  onclick="return confirm(\'Anda yakin akan menghapus item ini ?\');">
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
    public function create()
    {
        $data['title'] = 'Tambah Property';
        $data['cats'] = Category::all();
        $data['provs'] = Province::all();
        if (empty(\Session::get('dz-sess')))
            \Session::put('dz-sess', str_random(32));

        return view('admin.property.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $title = $request->title;
            $categoryId = $request->type;
            $tags = explode(",", trim($request->tags));
            $thumb = $request->thumbnail;
            $price = $request->price;
            $squareMeter = $request->square_meter;
            $desc = $request->desc;
            $fac = $request->fac;
            $cityId = $request->city_id;
            $address = $request->address;
            $postalCode = $request->postal_code;
            $buildingAge = $request->building_age;
            $contactName = $request->contact_name;
            $contactEmail = $request->contact_email;
            $contactPhone = $request->contact_phone;

            $property = new Property;
            $property->user_id = Auth::id();
            $property->category_id = $categoryId;
            $property->title = $title;
            $property->price = $price;
            $property->desc = $desc;
            $property->city_id = $cityId;
            $property->square_meter = $squareMeter;
            $property->address = $address;
            $property->postal_code = $postalCode;
            $property->building_age = $buildingAge;
            $property->contact_name = $contactName;
            $property->contact_email = $contactEmail;
            $property->contact_phone = $contactPhone;
            $property->save();

            foreach ($tags as $key => $tag) {
                $tagM = Tag::where('tag', $tag);
                if ($tagM->count() <= 0) {
                    $tagId = Tag::insertGetId([
                        'tag' => $tag
                    ]);
                } else {
                    $tagId = Tag::where('tag', $tag)->first()->id;
                }

                $propertyTag = new PropertyTag;
                $propertyTag->tag_id = $tagId;
                $propertyTag->property_id = $property->id;
                $propertyTag->save();
            }

            foreach ($fac as $key => $fac) {
                $facModel = new Facility;
                $facModel->property_id = $property->id;
                $facModel->name = $key;
                $facModel->value = $fac;
                $facModel->save();
            }

            Image::where('sid', \Session::get('dz-sess'))->update([
                'parent_id' => $property->id,
                'type' => Image::PROPERTY,
            ]);
            Image::where('file', $thumb)->update(['is_thumbnail' => 1]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->route('admin.property.index')->with('error', 'Property gagal dibuat !');
        }

        \Session::forget('dz-sess');
        return redirect()->route('admin.property.index')->withSuccess('Property berhasil dibuat !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Ubah Property';
        $data['cats'] = Category::all();
        $data['provs'] = Province::all();
        $single = Property::with(['category', 'facs', 'city', 'images', 'property_tags.tag'])->whereId($id)->first();
        $data['single'] = $single;
        $data['cities'] = City::where('province_id', $single->city->province_id)->get();
        $tags = $single->property_tags->map(function($d) {
            return $d->tag->tag;
        })->toArray();
        $data['tags'] = implode(",", $tags);
        
        $thumb = "";
        if (empty($single->images)) {
            \Session::put('dz-sess', str_random(32));
            $data['dzSess'] = \Session::get('dz-sess');
        } else {
            $thumb = $single->images->where('is_thumbnail', 1)->first()->file;
        }
        $data['thumb'] = $thumb;
        
        return view('admin.property.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $title = $request->title;
            $categoryId = $request->type;
            $tags = explode(",", trim($request->tags));
            $thumb = $request->thumbnail;
            $price = $request->price;
            $squareMeter = $request->square_meter;
            $desc = $request->desc;
            $fac = $request->fac;
            $cityId = $request->city_id;
            $address = $request->address;
            $postalCode = $request->postal_code;
            $buildingAge = $request->building_age;
            $contactName = $request->contact_name;
            $contactEmail = $request->contact_email;
            $contactPhone = $request->contact_phone;

            $property = Property::find($id);
            $property->user_id = Auth::id();
            $property->category_id = $categoryId;
            $property->title = $title;
            $property->price = $price;
            $property->desc = $desc;
            $property->city_id = $cityId;
            $property->square_meter = $squareMeter;
            $property->address = $address;
            $property->postal_code = $postalCode;
            $property->building_age = $buildingAge;
            $property->contact_name = $contactName;
            $property->contact_email = $contactEmail;
            $property->contact_phone = $contactPhone;
            $property->save();

            PropertyTag::where('property_id', $id)->delete();
            foreach ($tags as $key => $tag) {
                $tagM = Tag::where('tag', $tag);
                if ($tagM->count() <= 0) {
                    $tagId = Tag::insertGetId([
                        'tag' => $tag
                    ]);
                } else {
                    $tagId = Tag::where('tag', $tag)->first()->id;
                }

                $propertyTag = new PropertyTag;
                $propertyTag->tag_id = $tagId;
                $propertyTag->property_id = $property->id;
                $propertyTag->save();
            }

            Facility::where('property_id', $id)->delete();
            foreach ($fac as $key => $fac) {
                $facModel = new Facility;
                $facModel->property_id = $property->id;
                $facModel->name = $key;
                $facModel->value = $fac;
                $facModel->save();
            }

            if (!empty(\Session::get('dz-sess'))) {
                Image::where('sid', \Session::get('dz-sess'))->update([
                    'parent_id' => $property->id,
                    'type' => Image::PROPERTY
                ]);
                Image::where('file', $thumb)->update(['is_thumbnail' => 1]);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.property.index')->with('error', 'Property gagal diubah !');
        }

        \Session::forget('dz-sess');
        return redirect()->route('admin.property.index')->withSuccess('Property berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $imgs = Image::where('parent_id', $id);
            if ($imgs->count() >= 1) {
                $imgs = $imgs->pluck('file')->map(function($d){
                    $d = "upload/".$d;
                    return $d;
                })->toArray();
                $x = Storage::disk('public')->delete($imgs);
            }

            Property::destroy($id);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.property.index')->with('error', 'Property gagal dihapus !');
        }

        return redirect()->route('admin.property.index')->withSuccess('Property berhasil dihapus !');
    }
}
