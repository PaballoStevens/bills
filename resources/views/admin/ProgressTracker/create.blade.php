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
                <form enctype="multipart/form-data" method="POST" action="/admin/Progress%20Tracker/create">
                    @csrf

                    <div class="mb-4">
                        <input type="hidden" class="border-2 border-gray-300 p-2 w-full" name="user_id" value="{{Auth::user()->id}}">
                    </div>
                   
                    <div class="mb-4">
                        <label class=" text-gray-600">Task Name <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="task_name"  placeholder="fullname">
                    </div>
                    <hr>
                    <div class="mb-4">
                        <label class=" text-gray-600">Progress % <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="progress"  placeholder="Progress %">
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