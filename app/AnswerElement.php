<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int answer_id
 * @property int form_id
 * @property int form_element_id
 * @property string form_element_uniqid
 * @property string title
 * @property string answer
 * @property string created_at
 * @property string updated_at
 *
 */
class AnswerElement extends Model {
	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'created_at' => 'datetime:Y-m-d H:m:s',
		'updated_at' => 'datetime:Y-m-d H:m:s',
	];

	public function form() {
		return $this->belongsTo( Form::class );
	}

	public function answer() {
		return $this->belongsTo( Answer::class );
	}
}
