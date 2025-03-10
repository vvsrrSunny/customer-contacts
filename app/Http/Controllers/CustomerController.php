<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json(['message' => 'List of all customers', 'customers' => Customer::withCount('contacts')
            ->when($request->filled('search'), fn($query) => $query->search($request->search))
            ->when($request->filled('category'), fn($query) => $query->filterByCategory($request->category))
            ->get()]);
    }

    public function store(CustomerRequest $request): JsonResponse
    {
        Log::info("customer", [$request->all()]);
        $customer = Customer::create($request->all());

        return response()->json(['message' => 'customer created successfully', 'customer' => $customer]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer): JsonResponse
    {
        return response()->json(['message' => 'customer found', 'customer' => $customer->loadMissing('contacts')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer): JsonResponse
    {
        $customer = $customer->update($request->all());

        return response()->json(['message' => 'customer updated successfully', 'customer' => $customer]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer): JsonResponse
    {
        $customer = $customer->delete();

        return response()->json(['message' => 'customer deleted successfully', 'customer' => $customer]);
    }
}
