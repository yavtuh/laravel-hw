<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'birthdate',
        'email',
        'password',
        'balance',
        'telegram_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wishes()
    {
        return $this->belongsToMany(
            Product::class,
            'wish_list',
            'user_id',
            'product_id'
        );
    }

    public function addToWish(Product $product)
    {
        $this->wishes()->attach($product);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function removeFromWish(Product $product)
    {
        $this->wishes()->detach($product);
    }
    public function fullName(): Attribute
    {
        return new Attribute(
            get: fn() => ucfirst($this->attributes['name']) . ' ' . ucfirst($this->attributes['surname'])
        );
    }
}
