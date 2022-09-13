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
                <form enctype="multipart/form-data" method="POST" action="/admin/alerts/create">
                    @csrf
                    <div class="mb-4">
                        <input type="hidden" class="border-2 border-gray-300 p-2 w-full" name="Status" value="3"  >
                        <label class=" text-gray-600">EVENT <span class="text-red-500">*</span></label></br>
                        <select name="Event" class="border-2 border-gray-300 p-2 w-full" required>
                            <option >...</option>
                            <option value="Load Shedding">Load Shedding</option>
                            <option value="Water Cuts">Water cuts</option>
                            <option value="Construction">Construction</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class=" text-gray-600">LOCATION <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="location"  >
                    </div>
                    <hr>
                    <div class="mb-4">
                        <label class=" text-gray-600"> FROM TIME <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="from" >
                    </div>
                    <div class="mb-4">
                        <label class=" text-gray-600"> ENDS TIME <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="ends" >
                    </div>
                    <div class="mb-4">
                        <label class=" text-gray-600"> Description <span class="text-red-500">*</span></label></br>
                        <textarea type="text" class="border-2 border-gray-300 p-2 w-full" name="desc" ></textarea>
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