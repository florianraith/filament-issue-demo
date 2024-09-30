<?php

namespace App\Models;

use App\GlobalTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    protected $fillable = ['title', 'tenant_id'];

    protected static function boot()
    {
        parent::boot();

        self::addGlobalScope('tenant', function ($builder) {
            $builder->where('tenant_id', app()->get(GlobalTenant::class)->getId());
        });
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

}
