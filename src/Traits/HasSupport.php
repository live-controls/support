<?php

namespace LiveControls\Support\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use LiveControls\Support\Models\SupportTicket;

trait HasSupport{
    public function supportTickets(): HasMany
    {
        return $this->hasMany(SupportTicket::class, 'user_id');
    }
}