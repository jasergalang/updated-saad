<?php

namespace App\Http\Controllers;

use App\Models\{
    Property, Account, Administrator, AdminManageOwner, Owner
};
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function adminpage()
    {
        $owners = Owner::all();
        $properties = Property::all();

        return view('admin.adminpage', compact('owners', 'properties'));
    }
    public function verifylandlord($id)
    {
        $accounts_id = auth()->id();
        $owner = Owner::findOrFail($id);

        // Use find method to retrieve the administrator
        $administrator = Administrator::where('accounts_id', $accounts_id)->first();

        // Check if the administrator is found
        if ($administrator) {
            $owner->verification_status = 'verified';
            $owner->save();

            $owner->administrators()->attach($administrator->id, ['created_at' => now(), 'updated_at' => now()]);

            return redirect()->back()->with('success', 'Landlord verification status updated successfully');
        } else {
            // Handle the case where the administrator is not found
            return redirect()->back()->with('error', 'Administrator not found.');
        }


    }

    public function verifyproperty($id)
    {
        $accounts_id = auth()->id();
        $properties = Property::findOrFail($id);

        $administrator = Administrator::where('accounts_id', $accounts_id)->first();

        if ($administrator) {
            if ($properties->verification_status !== 'verified') {
                $properties->update(['verification_status' => 'verified']);

                // Switch the order of administrator ID and property ID in the attach method
                $properties->administrators()->attach($administrator->id, ['created_at' => now(), 'updated_at' => now()]);

                return redirect()->back()->with('success', 'Property verification status updated successfully');
            } else {
                return redirect()->back()->with('info', 'Property is already verified.');
            }
        } else {
            return redirect()->back()->with('error', 'Administrator not found.');
        }
    }

}
