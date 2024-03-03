@extends('layout.authlayout')

@section('content')
{{-- login --}}
@include('layout.header')

@include('layout.nav')

{{-- page title --}}
   <div class="container py-4 flex items-center gap-3">
        <a href="index" class="text-primary text-base">
            <i class="fas fa-home"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fas fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Rent</p>
   </div>
{{-- end ng page title --}}

{{-- product page --}}
   <div class="container grid grid-cols-4 gap-6 pt-4 pb-16 items-start">
        {{-- sidebar --}}
        {{-- categories sidebar --}}
        <div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hidden">
            <div class="divide-y divide-gray-200 space-y-5">

                {{-- Location filter --}}
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Location</h3>
                    <div class="mt-4 flex items-center">
                        <input type="text" class="w-full border-yellow-500 focus:border-primary focus:ring-0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="Location">
                    </div>
                </div>
                {{-- end of Location filter --}}

                {{-- Property Type category 1 --}}
                    <div class="pt-4">
                        <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Property Type</h3>
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-gray-600 ml-3 cursor-pointer">Apartment</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="cat-2" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-2" class="text-gray-600 ml-3 cursor-pointer">Condominium</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="cat-3" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-3" class="text-gray-600 ml-3 cursor-pointer">House</label>
                        </div>
                    </div>
                {{-- end category 1 --}}

                {{-- price filter --}}
                    <div class="pt-4">
                        <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Price</h3>
                        <div class="mt-4 flex items-center">
                            <input type="text" class="w-full border-yellow-500 focus:border-primary focus:ring-0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="min">
                            <span class="mx-3 text-gray-500"> - </span>
                            <input type="text" class="w-full border-yellow-500 focus:border-primary focus:ring-0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="max">
                        </div>
                    </div>
                {{-- end of price filter --}}

                {{-- Bedrooms category 2 --}}
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Bedrooms</h3>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-2-1" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-2-1" class="text-gray-600 ml-1 cursor-pointer">1</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="cat-2-2" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-2-2" class="text-gray-600 ml-1 cursor-pointer">2</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="cat-2-3" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-2-3" class="text-gray-600 ml-1 cursor-pointer">3</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="cat-2-4" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-2-4" class="text-gray-600 ml-1 cursor-pointer">4</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="cat-2-5" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-2-5" class="text-gray-600 ml-1 cursor-pointer">5+</label>
                        </div>
                    </div>
                </div>
                {{-- end category 2 --}}

                {{-- Short Term Type category 3 --}}
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Short Term</h3>
                    <div class="flex items-center">
                        <input type="checkbox" id="cat-3-1" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                        <label for="cat-3-1" class="text-gray-600 ml-3 cursor-pointer">Include</label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="cat-3-2" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                        <label for="cat-3-2" class="text-gray-600 ml-3 cursor-pointer">Exclude</label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="cat-3-3" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                        <label for="cat-3-3" class="text-gray-600 ml-3 cursor-pointer">Only</label>
                    </div>
                </div>
                {{-- end category 3 --}}

                {{-- Amenities category 4 --}}
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Amenities</h3>
                    <div class="">
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-4-1" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-4-1" class="text-gray-600 ml-1 cursor-pointer">Balcony</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="cat-4-2" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-4-2" class="text-gray-600 ml-1 cursor-pointer">Swimming Pool</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="cat-4-3" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-4-3" class="text-gray-600 ml-1 cursor-pointer">Gym</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="cat-4-4" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-4-4" class="text-gray-600 ml-1 cursor-pointer">24/7 Security</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="cat-4-5" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-4-5" class="text-gray-600 ml-1 cursor-pointer">Parking</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="cat-4-6" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-4-6" class="text-gray-600 ml-1 cursor-pointer">Pets Allowed</label>
                        </div>
                    </div>
                </div>
                {{-- end category 4 --}}

                {{-- Floor Area filter --}}
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Floor Area</h3>
                    <div class="mt-4 flex items-center">
                        <input type="text" class="w-full border-yellow-500 focus:border-primary focus:ring-0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="0sqm">
                        <span class="mx-3 text-gray-500"> - </span>
                        <input type="text" class="w-full border-yellow-500 focus:border-primary focus:ring-0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="0sqm">
                    </div>
                </div>
                {{-- end of Floor Area filter --}}

            </div>
        </div>
    {{-- end of categories sidebar --}}
    <form method="post" action="{{ route('showrentals.post') }}">
        @csrf
    {{-- Property listings --}}
    <div class="col-span-3">
        <div class="grid grid-cols-1 gap-6 pt-4 pb-16 items-start">
            {{-- Iterate over each property --}}
            @foreach ($properties->unique('id') as $property)
            {{-- Property card --}}
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    {{-- Property image --}}
                    <img src="{{ asset('/storage/images/' . optional($property->image)->image_path) }}" alt="logo">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    </div>
                </div>
                {{-- Property details --}}
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">{{ optional($property->description)->title }}</h4>
                    </a>
                    <p class="text-gray-600">{{ optional($property->description)->description }}</p>
                    <p class="text-xl text-primary font-semibold">
                        @if ($property->monthly_rate)
                            Contact agent for price
                        @else
                            Price: {{ optional($property->rate)->monthly_rate }}
                        @endif
                    </p>
                </div>
                {{-- end of property details --}}
                <a href="{{ route('viewproperty', ['id' => $property->id]) }}" class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">View</a>
            </div>
            {{-- end of property card --}}
        @endforeach



        </div>
    </div>
    {{-- end of Property listings --}}
   </div>
</form>
{{-- end of product page --}}
@include('layout.footer');
@endsection

@section('scripts')
    @parent

    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
@endsection
