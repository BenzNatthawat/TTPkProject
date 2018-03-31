<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Packagesservice;
use Input as Input;
use Auth;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagenum = 3;
        $user = Auth::user();
        $packages = Packagesservice::orderBy('id')->paginate($pagenum);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('package.index')    ->with('packages',$packages)
                                        ->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pagenum = 4;
        $activities = Activity::orderBy('id','desc')->paginate($pagenum);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;

        //$activities = Activity::orderBy('id','desc')->get();
        return view('package.create')   ->with('page',$page)
                                        ->with('pagenum',$pagenum)
                                        ->with('activities',$activities);
        echo "string";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Packagesservice::create( $request->all());
        $packageid = Packagesservice::all()->last();

        foreach ($request->packages as $package) {
            $packageid->activities()->sync($package);
        }
        return redirect('/packet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $packages = Packagesservice::findOrFail($id);
        return view('package.show')    ->with('packages',$packages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $packages = Packagesservice::findOrFail($id);
        return view('package.edit')    ->with('packages',$packages);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
