<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class Kategori extends Model
{
    protected $table = "kategori";
    protected $guard = [];

    public function data()
    {
        return DB::table('kategori')->select('name','id')->get();
        // dd($data);
    }
    public function getData()
    {
        $data = DB::table('kategori')->select(['name','id']);

        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function ($d) {
                    $button =  '<button class="edit btn btn-outline-warning block btn-sm edit" data-id=" ' . $d->id . '"name="edit"  id="edit" >edit</button>';
                    return $button;
                })
                ->rawColumns(['aksi'])
                ->make(true);
    }

}
