<?php

namespace App\Http\Controllers\visaType;

use App\Http\Controllers\Controller;
use App\Models\visaType\visaTypeModel;
use Illuminate\Http\Request;

class visaTypeController extends Controller
{
    //

    public function index()
    {
        $visaType = visaTypeModel::latest()->paginate(13);
        return view('visaType.index', compact('visaType'));
    }

    public function store(Request $request)
    {
        visaTypeModel::create($request->all());
        return redirect()->back();
    }

    public function delete(visaTypeModel $visaTypeModel)
    {
        if ($visaTypeModel) {
            $visaTypeModel->delete();
        }

        return redirect()->back();
    }

    public function edit(visaTypeModel $visaTypeModel)
    {
        return view('visaType.modal-edit', compact('visaTypeModel'));
    }

    public function update(visaTypeModel $visaTypeModel, Request $request)
    {
        $visaTypeModel->update($request->all());
        return redirect()->back();
    }
}
