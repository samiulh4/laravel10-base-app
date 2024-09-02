@extends('LayoutAdmin::layouts.admin')
@include('LayoutAdmin::partials.plugins.dataTable')

@section('styles')
<style>

</style>
@endsection

@section('content')
@if(!empty($breadcrumbs))
    @include('LayoutAdmin::partials.page-header', ['breadcrumbs' => $breadcrumbs])
@endif
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Blogs</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="blogs-datatable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
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
        var table = $('#blogs-datatable').DataTable({
            processing: true,
            serverSide: true,
            iDisplayLength: 10,
            lengthChange: true,
            destroy: true,
            responsive: true,
            //searchDelay: 2000,
            //paging: true,
            searching: true,
            language: {
                //processing: '<i class="fa fa-spinner fa-spin"></i> Loading...'
            },
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                method: 'get',
                url: '{{ url("/admin/blog/get-data") }}',
                data: function (d) {
                    //d.search_paramater = paramater;
                },
            },
            columns: [
                { data: 'index', name: 'index', orderable: false, searchable: false },
                { data: 'title', name: 'blogs.title' },
                { data: 'content', name: 'blogs.content' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            "aaSorting": [],
            lengthMenu: [10, 25, 50, 100]
        });
    });
    $(document).ready(function () {
        //$("#blogs-datatable").DataTable({});
    });
</script>
@endsection