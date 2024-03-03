@extends('layout.authlayout')

@section('content')
{{-- login --}}
@include('layout.header')

@include('layout.nav')

{{-- viewing --}}
    <div class="container grid grid-cols-5 gap-6 pt-4 pb-16 items-start">
        {{-- product --}}
        <div class="col-span-3 bg-white px-4 py-6 shadow rounded overflow-hidden">
        {{-- imagess --}}
        <div class="container border-b grid grid-cols-1 gap-6 pt-4 pb-3 items-start">
            <div class="gap-6 mt-4">
                <div>
                    <img id="mainImage" class="w-full" src="{{ asset('/storage/images/'.$property->image->image_path) }}" alt="">
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        @foreach ($relatedImages as $image)
                        <img class="w-full cursor-pointer" src="{{ asset('/storage/images/'.$image->image_path) }}" alt=""
                            onclick="swapImages(document.getElementById('mainImage'), this)">
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
        <script>
            function swapImages(mainImage, clickedImage) {
                var tempSrc = mainImage.src;
                mainImage.src = clickedImage.src;
                clickedImage.src = tempSrc;
            }
        </script>
            {{-- place title --}}
            <div class="grid grid-cols-1 gap-6 py-4 px-5 items-start">
                <h1 class="text-4xl font-bold text-primary">{{$property->description->title}}y</h1>
            </div>
            {{-- place location/address --}}
            <div class="flex border-b items-center py-2 px-5">
                <i class="text-primary fa-solid fa-location-dot"></i>
                <h1 class="text-xl font-light text-primary px-5">
                    {{ $property->address->unit_number }}, {{ $property->address->floor }}, {{ $property->address->street }}, {{ $property->address->city }}
                </h1>
            </div>
            {{-- table/details --}}
            <table class="border rounded-lg overflow-hidden">
                <tr class="border-b">
                  <th class="py-2 px-4 font-semibold text-left">Details</th>
                  <th class="py-2 px-4 font-semibold text-left">Amenities</th>
                  <th class="py-2 px-4 font-semibold text-left">Monthly Rate</th>
                </tr>
                <tr>
                  <td class="py-4 px-4 align-top">
                    {{$property->detail->floor_area}}<br>
                    {{$property->detail->furnishing}}<br>
                    {{$property->detail->bedrooms}} Bedrooms<br>
                    {{$property->detail->floor_area}} Bathrooms<br>

                  </td>
                  <td class="py-4 px-4 align-top">
                    @if($property->amenity->balcony)
                    Balcony<br>
                    @endif
                    @if($property->amenity->gym)
                        Gym<br>
                    @endif
                    @if($property->amenity->pool)
                        Pool<br>
                    @endif
                    @if($property->amenity->parking)
                        Parking<br>
                    @endif
                    @if($property->amenity->security)
                        Security<br>
                    @endif
                    @if($property->amenity->pets_allowed)
                        Pets Allowed<br>
                    @endif
                  </td>
                  <td class="py-4 px-4 align-top">
                    ₱30,000
                  </td>
                </tr>
            </table>

        </div>
        {{-- end of product --}}

  {{-- user info --}}
    <div class="col-span-2 bg-white px-4 pb-2 overflow-hidden">

        <div class="grid grid-cols-2 gap-6 pt-4 pb-2 items-start">

            {{-- image --}}
            <div class="col-span-1 bg-white px-2 pb-3 overflow-hidden">
                <div class="flex items-center place-items-center justify-center">
                    <img src="https://www.svgrepo.com/show/507442/user-circle.svg" class="w-24" alt="">
                </div>
            </div>

            {{-- landlord info --}}
            <div class="col-span-1 bg-white pb-3 overflow-hidden">
                <div class="divide-y divide-gray-200 space-y-3">
                    <div class="pt-3">
                        {{-- name --}}
                        <h2 class="text-xl font-semibold">
                            Jhon Doe
                        </h2>

                        {{-- status --}}
                        <h4 class="text-sm">
                            Landlord
                        </h4>

                        {{-- number --}}
                        <h2 class="text-md font-semibold">
                            +63 123 456 7890
                        </h2>
                    </div>
                </div>
            </div>

            {{-- send inquiry section --}}
            <div class="col-span-2 text-center px-2 pb-3 overflow-hidden">
                {{-- etong link pre kukuhain nalang to dun sa list a property, mag lagay nalang ako dun
                    ng place kung saan nila pwede ilagay, tas dahil soc med to, pweding hindi sila mag
                    lagay, and yung only way to contact nlang sila is yung number  --}}
                <a href="facebook link ni landlord" class=" bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                    <i class="fab fa-facebook-square mr-2"></i>
                    Facebook
                </a>
            </div>

            {{-- end of send inquiry section --}}

        </div>

    </div>
    {{-- end of user info --}}
    </div>
{{-- viewing ends --}}

@include('layout.footer');
@endsection
