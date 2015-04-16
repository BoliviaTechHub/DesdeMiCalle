<?php



/**
 * UsersController Class
 *
 * Implements actions regarding user management
 */
class UsersController extends Controller
{

    /**
     * Displays the form for account creation
     *
     * @return  Illuminate\Http\Response
     */
    public function create()
    {
//        return View::make(Config::get('confide::signup_form'));
      return View::make('users.create');
    }

    /**
     * Stores new account
     *
     * @return  Illuminate\Http\Response
     */
    public function store()
    {
        $repo = App::make('UserRepository');
        $user = $repo->signup(Input::all());

        if ($user->id) {
            if (Config::get('confide::signup_email')) {
                Mail::queueOn(
                    Config::get('confide::email_queue'),
                    Config::get('confide::email_account_confirmation'),
                    compact('user'),
                    function ($message) use ($user) {
                        $message
                            ->to($user->email, $user->username)
                            ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
                    }
                );
            }

            return Redirect::action('UsersController@login')
                ->with('notice', Lang::get('confide::confide.alerts.account_created'));
        } else {
            $error = $user->errors()->all(':message');

            return Redirect::action('UsersController@create')
                ->withInput(Input::except('password'))
                ->with('error', $error);
        }
    }

    /**
     * Displays the login form
     *
     * @return  Illuminate\Http\Response
     */
    public function login()
    {
        if (Confide::user()) {
            return Redirect::to('/');
        } else {
//            return View::make(Config::get('confide::login_form'));
          return View::make('sessions.create');
        }
    }

    /**
     * Attempt to do login
     *
     * @return  Illuminate\Http\Response
     */
    public function doLogin()
    {
        $repo = App::make('UserRepository');
        $input = Input::all();

        if ($repo->login($input)) {
            return Redirect::intended('/');
        } else {
            if ($repo->isThrottled($input)) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ($repo->existsButNotConfirmed($input)) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::action('UsersController@login')
                ->withInput(Input::except('password'))
                ->with('error', $err_msg);
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string $code
     *
     * @return  Illuminate\Http\Response
     */
    public function confirm($code)
    {
        if (Confide::confirm($code)) {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');
            return Redirect::action('UsersController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
            return Redirect::action('UsersController@login')
                ->with('error', $error_msg);
        }
    }

    /**
     * Displays the forgot password form
     *
     * @return  Illuminate\Http\Response
     */
    public function forgotPassword()
    {
        return View::make(Config::get('confide::forgot_password_form'));
    }

    /**
     * Attempt to send change password link to the given email
     *
     * @return  Illuminate\Http\Response
     */
    public function doForgotPassword()
    {
        if (Confide::forgotPassword(Input::get('email'))) {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
            return Redirect::action('UsersController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
            return Redirect::action('UsersController@doForgotPassword')
                ->withInput()
                ->with('error', $error_msg);
        }
    }

    /**
     * Shows the change password form with the given token
     *
     * @param  string $token
     *
     * @return  Illuminate\Http\Response
     */
    public function resetPassword($token)
    {
        return View::make(Config::get('confide::reset_password_form'))
                ->with('token', $token);
    }

    /**
     * Attempt change password of the user
     *
     * @return  Illuminate\Http\Response
     */
    public function doResetPassword()
    {
        $repo = App::make('UserRepository');
        $input = array(
            'token'                 =>Input::get('token'),
            'password'              =>Input::get('password'),
            'password_confirmation' =>Input::get('password_confirmation'),
        );

        // By passing an array with the token, password and confirmation
        if ($repo->resetPassword($input)) {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
            return Redirect::action('UsersController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
            return Redirect::action('UsersController@resetPassword', array('token'=>$input['token']))
                ->withInput()
                ->with('error', $error_msg);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return  Illuminate\Http\Response
     */
    public function logout()
    {
        Confide::logout();

        return Redirect::to('/');
    }

    /**
     * Display de specified resource.
     *
     * @param $username
     * @return mixed
     */
    public function show($username) {
        return View::make('users.show', ['user' => $user = User::whereUsername($username)->first()]);
    }

    /**
     * Display the form for edit an user.
     *
     * @param $username
     * @return mixed
     */
    public function edit($username) {
        return 'You\'re here, we\'re not..';
//        return View::make('users.edit', ['user' => User::whereUsername($username)->first()]);
    }

    /**
     * Update the data of an User object.
     *
     * @return mixed
     */
    public function update() {
        $user = User::find(Input::get('id'));

        $validator = Validator::make(
            array(
                'username' => Input::get('username'),
                'email' => Input::get('email')
            ),
            array(
                'username' => 'required|unique:users,username,' . $user->id,
                'email' => 'required|email|unique:users,email,' . $user->id
            )
        );

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator->messages());
        }

        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->name = Input::get('name');
        $user->lastName = Input::get('lastName');
        $user->save();

        return Redirect::to('/users/show/' . $user->username);
    }

    public function delete() {
        $user = User::find(Input::get('id'));
        $user->delete();
    }

    /**
     * Users admin page, that allow to the admin users edit and delete any user in the system.
     *
     * @return mixed
     */
    public function admin() {
        return View::make('users.admin', array('users' => User::all()));
    }

    /**
     * Create a username for a user putting a number before this if the selected username already exists.
     *
     * @param $username
     * @return string
     */
    public function createUsername($username) {
        $counter = 0;
        $usernameToSave = $username;

        do {
            if($counter) {
                $usernameToSave = $username . $counter;
            }

            $user = User::where('username', $usernameToSave)->first();
            $counter++;
        } while (isset($user->id));

        return $usernameToSave;
    }

    /**
     * Create a new user with a random password created hashing the actual time.
     *
     * @param $username
     * @param $email
     * @param $facebookId
     * @return mixed
     */
    public function signupWithRandomPassword($username, $email, $facebookId) {
        $randomPassword = md5(time());
        $repo = App::make('UserRepository');

        return $repo->signup(array(
            'username' => $username,
            'email' => $email,
            'facebook_id' => $facebookId,
            'password' => $randomPassword,
            'password_confirmation' => $randomPassword
        ));
    }

    /**
     * Log the user or create an account with the Facebook data if he hasn't an account.
     *
     * @return null
     */
    public function loginWithFacebook() {

        // get data from input
        $code = Input::get('code');

        // get fb service
        $fb = OAuth::consumer('Facebook');

        // if code is provided get user data and sign in
        if ( !empty( $code ) )
        {

            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken( $code );

            // Send a request with it
            $result = json_decode( $fb->request( '/me' ), true );

            // Verify if the user already exists.
            $user = User::where('facebook_id', $result['id'])->first();

            if(isset($user->id)) {
                Auth::loginUsingId($user->id);
                return Redirect::to('/');
            } else {
                $usersController = new UsersController();
                $username = $usersController->createUsername($result['first_name']);
                $user = $usersController->signupWithRandomPassword($username, $result['email'], $result['id']);
                echo 'userid => ' . $user->id;
            }

        }
        // if not ask for permission first
        else {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
            return Redirect::to( (string)$url);
        }
    }

    /**
     * Log the user or create an account with the Twitter data if he hasn't an account.
     */
    public function loginWithTwitter() {

    }

    /**
     * Log the user or create an account with the Google data if he hasn't an account.
     */
    public function loginWithGoogle() {

    }

    public function test() {
        echo 'test!.. :3 </br>';

        $d1 = mktime(0, 0, 0, 1, 1, 1900);
//        $d2 = mktime(0, 0, 0, 12, 31, 2038);
        $d2 = mktime(0, 0, 0, 12, 31, 2030);
        $datediff = $d2 - $d1;
        echo floor($datediff/(60*60*24));
//        echo floor(($d2 - $d1)/(60*60*24));

        /*
        $randomPassword = md5(time());
        $input = array(
            'username' => 'lolz',
            'email' => 'lolz@lol.com',
            'password' => $randomPassword,
            'password_confirmation' => $randomPassword
        );
        $repo = App::make('UserRepository');
        $user = $repo->signup($input);

        echo 'randomPassword =>' . $randomPassword . '</br>';
        echo 'userid => ' . $user->id;
        */
    }

    public function test2() {
//      return Redirect::action('UsersController@test', array('data' => 'loooooool'));
//      return Redirect::action('UsersController@loginWithFacebook', array('code' => 'loooooool'));

        echo 'test2 !.. :| </br>';

        $user = User::where('username', 'testasdf')->first();

        if(isset($user->id))
            echo $user->id;
        else
            echo 'nhay';
    }
}
