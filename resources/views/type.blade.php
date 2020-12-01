@extends('layouts.parent')

@section('style')

@endsection

@section('content')
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-4">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="m-0">Адууны төрөл</h4>
                                </div>
                                <div class="col-md-2 col-xs-5">
                                    <button id="add" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary add" style="padding-bottom: 10px;"><i class="fa fa-plus" style="color: rgb(255, 255, 255);">Төрөл нэмэх</i></button>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body text-center">

                            <div class="m-scrollable" data-scrollable="true" data-height="400" >
                                <table class="table table-striped table-bordered" id="example">
                                    <thead>
                                    <tr role="row">
                                        <th>#</th>
                                        <th>Төрөл</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($type as $types)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$types->type_name}}</td>
                                            <td class='m1'> <a class='btn btn-xs btn-info update' data-toggle='modal' data-target='#exampleModal' data-id="{{$types->type_id}}" tag='{{$types->type_id}}'><i class="fa fa-pencil-square-o" style="color: rgb(255, 255, 255); "></i></a> </td>
                                        </tr>
                                        <?php $no++; ?>
                                    @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <!-- /.col (right) -->



            <!-- row 2 dood-->
            <div class="row">

                <!-- /.col (left) -->

            </div>
        </div>
    </section>
    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form1" action="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Ажлын гүйцэтгэлийн төлөв бүртгэх цонх</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="inputAddress"> Төрлийн нэр</label>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" class="form-control" id="type_id" name="type_id">
                                <input type="text" class="form-control" id="type_name" name="type_name" placeholder="" maxlength="50">
                            </div>
                           
                        </div>


                    </div>
                    <div class="modal-footer">
                        <div class="col-md-5">
                            <button type="button" class="btn btn-danger delete">Устгах</button>
                        </div>
                        <div class="col-md-7" style="display: inline-block; text-align: right;" >
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
                            <button type="submit" class="btn btn-primary">Хадгалах</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
 
    <script>
        $(document).ready(function() {
            $('#example').dataTable( {
                "language": {
                    "lengthMenu": " _MENU_ бичлэг",
                    "zeroRecords": "Бичлэг олдсонгүй",
                    "info": "_PAGE_ ээс _PAGES_ хуудас" ,
                    "infoEmpty": "Бичлэг олдсонгүй",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Хайлт:",
                    "paginate": {
                        "first":      "Эхнийх",
                        "last":       "Сүүлийнх",
                        "next":       "Дараагийнх",
                        "previous":   "Өмнөх"
                    },
                },
                "pageLength": 50
            } );
        } );
    </script>
    <script>
        $('.update').on('click',function(){
            var title = document.getElementById("modal-title");
            title.innerHTML = "Төрөл засварлах цонх";
            document.getElementById('form1').action = "updatetype";
            document.getElementById('form1').method ="post"
            var itag=$(this).attr('tag');
            $.get('typefill/'+itag,function(data){
                $.each(data,function(i,qwe){
                    $('#type_id').val(qwe.type_id);
                    $('#type_name').val(qwe.type_name);
                  
                });

            });
            $('.delete').show();
        });
    </script>
    <script>
        $('#add').on('click',function(){
           
            var title = document.getElementById("modal-title");
            title.innerHTML = "Төрөл бүртгэх цонх";
            document.getElementById('form1').action = "addtype"
            document.getElementById('form1').method ="post";
            $('#type_name').val('');
          
            $('.delete').hide();
        });
        $('.delete').on('click',function(){
            var itag = $('#type_id').val();

            $.ajax(
                {
                    url: "type/delete/" + itag,
                    type: 'GET',
                    dataType: "JSON",
                    data: {
                        "id": itag,
                        "_method": 'DELETE',
                    },
                    success: function () {
                        alert('Төрөл устгагдлаа');
                    }

                });
            alert('Төрөл устгагдлаа');
            location.reload();
        });
    </script>
@endsection