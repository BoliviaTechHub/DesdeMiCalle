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
    public function index($newClaimId = '')	{
        isset($_GET['type']) ? $claimType = $_GET['type'] : $claimType = 'all';
        $claims = Claim::all()->reverse();

        // TODO: Maybe there is a best way to do this.. :S
        // http://laravel.com/docs/4.2/eloquent#eager-loading
        $claimsResult = array();
        foreach ($claims as $claim) {
            $user = User::find($claim->userId);
            $claim->user_name = $user->name . ' ' . $user->lastName;
            $claim->parentCategory = ClaimWorkCategory::find($this->getParentCategoryId($claim->id));
            if($claimType == 'all' || $claimType == $claim->parentCategory->class) {
//                if($claim->isChecked) {
                    $claimsResult[] = $claim;
//                }
            }
        }

        // Get the new Claim.
        $newClaim = new stdClass();
        $newClaimClass = '';
        if(strlen($newClaimId)) {
            $newClaim = Claim::find($newClaimId);
            $newClaimClass = 'newClaim';
        }

        $claims = $claimsResult;
        return View::make('claims.index', [
            'claims' => $claims,
            'categories' => ClaimWorkCategory::all(),
            'neighborhoods' => Neighborhood::all(),
            'claimType' => $claimType,
            'newClaimClass' => $newClaimClass,
            'newClaimId' => $newClaimId,
            'newClaim' => $newClaim
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
     * Show the form for export the claims in a pdf file.
     *
     * @return mixed
     */
    public function export()
    {
        // TODO Add here the option to show all the claims if the user is admin.
        $claims = Claim::with('ClaimWorkCategory')->where('userId', Auth::id())->get();

        // TODO This var sucks!
        $idsString = "";

        // TODO Research a best approach for get the parent category.
        foreach($claims as $claim) {
            $claim->parentCategory = ClaimWorkCategory::find($this->getParentCategoryId($claim->id));
            $idsString .= $claim->id . ',';
        }

        if (Auth::check()) {
            return View::make('claims.export', [
                'claims' => $claims,
                'idsString' => $idsString
            ]);
        } else {
            return Redirect::to('login');
        }
    }

    public function get_report()
    {
        $ids = $_GET['q'];
        $claimsIds = explode(',', $ids);
        $user = User::find(Auth::id());

        $claims = '';
        foreach($claimsIds as $claimId) {
            if(strlen($claimId)) {
                $claim = Claim::find($claimId);

                // TODO Research a best approach for get the parent category.
                $claim->parentCategory = ClaimWorkCategory::find($this->getParentCategoryId($claim->id));

                $claims .= '
            <tr>
				<td align="center">' . $claim->parentCategory->name . '<span class="icon icon-bin"></span></td>
                <td align="center">' . $claim->claimWorkCategory->name . '</td>
                <td align="center">' . $claim->title . '</td>
                <td align="center">' . date("F/j/Y G:i", strtotime($claim->created_at)) . '</td>
                <td align="center">' . $claim->User->username . '</td>
                <td align = "center" ><div class="text-success" > ';

                if($claim->isChecked) {
                    $claims .= 'Verificado';
                } else {
                    $claims .= 'No Verificado';
                }


                $claims .= '</div ></td ></tr>';
            }
        }

        $pdf = PDF::make();
        $pdf->addPage('<!DOCTYPE html>
<html>
	<head>
		<link href="assets/css/icons.css" rel="stylesheet">
		<style type="text/css">
		body, table, td{
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	color: #727272;
	font-size:9px;
}
td{
	padding:2px;
}
div.pageOutput
{
    page-break-after: always;
}
.FormGrid td{
	border-bottom: 1px solid #BCBCBC;
}
.FormGridBox td{
	border: 1px solid #BCBCBC;
}
.FormGrid .FormSubTitle {
	background-color: #EFEFEF;
	border-right: 1px solid #fff;
	border-bottom: 1px solid #fff;
	color:#000000;
	text-transform: uppercase;
	padding: 2px 0px;
}
.FormPageTitle{
	padding: 8px 0px;
	font-size: 24px;
	font-weight: bold;
	font-family: Century Gothic,sans-serif;
}	
.FormSubTitle {
	background-color: #CECECE;
	/*border-right: 1px solid #A5A5A5;*/
	color:#000000;
	text-transform: uppercase;
	padding: 2px 4px;
}
.FormTitle{
	font-family: Century Gothic,sans-serif;
	font-weight: bold;
	border-bottom: 3px solid #cccccc;
	border-left: 0px solid #cccccc;
	color: #ffffff;
	background-color: #727272;
	padding: 15px 0px;
	text-align: center;
	font-size:20px;	
}
.FormLabel{
	color: #000000;
	font-size:9px;
	padding-top: 10px;	
	font-weight: bold;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
}
.FormLabel2 {
	border-right: 1px solid #BCBCBC;
	font-weight: bold;
	font-size:9px;
	color: #4f4f4f;
}
.FormLabel3 {
	border-right: 1px solid #BCBCBC;
	text-align: center;
}
.FormArea{
	margin-top: 10px;	
}
.FormBox{
  border: 1px solid #727272;
}
.FormBox2{
  border-top: 1px solid #727272;
}
pre.FormInform, pre{
	font-size:9px;
	line-height: 9px;
	color: #4f4f4f;	
}
pre br{
	line-height: 2px;
}
.icon {
  font-family: "IcoMoon";
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  font-size: 15px;
}
		</style>
	</head>
	<body>
		<table border="0" width="100%" class="FormGridBox" cellpadding="0" cellspacing="0">
			<tr>
				<td colspan="6" class="FormTitle" align="center">
					Reporte de Reclamos
				</td>
			</tr>
			<tr>
				<td class="FormSubtitle" align="center" colspan="6">
					<b>Fecha de emision del reporte:</b> ' . date("F/j/Y G:i", time()) . ' |
					<b>Usuario:</b> ' . $user->name . ' ' . $user->lastName . '
				</td>
			</tr>
			<tr>
				<td class="FormSubtitle" align="center"><b>Tipo</b></td>
				<td class="FormSubtitle" align="center"><b>Problema</b></td>
				<td class="FormSubtitle" align="center"><b>Nombre del reclamo</b></td>
				<td class="FormSubtitle" align="center"><b>Fecha de creaci&oacute;n</b></td>
				<td class="FormSubtitle" align="center"><b>Usuario Reclamante</b></td>
				<td class="FormSubtitle" align="center"><b>Verificaci&oacute;n</b></td>
			</tr>' . $claims . '
		</table>

		<table border="0" width="100%" class="FormGridBox" cellpadding="0" cellspacing="0">
			<tr>
				<td class="FormSubtitle" >El presente reporte fue realizado en la aplicacion <a href="www.desdemicalle.org">Desde mi Calle</a>, Todos los derechos reservados.</td>
			</tr>
		</table>

	</body>
</html>');

        $headers = array(
            'Content-Description'       => 'File Transfer',
            'Content-Type' 				=> 'application/pdf',
            'Content-Transfer-Encoding' => 'binary',
            'Content-Disposition'		=> 'attachment; filename="file.pdf"',
            'Expires'                   => 0,
            'Cache-Control'             => 'must-revalidate, post-check=0, pre-check=0',
            'Pragma'                    => 'public',
        );

        return Response::make($pdf->send(), 200, $headers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        $claim = new Claim();
        $claim->title = Input::get('title');
        $claim->description = Input::get('description');
        $claim->userId = Auth::id();
        $claim->neighborhoodId = 1;
        $claim->claimWorkCategoryId = Input::get('categoryId');
        $claim->latitude = Input::get('latitude');
        $claim->longitude = Input::get('longitude');

        // Validation
        $input['claimWorkCategoryId'] = Input::get('categoryId');
        if(!$this->claim->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->claim->errors);
        }

        // If the claim is send from facebook.org app
        if (Input::get('fbo')) {
            $claim->userId = 6666666;
        }

        // TODO Change this after presentation!!.. ò_ó
        // Change made.. :v
        $claim->isChecked = false;

        // Put as name the first 15 characters of the description.
        if (!strlen($claim->title)) {
            $claim->title = substr($claim->description, 0, 25) . '...';
        }

        $claim->save();

        // Put an image in the Claim if it exists.
        if (Input::file('image')) {
            // The name of the file is created in this way to avoid repetitions.
            // user_id + claim_id + timestamp
            $file_name = Auth::id() . $claim->id . time() . '.' . Input::file('image')->getClientOriginalExtension();

            // The place where the image will be saved and their public url.
            $claimsImagesPublicUrl = 'images/uploaded/claims/';
            $claimsImagesFolder = public_path() . '/' . $claimsImagesPublicUrl;

            // Saving the image and updating the Claim object.
            Input::file('image')->move($claimsImagesFolder, $file_name);
            $claim->image_url = $claimsImagesPublicUrl . $file_name;
            $claim->save();

            // Saving a small copy of the image.
            $claimsSmallImagesPublicUrl = 'images/uploaded/claims/small/';
            $claimsSmallImagesFolder = public_path() . '/' . $claimsSmallImagesPublicUrl;
            $smallImage = new Imagick($claimsImagesFolder . $file_name);
            $smallImage->resizeImage(400,0,Imagick::FILTER_LANCZOS,1);
            $smallImage->writeImage($claimsSmallImagesFolder . $file_name);

            // Saving a thumb copy of the image.
            $claimsThumbImagesPublicUrl = 'images/uploaded/claims/thumb/';
            $claimsThumbImagesFolder = public_path() . '/' . $claimsThumbImagesPublicUrl;
            $thumbImage = new Imagick($claimsImagesFolder . $file_name);
            $thumbImage->resizeImage(100,0,Imagick::FILTER_LANCZOS,1);
            $thumbImage->writeImage($claimsThumbImagesFolder . $file_name);
        }

        // If the claim is send from facebook.org app
        if (Input::get('fbo')) {
            return $this->fboIndex();
        } else {
            return $this->index($claim->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @return mixed
     */
    public function show($id) {
        $claim = Claim::find($id);
        $claim->childCategory = ClaimWorkCategory::find($claim->claimWorkCategoryId);
        $claim->parentCategory = ClaimWorkCategory::find($this->getParentCategoryId($claim->id));
        $user = User::find($claim->userId);

        // Check if there is a small version of the image.
        $smallImageUrl = str_replace('claims/', 'claims/small/', $claim->image_url);
        if(file_exists(public_path() . '/' . $smallImageUrl)) {
            $claim->image_url = $smallImageUrl;
        }

        return View::make('claims.show', [
            'claim' => $claim,
            'user_name' => $user->name . ' ' . $user->lastName,
            'image_url' => $claim->image_url
        ]);
    }

    public function admin()
    {
        if(Auth::check() && User::find(Auth::id())->can('edit_claims')) {
            return View::make('claims.admin', array(
                'claims' => Claim::all()->reverse()
            ));
        } else {
            return View::make('forbidden');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(Auth::check() && User::find(Auth::id())->can('edit_claims')) {
            return View::make('claims.edit', array('claim' => Claim::find($id)));
        } else {
            return View::make('forbidden');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
//    TODO: public function update($id)
    public function update()
    {
        $claim = Claim::find(Input::get('id'));

        $claim->title = Input::get('title');
        $claim->description = Input::get('description');

        if(Input::get('isChecked')) {
            $claim->isChecked = true;
        } else {
            $claim->isChecked = false;
        }

        $claim->save();

        return Redirect::to('/claims/' . $claim->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete() {
        $claim = Claim::find(Input::get('id'));
        $claim->delete();
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

    public function fboIndex () {
        $claims = DB::table('claim')->where('isChecked', 1)->orderBy('id', 'desc')->paginate(10);

        // TODO: Maybe there is a best way to do this.. :S
        // http://laravel.com/docs/4.2/eloquent#eager-loading
        foreach ($claims as $claim) {
            $user = User::find($claim->userId);
            $claim->user_name = $user->name . ' ' . $user->lastName;
            $claim->parentCategory = ClaimWorkCategory::find($this->getParentCategoryId($claim->id));
        }

        return View::make('fbo.claimsIndex', [
            'claims' => $claims
        ]);
    }

    public function fboShow($id) {
        $claim = Claim::find($id);
        $user = User::find($claim->userId);
        $claim->user_name = $user->name . ' ' . $user->lastName;
        $claim->parentCategory = ClaimWorkCategory::find($this->getParentCategoryId($claim->id));

        return View::make('fbo.claimsShow', [
            'claim' => $claim
        ]);
    }

    public function fboCreate() {
        return View::make('fbo.claimsCreate', [
            'categories' => ClaimWorkCategory::all()
        ]);
    }
}
