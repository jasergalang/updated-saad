<?php

namespace App\Http\Controllers;

use App\Models\{
    Tenant, Inquiry, Property, Owner, Contract
};
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContractController extends Controller
{
    public function tenantcontract()
    {
        $inquiries_id = session('id');
        $propertyTitle = session('propertyTitle');
        $tenantDetails = session('tenantDetails');
        $inquiry = session('inquiry');

        return view('tenant.tenantcontract', compact('propertyTitle', 'tenantDetails', 'inquiry', 'inquiries_id'));
    }
    //In viewproperty
    public function inquire(Request $request)
    {
        $accountId = auth()->user()->id;
        if (!$request->has('properties_id') || !Property::where('id', $request->input('properties_id'))->exists()) {
            return redirect()->back()->with('error', 'Invalid or missing properties_id')->withInput();
        }
        $property = Property::findOrFail($request->properties_id);

        if ($property->owner->id == $accountId) {
            return redirect()->back()->with('error', 'You cannot inquire about your own property!');
        }
        $tenant = Tenant::where('accounts_id', $accountId)->first();
        Inquiry::create([
            'tenants_id' => $tenant->id,
            'owners_id' => $property->owner->id,
            'properties_id' => $property->id,
        ]);

        return redirect()->back()->with('success', 'Inquiry submitted successfully!');
    }
    //in inquiriesform
    public function inquiriesform()
    {
        $inquiries = Inquiry::with(['tenant.account', 'property.description'])->get();
        return view('tenant.inquiriesform', compact('inquiries'));
    }
    public function acceptInquiry($id)
    {
        $inquiry = Inquiry::findOrFail($id);

        $authenticatedUserId = auth()->user()->id;

        $owner = Owner::where('accounts_id', $authenticatedUserId)->first();

        if (!$owner || $owner->id != $inquiry->property->owner->id) {
            return redirect()->back()->with('error', 'Unauthorized action!');
        }

        $inquiry->update(['inquiry_status' => 'accepted']);
        $property = $inquiry->property;
        $tenant = $inquiry->tenant;

        $propertyTitle = $property->description->title;
        $tenantDetails = $tenant->account;

        session([
            'inquiry' => $inquiry,
            'propertyTitle' => $propertyTitle,
            'tenantDetails' => $tenantDetails,
            'id' => $id,
        ]);

        return redirect()->route('tenantcontract')->with('success', 'Inquiry accepted successfully!');

    }
    public function rejectInquiry($id)
    {
        $inquiry = Inquiry::findOrFail($id);

        // Retrieve authenticated user's ID
        $authenticatedUserId = auth()->user()->id;

        // Find the owner with the corresponding accounts_id
        $owner = Owner::where('accounts_id', $authenticatedUserId)->first();

        if (!$owner || $owner->id != $inquiry->property->owner->id) {
            return redirect()->back()->with('error', 'Unauthorized action!');
        }

        $inquiry->update(['inquiry_status' => 'rejected']);

        return redirect()->back()->with('success', 'Inquiry rejected successfully!');

    }
    public function createContract(Request $request, $inquiries_id)
    {
        $request->validate([
            'payment_method' => 'required|in:Digital,Physical',
            'payment_agreement' => 'required|in:Daily,Weekly,Monthly',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $contractData = [
            'inquiries_id' => $inquiries_id,
            'payment_method' => $request->input('payment_method'),
            'payment_agreement' => $request->input('payment_agreement'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ];

        $contract = Contract::create($contractData);
        session(['contract' => $contract]);

        return redirect()->back()->with('success', 'Contract created successfully');
    }
    public function paymentform()
    {
        return view('tenant.paymentform');
    }
    public function paymentformPost()
    {

    }
}
