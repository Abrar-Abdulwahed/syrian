<?php

namespace App\Models;

use App\Models\User;
use App\Models\ProviderProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'thumbnail',
        'price',
        'discount',
    ];

    // Accessor
    protected function attachmentPath(): Attribute
    {
        return Attribute::make(
            get: fn () => '/products' . '/' . $this->id,
        );
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
