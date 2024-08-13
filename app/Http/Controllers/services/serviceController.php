<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use App\Models\services\serviceModel;
use App\Models\visaType\visaTypeModel;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    //

    public function index()
    {
        $services = serviceModel::latest()->paginate(13);
        $visaTypes = visaTypeModel::latest()->get();
        return view('services.index',compact('services','visaTypes'));
    }

    public function store(Request $request)
    {
        serviceModel::create($request->all());
        return redirect()->back();
    }

    public function edit(serviceModel $serviceModel)
    {
        $visaTypes = visaTypeModel::latest()->get();
        return view('services.modal-edit',compact('serviceModel','visaTypes'));
    }

    public function update(serviceModel $serviceModel ,Request $request)
    {
        $serviceModel->update($request->all());
        return redirect()->back();
    }

    public function delete(serviceModel $serviceModel)
    {
        $serviceModel->delete();
        return redirect()->back();
    }

}
