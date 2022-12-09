<?php

namespace App\Models;

use App\Enums\MediaCollectionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
    ];


    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(MediaCollectionEnum::PRODUCT['MAIN_IMAGE'])
            ->useDisk('public')
            ->useFallbackUrl(url('/images/no_image.jpg'))
            ->singleFile();
    }
}
