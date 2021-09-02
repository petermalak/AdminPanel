<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\DataTables\CompanyDataTable;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if($request->hasFile('logo')){
            $imageName = time().'-'.$request->name.'.'.$request->logo->extension();
            $request->logo->move(public_path('logos'),$imageName);
            $data['logo'] = $imageName;
        }

        Company::create($data);

        return redirect()->route('companies.index')->with('Success','Created Successfully');
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
    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        if(is_null($company)) {
            return response()->json(['message' => 'Company Not Found'], 404);
        }

        if($request->hasFile('logo')){
            File::delete(public_path('logos').'\\'. $company->logo);
            $imageName = time().'-'.$request->name.'.'.$request->logo->extension();
            $request->logo->move(public_path('logos'),$imageName);
            $request->logo = $imageName;
        }

        $company->update($request->all());
        return redirect()->route('companies.index')->with('Success','Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        File::delete(public_path('logos').'\\'. $company->logo);
        $company->delete();
        return redirect()->route('companies.index')->with('Success','Deleted Successfully');
    }
}
