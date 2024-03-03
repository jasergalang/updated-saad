@extends('layout.authlayout')

@section('content')

@include('layout.header')

@include('layout.nav')


{{-- account wrapper --}}
<div class="container p-6 bg-white">
    <div class="container pt-4 pb-4 mx-5" >
        <div class="flex items-center">
            <img src="https://www.svgrepo.com/show/507442/user-circle.svg" class="w-40 mr-10" alt="">
            <h3 class="text-xl font-semibold">
                John Doe
            </h3>
            <i class="fa-solid fa-minus mx-4"></i>
            <h5 class="text-sm font-light text-gray-400 hover:text-primary cursor-pointer">
                Edit Profile
            </h5>
        </div>
    </div>

    <div class="container gap-6 border-t pt-4 pb-16 items-start">

        <div class=" bg-white px-4 pb-2 overflow-hidden">
            <div class="mr-14">
                <h3 class="text-xl font-semibold">
                   Property Lists
                </h3>
            </div>

            <div class="overflow-x-auto py-5 my-3 bg-gray-300 rounded-lg">
                <table class="table-auto w-full border-transparent">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b border-r border-gray-400" style="width: 20%;">Photo</th>
                            <th class="px-4 py-2 border-b border-r border-gray-400" style="width: 35%;">Place Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($properties as $property)
                        <tr>
                            <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">
                                <img src="{{ $property->images->first()->url ?? '' }}" alt="Property Photo">
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">{{ $property->description->description }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>

        <div class="container border-t border-b rounded-md bg-white h-24">
            {{-- idk --}}
        </div>

        <div class=" bg-white px-4 pb-2 overflow-hidden ">
            <div class="mr-14 flex items-center">
                <h3 class="text-xl mt-10 font-semibold">
                    Reviews and Feedback
                </h3>
            </div>
        </div>

        <div class="container border-t border-b rounded-md bg-white h-24">
            {{-- idk --}}
        </div>

        <div class="bg-white px-4 pb-2 overflow-hidden">
            <div class="mr-14 flex items-center">
                <h3 class="text-xl mt-10 font-semibold">
                    Tenants Table
                </h3>
            </div>
        </div>

        <div class="container border rounded-md bg-white py-4 mt-4 overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="px-4 py-2 text-center">Name</th>
                        <th class="px-4 py-2 text-center">Contact No.</th>
                        <th class="px-4 py-2 text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">John Doe</td>
                        <td class="px-4 py-2 text-center">123-456-7890</td>
                        <td class="px-4 py-2 text-center">Active</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">Jack Smith</td>
                        <td class="px-4 py-2 text-center">456-789-0123</td>
                        <td class="px-4 py-2 text-center">Inactive</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center">Jane Black</td>
                        <td class="px-4 py-2 text-center">456-789-0123</td>
                        <td class="px-4 py-2 text-center">Inactive</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>

    </div>
</div>
{{-- account wrapper --}}

@include('layout.footer');
@endsection
