<?php

namespace App\Models;

use App\Enums\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'reference',
        'category',
        'description',
        'start_date',
    ];

    protected $casts = [
        'category' => Category::class, // Casts 'category' to enum automatically
        'start_date' => 'date:d/m/Y', // Automatically casts to date forma
    ];

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    /**
     * Get the contacts.
     */
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    // filter by category
    public function scopeFilterByCategory($query, $category): Builder
    {
        return $query->where('category', $category);
    }

    // general search
    public function scopeSearch($query, $search): Builder
    {
        return $query->where('name', 'like', "%{$search}%")
            ->orWhere('reference', 'like', "%{$search}%");
    }
}
