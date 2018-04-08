<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Packagesservice;
use Input as Input;
use App\Models\Review;
use Auth;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('index','show');    
    }

    public function index(Request $request)
    {
        $pagenum = 3;
        $user = Auth::user();
        $packages = Packagesservice::orderBy('id')->paginate($pagenum);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('packet.index')    ->with('packages',$packages)
                                        ->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Auth::user()->roles->role_name == "admin"){
            $pagenum = 4;
            $activities = Activity::orderBy('id','desc')->paginate($pagenum);
            $page = $request->input('page');
            $page = ($page != null)?$page:1;

            //$activities = Activity::orderBy('id','desc')->get();
            return view('packet.create')   ->with('page',$page)
                                            ->with('pagenum',$pagenum)
                                            ->with('activities',$activities);
        }
        else{
            $message = array('head' => 'You do not have role','detail' => 'You do not have role in create packet');
            return view('error.dohaverole')->with('message', $message);
        }
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
        $Excellent = $packages->reviews->where('score_review', 'Excellent')->count();
        $Verygood = $packages->reviews->where('score_review', 'Very good')->count();
        $Average = $packages->reviews->where('score_review', 'Average')->count();
        $Poor = $packages->reviews->where('score_review', 'Poor')->count();
        $Terrible = $packages->reviews->where('score_review', 'Terrible')->count();
        $sum = $packages->reviews->count();
        if($sum == 0)
            $sum = 1;

        return view('packet.show') ->with('packages',$packages)
                                    ->with('id',$id)
                                    ->with('Excellent',$Excellent)
                                    ->with('Verygood',$Verygood)
                                    ->with('Average',$Average)
                                    ->with('Poor',$Poor)
                                    ->with('Terrible',$Terrible)
                                    ->with('sum',$sum);
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
        return view('packet.edit')    ->with('packages',$packages);
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
        $packages = Packagesservice::findOrFail($id);      
        
        if(Input::hasFile('files')){
            foreach(Input::file('files') as $file){
                $imageName = rand();
                $imageSur = $file->getClientOriginalExtension();
                $nameimg = $imageName.'.'.$imageSur;

                // $cur_dir = explode('\\', getcwd());
                // $file->move($ddd, $nameimg);
                
                // $ddd =  $cur_dir[count($cur_dir)-1];
                // $ddd = $ddd.'/img/';
                // echo $ddd.$nameimg;
                   $file->move(base_path() . '/public/img/', $nameimg);
                $img = new Image;
                $img->image_name = $nameimg;
                $img->activities_id = $id->id;
                $img->save();
                // echo base_path();
            }
        }

        $packages->update($request->all());
        return redirect('/packet');
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

    public function postreview(Request $request, $id_packet)
    {
        $request['users_id'] = Auth::user()->id;
        $request['packagesservices_id'] = $id_packet;
        Review::create( $request->all() );
        return redirect()->action('PackageController@show', ['id' => $id_packet]);
    }
    
    public function searchform(Request $request)
    {
        $pagenum = 8;
        $search = $request->get('site_search');
        $packages = Packagesservice::where('package_name','like','%'.$search.'%')->paginate($pagenum);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;

        $user = Auth::user();
        return view('packet.index')   ->with('packages',$packages)
                                        ->with('user',$user);
    }
}
