@extends('layouts.app')

@section('content')

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="list"></i></div>
                            Posts List
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="/admin/alerts/create">
                            <i class="me-1" data-feather="plus"></i>
                            Create New Post
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
                            <th>Post Title</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Post Title</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($alertlist as $item)
                        <tr>
                            <td>{{$item->Event}}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format( 'd M Y')}}</td>
                            @if ($item->Status == '3')
                             <td><div class="badge bg-gray-200 text-dark">Draft</div></td>
                            @elseif ($item->Status == '2')
                              <td><div class="badge bg-yellow-soft text-yellow">Pending Approval</div></td>
                            @elseif ($item->Status == '1')
                            <td><div class="badge bg-green-soft text-green">Published</div></td> 
                            @endif
                            
                            <td>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="blog-management-edit-post.html"><i data-feather="edit"></i></a>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark" href="/admin/alerts/management-alerts-list/{{$item->id}}"><i data-feather="trash-2"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="https://sb-admin-pro.startbootstrap.com/js/datatables/datatables-simple-demo.js"></script>
        <script src="https://assets.startbootstrap.com/js/sb-customizer.js"></script>
        <sb-customizer project="sb-admin-pro"></sb-customizer>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"71e644eabc96052a","token":"6e2c2575ac8f44ed824cef7899ba8463","version":"2022.6.0","si":100}' crossorigin="anonymous"></script>

@endsection