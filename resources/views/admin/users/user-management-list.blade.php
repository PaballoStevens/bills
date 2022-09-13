@extends('layouts.app')

@section('content')

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Users List
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="/admin/groups/user-management-groups-list">
                            <i class="me-1" data-feather="users"></i>
                            Manage Groups
                        </a>
                        <a class="btn btn-sm btn-light text-primary" href="user-management-add-user">
                            <i class="me-1" data-feather="user-plus"></i>
                            Add New User
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Groups</th>
                            <th>Joined Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Groups</th>
                            <th>Joined Date</th>
                            <th>Actions</th>
                        </tr>
                        
                    </tfoot>
                    <tbody>
                        @foreach ($users as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar me-2"><img class="avatar-img img-fluid" src="/uploads/avatars/{{$item->avatar}}" /></div>
                                    {{$item->name}}
                                </div>
                            </td>
                            <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="04706d636176446169656d682a676b69">{{$item->email}}</a></td>
                            <td>@if ($item->user_type == 'customer')
                                Customer
                            @else
                               Administrator
                            @endif</td>
                            <td>
                                @if ($item->user_type == 'customer')
                                <span class="badge bg-yellow-soft text-yellow">Customer</span>
                                @else
                                <span class="badge bg-green-soft text-green">Sales</span>
                                <span class="badge bg-blue-soft text-blue">Developers</span>
                                <span class="badge bg-red-soft text-red">Marketing</span>
                                <span class="badge bg-purple-soft text-purple">Managers</span>
                                <span class="badge bg-yellow-soft text-yellow">Customer</span>
                                @endif
                                
                            </td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format( 'd M Y')}}</td>
                            <td>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="user-management-edit-user/{{$item->id}}"><i data-feather="edit"></i></a>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark" href="user-management-list/{{$item->id}}"><i data-feather="trash-2"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="dataTable-bottom"><nav class="dataTable-pagination"><ul class="dataTable-pagination-list"><li class="active"><li class="pager">{!! $users->links() !!}</li></ul></nav></div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="https://sb-admin-pro.startbootstrap.com/js/datatables/datatables-simple-demo.js"></script>


@endsection