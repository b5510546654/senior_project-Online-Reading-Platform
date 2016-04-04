<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $fillable = array('tag');
	protected $primaryKey = 'id';

	public function book() {
		return $this->belongsToMany('App\Models\Book');
	}
}