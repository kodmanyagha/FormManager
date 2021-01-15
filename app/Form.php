<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int user_id
 * @property string slug
 * @property string title
 * @property string type
 * @property string status
 * @property string end_date
 * @property int max_answer
 * @property string passive_message
 * @property string gratitude_selection
 * @property string gratitude_page
 * @property string gratitude_link
 * @property string feedback_email
 *
 * @property string created_at
 * @property string updated_at
 *
 * @property object user
 * @property array form_lements
 * @property array answers
 *
 * @author Emir Buğra Köksalan
 */
class Form extends Model {
	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'created_at' => 'datetime:Y-m-d H:m:s',
		'updated_at' => 'datetime:Y-m-d H:m:s',
	];

	public function user() {
		return $this->belongsTo( User::class );
	}

	public function formElements() {
		return $this->hasMany( FormElement::class );
	}

	public function answers() {
		return $this->hasMany( Answer::class );
	}
}
