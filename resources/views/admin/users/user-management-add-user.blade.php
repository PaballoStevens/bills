@extends('layouts.app')

@section('content')
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg></div>
                            Add User
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="user-management-list">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left me-1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                            Back to Users List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="https://sb-admin-pro.startbootstrap.com/assets/img/demo/user-placeholder.svg" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <button class="btn btn-primary" type="button">Upload new image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form action="/admin/users/user-management-add-user" method="Post">
                            @csrf
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Enter your first name" >
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="">
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" name="email" type="email" placeholder="Enter your email address" value="">
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Password</label>
                                <input class="form-control" name="password" type="password" placeholder="Enter your email address" value="1234567">
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Password_Confirmation</label>
                                <input class="form-control" name="password_confirmation" type="password" placeholder="Enter your email address" value="1234567">
                            </div>
                            <!-- Form Group (Group Selection Checkboxes)-->
                            <div class="mb-3">
                                <label class="small mb-1">Group(s)</label>
                                @foreach ($group as $item)
                                <div class="form-check">
                                    <input class="form-check-input" name="group" type="checkbox" >
                                    <label class="form-check-label" for="groupSales">{{$item->GroupName}}</label>
                                </div>
                                @endforeach
                                
                            </div>
                            <!-- Form Group (Roles)-->
                            <div class="mb-3">
                                <label class="small mb-1">Role</label>
                                <select class="form-select" name="user_type" aria-label="Default select example">
                                    <option selected="" disabled="">Select a role:</option>
                                    <option value="admin">Administrator</option>
                                    <option value="customer">customer</option>
                                </select>
                            </div>
                            <!-- Submit button-->
                            <button class="btn btn-primary" type="submit">Add user</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection