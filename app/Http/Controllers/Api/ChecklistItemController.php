<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChecklistItem;
use App\Traits\Responses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChecklistItemController extends Controller
{
    use Responses;

    public function index($checklist)
    {
        $datas = ChecklistItem::where('checklist_id', $checklist)->get();

        if ($datas) {
            return $this->success($datas, 'Checklist Item berhasil ditampilkan');
        }
        return $this->notfound($datas, 'Checklist Item tidak ditemukan');
    }

    public function store($checklist, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'itemName'      => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = [
            'checklist_id' => $checklist,
            'name' => $request->input('itemName'),
        ];
        $create = ChecklistItem::create($data);
        if ($create) {
            return $this->success($create, 'Data berhasil ditambahkan');
        }
        return $this->failed($create, 'Checklist gagal ditambahkan');
    }
}
