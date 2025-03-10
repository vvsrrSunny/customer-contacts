<?php

namespace App\Observers;

use App\Models\Customer;

class CustomerObserver
{


    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void
    {
        // Soft delete all associated contacts when a customer is deleted
        $customer->contacts()->delete();
    }
}
