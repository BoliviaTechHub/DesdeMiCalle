<?php

class PublicWorksController extends \BaseController {

  protected $publicWork;

  /**
   * Public Work Constructor.
   *
   * @param PublicWork $publicWork
   */
  public function __construct(PublicWork $publicWork) {
    $this->publicWork = $publicWork;
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $publicWorks = $this->publicWork->all();

    return View::make('publicWorks.index', ['publicWorks' => $publicWorks]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    if(Auth::check()) {
      return View::make('publicWorks.create');
    } else {
      return Redirect::to('login');
    }
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    $publicWork = new PublicWork();
    $publicWork->title = Input::get('title');
    $publicWork->description = Input::get('description');
    $publicWork->userId = 1;
    $publicWork->neighborhoodId = 1;
    $publicWork->claimWorkCategoryId = 1;
    $publicWork->publicWorkStatusId = 1;
    $publicWork->save();

    return $this->index();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
    $publicWork = $this->publicWork->whereId($id)->first();
    return View::make('publicWorks.show', ['publicWork' => $publicWork]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
