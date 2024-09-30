<?php

namespace App\Models;

use App\GlobalTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = ['name', 'tenant_id'];

    protected static function boot()
    {
        parent::boot();

        self::addGlobalScope('tenant', function ($builder) {
            $builder->where('tenant_id', app()->get(GlobalTenant::class)->getId());
        });
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
