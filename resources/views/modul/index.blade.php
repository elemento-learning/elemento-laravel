@extends('layout.base')

@section('content')
    <div class="row">
        <div class="card col-md-12">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">List Modul</h4>
                <div class="card-toolbar">
                    <a href="{{ route('modul.create') }}" class="btn btn-primary btn-sm">
                        Tambah Data
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="tableModul">
                        <thead>
                            <tr>
                                <th scope="col" class="w-5">#</th>
                                <th scope="col" class="w-25">Title</th>
                                <th scope="col" class="w-25">Subtitle</th>
                                <th scope="col" class="w-25">Image</th>
                                <th scope="col" class="w-25">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-script')
<script>
    function renderTable() {
        $.ajax({
            url: apiRoutes.modul,
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+token());
            },
            success: function (response) {
                html = ""
                $.each(response.data, function (index, element) {
                    html += `
                    <tr>
                        <td>${index+1}</td>
                        <td>${element.Title}</td>
                        <td>${element.Subtitle}</td>
                        <td>
                            <img src="${element.ImageUrl}" alt="${element.Title}" height="125"/>
                        </td>
                        <td>
                            <a href="${webRoutes.modulEdit.replace(":id", element.ModulID)}" class="btn btn-warning btn-sm">
                                View/Edit
                            </a>
                            <a href="#" class="btn btn-danger btn-sm">
                                Delete
                            </a>
                        </td>
                    </tr>
                    `
                });

                $("#tableModul").find("tbody").html("")
                if ( $.fn.DataTable.isDataTable('#tableModul') ) {
                    $('#tableModul').DataTable().destroy();
                }
                $("#tableModul").find("tbody").html(html)
                $("#tableModul").DataTable()
            }
        });
    }

    $(function () {
        renderTable()
    });
</script>
@endpush
