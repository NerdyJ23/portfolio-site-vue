<?php

namespace App\Models;

use App\Models\ProgrammingLanguage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Site extends Model
{
    use HasFactory;

	protected $table = "Sites";
	protected $primaryKey = "ID";

	public $timestamps = false;

	protected $fillable = [
		"Name",
		"Description",
		"Url",
		"Repo",
		"Date",
		"ImagesDirectory",
		"Visible"
	];

	public function languages() : BelongsToMany {
		return $this->belongsToMany(ProgrammingLanguage::class, "SiteLanguagesUsed");
	}
}
