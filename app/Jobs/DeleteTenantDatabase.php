<?php

namespace App\Jobs;

use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Jobs\DeleteDatabase;

class DeleteTenantDatabase
{
    protected $tenant;

    public function __construct(TenantWithDatabase $tenant)
    {
        $this->tenant = $tenant;
    }

    public function handle()
    {
        if ($this->tenant->isForceDeleting()) {
            (new DeleteDatabase($this->tenant))->handle();
        }
    }
}
