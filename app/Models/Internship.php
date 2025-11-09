<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'company_id',
        'field_id',
		'city_id',
        'attachments',
        'closing_at'
    ];

    protected $dates = ['created_at', 'updated_at', 'closing_at'];

    protected $casts = [
        'closing_at' => 'datetime:Y-m-d'
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function field() {
        return $this->belongsTo(Field::class);
    }

	public function city() {
		return $this->belongsTo(City::class);
	}

    public function skills() {
        return $this->morphToMany(Skill::class, 'skillable');
    }

    public function applications() { // students who applied for this internship
        return $this->belongsToMany(Student::class, 'applications')
            ->withPivot(['cover_letter', 'message', 'attachments', 'created_at'])
            ->withTimestamps();
    }

	public function scopeWithFilters($query, $fields, $companies, $cities, $search) {
		return $query->when(count($fields), function ($query) use ($fields) {
				$query->whereIn('field_id', $fields);
			})
			->when(count($companies), function ($query) use ($companies) {
				$query->whereIn('company_id', $companies);
			})
			->when(count($cities), function ($query) use ($cities) {
				$query->whereIn('city_id', $cities);
			})
			->when(Str::length($search) > 0, function ($query) use ($search) {
				$query->where('title', 'like', "%{$search}%");
			});
	}
}
