@extends('LayoutAdmin::layouts.admin')
@push('css')
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> -->
@endpush

@push('js')
    <!-- Datatables -->
    <script src="{{ asset('assets/admin/assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
@endpush

@section('styles')
<style>

</style>
@endsection

@section('content')
@include('LayoutAdmin::partials.page-header', ['breadcrumbs' => $breadcrumbs])
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Users</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="users-datatable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>User Type</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>User Type</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script type="text/javascript">

    $(function () {

        // var table = $('#users-datatable').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     ajax: "{{ url('/admin/user/get-data') }}",
        //     columns: [
        //         { data: 'name', name: 'name' },
        //         { data: 'email', name: 'email' },
        //         { data: 'user_type_code', name: 'user_type_code' },
        //         { data: 'gender_code', name: 'gender_code' },
        //         { data: 'action', name: 'action', orderable: false, searchable: false },
        //     ]
        // });

    });
    $(document).ready(function () {
        $("#users-datatable").DataTable({});
    });
</script>
@endsection