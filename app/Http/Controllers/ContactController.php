<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Customer $customer): JsonResponse
    {
        return response()->json(['message' => 'List of all contacts', 'contacts' => $customer->contacts()->get()]);
    }

    public function store(Customer $customer, ContactRequest $request): JsonResponse
    {
        $contact = $customer->contacts()->create($request->all());

        return response()->json(['message' => 'contact created successfully', 'contact' => $contact]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact): JsonResponse
    {
        return response()->json(['message' => 'contact found', 'contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Customer $customer, ContactRequest $request, Contact $contact): JsonResponse
    {
        $contact = $contact->update($request->all());

        return response()->json(['message' => 'contact updated successfully', 'contact' => $contact]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer, Contact $contact): JsonResponse
    {
        $contact = $contact->delete();

        return response()->json(['message' => 'contact deleted successfully', 'contact' => $contact]);
    }
}
