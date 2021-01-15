<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int form_id
 * @property string ip
 * @property string useragent
 * @property string created_at
 * @property string updated_at
 *
 */
class Answer extends Model {
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

	public function answerElements() {
		return $this->hasMany( AnswerElement::class );
	}
}
