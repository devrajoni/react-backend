<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WorkCategoryRequestform;
use App\Models\WorkCategory;

class WorkCategoryController extends Controller
{
    public function index()
    {
        $workCategories = WorkCategory::get();

        return view('admin.work.category.index', compact('workCategories'));

    }

    public function create()
    {

        return view('admin.work.category.form');
    }

    public function store(WorkCategoryRequestform $request)
    {

        WorkCategory::create($request->validated());

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('work-category.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(WorkCategory $workCategory)
    {
        $data['workCategory'] = $workCategory;

        return view('admin.work.category.form', $data);
    }

    public function update(WorkCategoryRequestform $request, WorkCategory $workCategory)
    {
        
        $workCategory->update($request->validated());

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('work-category.index');
                
    }

    public function destroy(workCategory $workCategory)
    {
        $workCategory->delete();

        toastr()->success('Data has been delete successfully!');

        return redirect()
                ->route('work-category.index');

    }

    public function status($id)
    {
        $data = WorkCategory::select('status')->where('id', $id)->first();
        if ($data->status == 'Active') {
            $status = 'Inactive';
        }else{
            $status = 'Active';
        }
        WorkCategory::where('id', $id)->update(['status' => $status]);

        return redirect()->route('work-category.index');

    }
}
