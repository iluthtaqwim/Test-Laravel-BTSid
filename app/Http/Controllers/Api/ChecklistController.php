<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use App\Traits\Responses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChecklistController extends Controller
{

    use Responses;

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function index()
    {
        $datas = Checklist::all();

        if ($datas) {
            return $this->success($datas, 'Checklist berhasil ditampilkan');
        }
        return $this->notfound($datas, 'Checklist tidak ditemukan');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $create = Checklist::create($request->all());
        if ($create) {
            return $this->success($create, 'Data berhasil ditambahkan');
        }
        return $this->failed($create, 'Checklist gagal ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */


    public function delete($checklistId)
    {
        if (!$checklistId) {
            return $this->failed($checklistId, 'Id harus diisi');
        }
        $delete = Checklist::find($checklistId)->delete();
        if ($delete) {
            return $this->success($delete, 'Checklist berhasil di hapus');
        }
        return $this->failed($delete, 'Checklist gagal di hapus');
    }
}
