@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-main navbar-expand-lg  px-0 mx-4 shadow-none border-radius-xl z-index-sticky " id="navbarBlur"
        data-scroll="false">
        <div class="container-fluid py-1 px-3">
            @include('layouts.navbars.auth.topnav', ['title' => trans('words.rolemanagement')])
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            
            <ul class="navbar-nav  justify-content-end ms-md-auto pe-md-3 d-flex align-items-center">
                
                <li class="nav-item d-flex align-items-center">
                    @include('auth.logout')
                </li>
                @if(auth()->user()->id !=1)
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="#" onclick='profileSetting(<?php echo auth()->user()->id; ?>);'>
                        <span class=''>
                            <i class="fa fa-user me-sm-0" style="color: white;"></i>
                        </span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">@lang('words.rolemanagement')</h5>
                        @if (!config('app.is_demo'))
                            <a href="{{ route('role-new') }}" class="btn bg-gradient-dark btn-sm float-end mb-0">Add
                                Role</a>
                        @endif
                    </div>
                    <div class="px-4" id="alert">
                        @include('components.alert')
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        @lang('words.name')
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    @lang('words.description')
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    @lang('words.creationdate')
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    @lang('words.action')
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="text-sm font-weight-normal">{{ $role->name }}</td>
                                        <td class="text-sm font-weight-normal">{{ $role->description }}</td>
                                        <td class="text-sm font-weight-normal">{{ $role->created_at }}</td>
                                        <td class="text-sm">
                                            <span class="d-flex">
                                                @can('manage-users', auth()->user())
                                                    <a href="{{ route('role-edit', $role->id) }}" class="me-3"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit role">
                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                    </a>
                                                    @if (!config('app.is_demo'))
                                                        <form action="{{ route('role-destroy', $role->id) }}" method="post">
                                                            @csrf
                                                            <button
                                                                onclick="confirm('Are you sure you want to remove the role?') || event.stopImmediatePropagation()"
                                                                data-bs-toggle="tooltip" data-bs-original-title="Delete role"
                                                                class="border-0 bg-white">
                                                                <i class="fas fa-trash text-secondary"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endcan
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script src="/assets/js/plugins/datatables.js"></script>
    <script>
        function profileSetting(user){
            window.location.href = "/profileView/"+user;
        }

        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true,
            columns: [{
                select: [3],
                sortable: false
            }]
        });
    </script>
@endpush
