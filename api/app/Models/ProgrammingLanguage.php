<?php

namespace App\Models;

use App\Model\Entity\Site;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProgrammingLanguage extends Model
{
    use HasFactory;
	protected $table = "ProgrammingLanguages";
	protected $primaryKey = "ID";

	public $timestamps = false;

	protected $fillable = [
		"Name",
		"Icon"
	];

	public function sites() : BelongsToMany {
		return $this->belongsToMany(Site::class, "SiteLanguagesUsed");
	}
}
