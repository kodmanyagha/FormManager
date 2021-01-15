<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int user_id
 * @property int form_id
 * @property string uniqid
 * @property int order_no
 * @property string title
 * @property string description
 * @property string type
 * @property bool required
 * @property string required_text
 * @property string html_content
 * @property string properties
 * @property string created_at
 * @property string updated_at
 *
 * @author Emir Buğra Köksalan
 */
class FormElement extends Model {
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

	public function user() {
		return $this->belongsTo( User::class );
	}
}
