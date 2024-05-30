@extends('layout.base')

@section('content')
    <div class="row">
        <div class="card col-md-12">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">List Magic Card</h4>
                <div class="card-toolbar">
                    <a href="{{ route('magic-card.create') }}" class="btn btn-primary btn-sm">
                        Tambah Data
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="tableMagicCard">
                        <thead>
                            <tr>
                                <th scope="col" class="w-5">#</th>
                                <th scope="col" class="w-25">Nama Molekul</th>
                                <th scope="col" class="w-25">User Molekul</th>
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
            url: apiRoutes.magicCard,
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+token());
            },
            success: function (response) {
                html = ""
                $.each(response.data, function (index, element) {
                    html += `
                    <tr>
                        <td>${index+1}</td>
                        <td>${element.NamaMolekul}</td>
                        <td>${element.UnsurMolekul}</td>
                        <td>
                            <img src="${element.ImageUrl}" alt="${element.Title}" height="125"/>
                        </td>
                        <td>
                            <a href="${webRoutes.magicCardEdit.replace(":id", element.ID)}" class="btn btn-warning btn-sm">
                                View/Edit
                            </a>
                            <a href="#" class="btn btn-danger btn-sm">
                                Delete
                            </a>
                        </td>
                    </tr>
                    `
                });

                $("#tableMagicCard").find("tbody").html("")
                if ( $.fn.DataTable.isDataTable('#tableMagicCard') ) {
                    $('#tableMagicCard').DataTable().destroy();
                }
                $("#tableMagicCard").find("tbody").html(html)
                $("#tableMagicCard").DataTable()
            }
        });
    }

    $(function () {
        renderTable()
    });
</script>
@endpush
