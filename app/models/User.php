<?php

//use Illuminate\Auth\UserTrait;
//use Illuminate\Auth\UserInterface;
//use Illuminate\Auth\Reminders\RemindableTrait;
//use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

//class User extends Eloquent implements UserInterface, RemindableInterface, ConfideUserInterface {
class User extends Eloquent implements ConfideUserInterface {

//  use UserTrait, RemindableTrait, ConfideUser;
    use ConfideUser;

    // This fields can be mass assigned.
    protected $fillable = ['username', 'email', 'password', 'name', 'lastName'];
//
//  public static $rules = [
//    'username' => 'required|unique:users',
//    'email' => 'required|email|unique:users',
//    'password' => 'required'
//  ];
//
//  public $errors;
//
//	/**
//	 * The database table used by the model.
//	 *
//	 * @var string
//	 */
//	protected $table = 'users';
//
//	/**
//	 * The attributes excluded from the model's JSON form.
//	 *
//	 * @var array
//	 */
//	protected $hidden = array('password', 'remember_token');
//
//  public function isValid() {
//    $validation = Validator::make( $this->attributes, static::$rules );
//
//    if($validation->passes()) {
//      return true;
//    }
//
//    $this->errors = $validation->messages();
//    return false;
//  }

}
