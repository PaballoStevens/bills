@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.1.4/dist/tailwind.min.css">
<!-- component -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form enctype="multipart/form-data" method="POST" action="/admin/records/create">
                    @csrf
                    <div class="mb-4">
                        <label class=" text-gray-600">FirstName <span class="text-red-500">*</span></label></br>
                        <select name="Account" class="border-2 border-gray-300 p-2 w-full" required>
                            @foreach ($record as $item)
                             <option value="{{$item->id}}">{{$item->FirstName}} {{$item->LastName}} - {{$item->Location}} </option>
                            @endforeach
                           
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class=" text-gray-600">Balance Brought Forward <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="BalanceBroughtForward"  placeholder="fullname">
                    </div>
                    <hr>
                    <div class="mb-4">
                        <label class=" text-gray-600">Miscellaneous Charges <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="MiscellaneousCharges"  placeholder="company">
                    </div>
                    <div class="mb-4">
                        <label class=" text-gray-600">  Property Rates <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="PropertyRates"  placeholder="company">
                    </div>
                    <div class="mb-4">
                        <label class=" text-gray-600">Waste Management <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="WasteManagement"  placeholder="company">
                    </div>
                    <div class="mb-4">
                        <label class=" text-gray-600">Water <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="Water"  placeholder="company">
                    </div>
                    <div class="mb-4">
                        <label class=" text-gray-600">Sanitation <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="Sanitation"  placeholder="company">
                    </div>
                    <div class="mb-4">
                        <label class=" text-gray-600">VAT 14% on services of R 0.00 <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="VAT14"  placeholder="company">
                    </div>
                    <div class="mb-4">
                        <label class=" text-gray-600"> VAT 15% on services of R 2282.05 <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="VAT15"  placeholder="company">
                    </div>
                    <div class="flex p-1">
                        <button type="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection