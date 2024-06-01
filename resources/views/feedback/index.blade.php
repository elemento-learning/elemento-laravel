@extends('layout.base')

@section('content')
    <div class="row">
        <div class="card col-md-12">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">List Feedback</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="tableFeedback">
                        <thead>
                            <tr>
                                <th scope="col" class="w-5">#</th>
                                <th scope="col" class="w-25">Name</th>
                                <th scope="col" class="w-25">Type</th>
                                <th scope="col" class="w-25">Feedback</th>
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
            url: apiRoutes.quiz,
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+token());
            },
            success: function (response) {
                html = ""
                // $.each(response.data, function (index, element) {
                for (let index = 0; index < 25; index++) {
                    html += `
                    <tr>
                        <td>${index+1}</td>
                        <td>Siswa 1</td>
                        <td>Feedback Type</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, asperiores et error consequuntur harum earum dolorum quam rem minus a eligendi laudantium quasi suscipit dolores porro, doloremque sed corporis ipsa.</td>
                    </tr>
                    `
                }
                // });

                $("#tableFeedback").find("tbody").html("")
                if ( $.fn.DataTable.isDataTable('#tableFeedback') ) {
                    $('#tableFeedback').DataTable().destroy();
                }
                $("#tableFeedback").find("tbody").html(html)
                $("#tableFeedback").DataTable()
            }
        });
    }

    $(function () {
        renderTable()
    });
</script>
@endpush
