<?php

class ClaimsController extends \BaseController {

    protected $claim;

    /**
    * Claim Constructor.
    *
    * @param Claim $claim
    */
    public function __construct(Claim $claim) {
    $this->claim = $claim;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()	{
        $claims = $this->claim->all()->reverse();

        foreach ($claims as $claim) {
            $user = User::find($claim->userId);
            $claim->user_name = $user->name . ' ' . $user->lastName;

            $claim->parentCategory = ClaimWorkCategory::find($this->getParentCategoryId($claim->id));
        }

        return View::make('claims.index', [
            'claims' => $claims,
            'categories' => ClaimWorkCategory::all(),
            'neighborhoods' => Neighborhood::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::check()) {
            return View::make('claims.create', ['categories' => ClaimWorkCategory::all()]);
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
        $claim = new Claim();
        $claim->title = Input::get('title');
        $claim->description = Input::get('description');
        $claim->userId = Auth::id();
        $claim->neighborhoodId = 1;
        $claim->claimWorkCategoryId = Input::get('categoryId');
        $claim->latitude = Input::get('latitude');
        $claim->longitude = Input::get('longitude');

        // Put as name the first 15 characters of the description.
        if(!strlen($claim->title)) {
            $claim->title = substr($claim->description, 0, 25) . '...';
        }

        $claim->save();

        // The name of the file is created in this way to avoid repetitions.
        // user_id + claim_id + timestamp
        $file_name = Auth::id() . $claim->id . time() . '.' . Input::file('image')->getClientOriginalExtension();

        // Only for test in the server.
//        $claimsImagesFolder = 'images/uploaded/claims/';
        $claimsImagesFolder = '';

        Input::file('image')->move('public/' . $claimsImagesFolder, $file_name);
        $claim->image_url = $claimsImagesFolder . $file_name;
        $claim->save();

        echo '<pre>';
        print_r(Input::all());
        echo '</pre>';

//        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @return mixed
     */
    public function show($id) {
        $claim = Claim::find($id);
        $user = User::find($claim->userId);
        return View::make('claims.show', [
            'claim' => $claim,
            'user_name' => $user->name . ' ' . $user->lastName
        ]);
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

    /**
     * Given the id of a Claim, returns the id of his parent category.
     *
     * @param $claimId
     * @return mixed
     */
    public function getParentCategoryId ($claimId) {
        $claim = Claim::find($claimId);
        $category = ClaimWorkCategory::find($claim->claimWorkCategoryId);
        while($category->parentId != 0) {
            $category = ClaimWorkCategory::find($category->parentId);
        }

        return $category->id;
    }
}
