<?php

namespace LiveControls\Support\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use LiveControls\Support\Models\SupportTicket;

trait HasSupport{
    public function supportTickets(): HasMany
    {
        return $this->hasMany(SupportTicket::class, 'user_id');
    }

    public function openSupportTickets(): HasMany
    {
        return $this->hasMany(SupportTicket::class, 'user_id')->where('open', '=', true);
    }

    public function getSupportMemberAttribute(): bool
    {
        
        if(in_array(auth()->id(), config('livecontrols_support.support_users',[])))
        {
            return true;
        }

        if(class_exists('\LiveControls\Groups\GroupsServiceProvider', false)){
            foreach($this->groups as $group)
            {
                if(in_array($group->key, config('livecontrols_support.support_groups', []))){
                    return true;
                }
            }
        }

        return false;
    }
}