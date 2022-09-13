@extends('layouts.app')

@section('content')

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="users"></i></div>
                            Groups List
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="/admin/users/user-management-list">
                            <i class="me-1" data-feather="user"></i>
                            Manage Users
                        </a>
                        <button class="btn btn-sm btn-light text-primary" type="button" data-bs-toggle="modal" data-bs-target="#createGroupModal">
                            <i class="me-1" data-feather="plus"></i>
                            Create New Group
                        </button>
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
                            <th>Group Name</th>
                            <th>Total Members</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Group Name</th>
                            <th>Total Members</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($grouplist as $item)
                        <tr>
                            <td>{{$item->GroupName}}</td>
                            <td>8</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format( 'd M Y')}}</td>
                            <td>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark me-2" type="button" data-bs-toggle="modal" data-bs-target="#editGroupModal"><i data-feather="edit"></i></button>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark" href="user-management-groups-list/{{$item->id}}"><i data-feather="trash-2"></i></a>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Create group modal-->
    <div class="modal fade" id="createGroupModal" tabindex="-1" role="dialog" aria-labelledby="createGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createGroupModalLabel">Create New Group</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/groups/user-management-groups-list" method="Post">
                        @csrf
                        <div class="mb-0">
                            <label class="mb-1 small text-muted" for="formGroupName">Group Name</label>
                            <input class="form-control" name="GroupName" type="text" placeholder="Enter group name..." />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger-soft text-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary-soft text-primary" type="submit">Create New Group</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit group modal-->
    <div class="modal fade" id="editGroupModal" tabindex="-1" role="dialog" aria-labelledby="editGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGroupModalLabel">Edit Group</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-0">
                            <label class="mb-1 small text-muted" for="formGroupName">Group Name</label>
                            <input class="form-control" id="formGroupName" type="text" placeholder="Enter group name..." value="Sales" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger-soft text-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary-soft text-primary" type="button">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="https://sb-admin-pro.startbootstrap.com/js/datatables/datatables-simple-demo.js"></script>
<script src="https://assets.startbootstrap.com/js/sb-customizer.js"></script>
<script type="text/javascript">(function(){window['__CF$cv$params']={r:'71df4c682ebe9cec',m:'nlyqlIPQj.HTCd3.Qcx81jx1rk2TmVqWP2M3ImQEs_Q-1655673519-0-Aag8fQzkLfVEPlnuqjVvzw7PNgkZ/TtyVdDQM2cV9JSbg9UlSjZN4Uy5he4VDLMN/L1J2SN7XR4LKeFdr9PqFmI/HbCB6bBvgxpcBneTfpwrMGYo8y9HScLcVC1jmPWtVL1l3zQqp0cLGbqNraZ3oT9eEVM3xI/TDlOPEnGY+/Ed',s:[0xa87d26d135,0xc6d4f6bf8b],u:'/cdn-cgi/challenge-platform/h/g'}})();</script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"71df4c682ebe9cec","token":"6e2c2575ac8f44ed824cef7899ba8463","version":"2022.6.0","si":100}' crossorigin="anonymous"></script>
@endsection