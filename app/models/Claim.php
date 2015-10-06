<?php
/**
 * Created by PhpStorm.
 * User: jhtan
 * Date: 1/7/15
 * Time: 12:43 PM
 */

class Claim extends Eloquent {
  /**
   * The database table used by the model.
   *
   * @var string
   */

    protected $table = 'claim';
    protected $fillable = ['title', 'description', 'userId', 'neighborhoodId', 'claimWorkCategoryId', 'latitude', 'longitude'];

    public static $rules = [
        'description' => 'required',
        'claimWorkCategoryId' => 'required',
    ];

    public $errors;

    public function ClaimWorkCategory() {
        return $this->belongsTo('ClaimWorkCategory', 'claimWorkCategoryId');
    }

    public function User() {
        return $this->belongsTo('User', 'userId');
    }

    /*
     * Validation
     */
    public function isValid() {
        $validation = Validator::make( $this->attributes, static::$rules );

        if($validation->passes()) {
            return true;
        }

        $this->errors = $validation->messages();
        return false;
    }
} 