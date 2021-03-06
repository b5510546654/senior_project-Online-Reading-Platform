<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fenos\Notifynder\Notifable;
use Auth;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model {

	use Notifable;
	use SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $fillable = array('name','description','userRatingCount','userRating','criticRating','category','criticRatingCount','user_id');
	protected $primaryKey = 'id';

	public function user() {
		return $this->belongsTo('App\Models\User');
	}

	public function contents() {
		return $this->belongsToMany('App\Models\Content','books_contents', 'book_id', 'content_id')->orderBy('chapter');
	}

	public function comments() {
		return $this->hasMany('App\Models\Comment')->orderBy('rating','DESC');
	}

	public function tags() {
		return $this->belongsToMany('App\Models\Tag', 'book_tags', 'book_id', 'tag_id');
	}

	public function subscribers() {
		return $this->hasMany('App\Models\Subscription');
	}

	public function reviews() {
		return $this->hasMany('App\Models\Review')->orderBy('rating','DESC');
	}

	public function isOwner(){
		if(Auth::check() && Auth::user()->isAdmin())
			return true;
		return $this->user_id == Auth::user()->getKey();
	}
	public function isComic(){
		return $this->category == 'Comic';
	}
	public function donations() {
		return $this->hasMany('App\Models\Donation');
	}

	public function alreadyVote($id){
		$userID = Auth::id();
		$condition = ['user_id' => $userID , 'book_id' => $id];
		$check = DB::table('ratings')->where($condition)->first();
		if($check == null)
			return false;
		return true;
	}

	public function getUserRatingAverage(){
		if($this->userRatingCount > 0)
			return $this->userRating / $this->userRatingCount;
		else
			return 0;
	}

	public function getCriticRatingAverage(){
		if($this->criticRatingCount > 0)
			return $this->criticRating / $this->criticRatingCount;
		else
			return 0;
	}

	public function getTotalSubscribers(){
		return $this->subscribers()->where('active',1)->count();
	}

	public function chapterList(){
		$ret = [];
		$runner = 0;
		foreach ($this->contents as $content ){
			$ret[$runner++] = $content->chapter;
		}
		return $ret;
	}

	public function nextChapter($currentChapter){
		$chapterList = $this->chapterList();
		$currentKey = array_search($currentChapter,$chapterList);
		if($currentKey + 1 >= count($chapterList))
			return -1;
		return $chapterList[$currentKey + 1];
	}

	public function prevChapter($currentChapter){
		$chapterList = $this->chapterList();
		$currentKey = array_search($currentChapter,$chapterList);
		if($currentKey - 1 < 0)
			return -1;
		return $chapterList[$currentKey - 1];
	}
}
