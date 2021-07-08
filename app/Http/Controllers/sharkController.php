<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Shark;
use Validator;
use View;

class sharkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // get all the sharks
        $sharks = shark::all();

        // load the view and pass the sharks
        return View::make('sharks.index')
            ->with('sharks', $sharks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
 	return View::make('sharks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'shark_level' => 'required|numeric'
        );
	$validator=Validator::make($request->all(),[
	      'name'       => 'required',
              'email'      => 'required|email',
              'shark_level' => 'required|numeric'

	]);
        $request->validate([
	      'name'       => 'required',
              'email'      => 'required|email',
              'shark_level' => 'required|numeric'
	]);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('sharks/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
              $shark = new shark;
              $shark->name       = $request->name;
              $shark->email      = $request->email;
              $shark->shark_level = $request->shark_level;
              $shark->save();

            // redirect
            $request->session()->flash('message', 'Successfully created shark!');
            return redirect('sharks');
        }
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
        // get the shark
        $shark = shark::find($id);

        // show the view and pass the shark to it
        return View::make('sharks.show')
            ->with('shark', $shark);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $shark=Shark::find($id);
        return View::make('sharks.edit')
            ->with('shark', $shark);
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
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'shark_level' => 'required|numeric'
        );
        $validator=Validator::make($request->all(),[
	      'name'       => 'required',
              'email'      => 'required|email',
              'shark_level' => 'required|numeric'

        ]);
        $validate =$request->validate($rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('sharks/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $shark = shark::find($id);
            $shark->name       = $request->name;
            $shark->email      = $request->email;
            $shark->shark_level =$request->shark_level;
            $shark->save();

            // redirect
            $request->session()->flash('message', 'Successfully updated shark!');
            return redirect('sharks');
        }
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete a shark
        Shark::destroy($id);
        return redirect('/sharks')->with('success', 'Shark deleted');
    }

    public function search(Request $request)
    {
       if ($request->has('str')){

           $str=$request->str;
           $sharks=Shark::query()
           ->where('name', 'LIKE', "%{$str}%") 
           ->get();

           return View::make('sharks.index')
           ->with('sharks', $sharks);
       } 
    }
}
