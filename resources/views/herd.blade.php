@extends('layouts.parent')

@section('style')
<style>
    .table td,
    .table th {
        font-size: 10px;
    }
    .myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

.myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}


</style>
@endsection

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Үндсэн бүртгэл</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Бүртгэл</a></li>
                <li class="breadcrumb-item active">Адуу бүртгэл</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="#" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" data-toggle="modal"
                data-target="#exampleModal"> <i class="fa fa-plus" aria-hidden="true"></i> Адуу бүртгэх</a>
        </div>
    </div>

    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="count_year">Тооллогын жил</label>
                        <select class="form-control" id="count_year" name="count_year" onchange="javascript:location.href = 'filter_countyear/'+this.value;">
                         
                          @foreach ($years as $i=>$item)                     
                          <option value="{{ $item->year_id }}" @if($item->year_id==$year) selected @endif>{{ $item->year_name }}</option>
                          @endforeach
                        </select>
                      </div>
                   
                </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="count_year">Төрөл</label>
                      <select class="form-control" id="type" name="type" onchange="javascript:location.href = 'filter_type/'+this.value;">
                        <option value="0">Бүгд</option>
                        @foreach ($types as $i=>$item)
                      <option value="{{ $item->type_id }}" @if($item->type_id==$type) selected @endif>{{ $item->type_name }}</option>
                      @endforeach
                      </select>
                    </div>
                 
              </div>
                        <div class="col-md-3">
                    <div class="form-group">
                      <label for="count_year">Эзэн</label>
                      <select class="form-control" id="owner" name="owner" onchange="javascript:location.href = 'filter_owner/'+this.value;">
                        <option value="0">Бүгд</option>
                        @foreach ($owners as $i=>$item)
                        <option value="{{ $item->owner_id }}" @if($item->owner_id==$owner) selected @endif>{{ $item->owner_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
              </div>
                       
                   
                    <div class="table-responsive m-t-20 no-wrap">
                        <table class="table table-bordered vm" id="example"
                            style="font-size:10px; color:black; word-wrap:break-word;">
                            <thead style="background-color:#ceedf9; font-size: 10px;">
                                <tr>
                                    <th>№</th>
                                    <th>Адууны төрөл</th>
                                    <th>Нэр</th>
                                    <th>Эцэг</th>
                                    <th>Гүү</th>
                                    <th>Эзэмшигч</th>
                                    <th>Зураг </th>
                                    <th>Бүртгэлтэй эсэх </th>
                                    <th>Тайлбар </th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                  @foreach($herds as $h)
                  <tr>
                      <td>{{$no}}</td>
                      <td>{{$h->type_name}}</td>
                      <td><a data-toggle="modal" data-target="#historymodal" onclick="gethistory({{$h->herd_id}})"><u> {{$h->herd_name}} </u></a></td>
                      <td>{{$h->parent_name}}</td>
                      <td>{{$h->mother_name}}</td>
                      <td>{{$h->owner_name}}</td>
                      <td> @if($h->img_url !=NULL)
                        <img src="{{asset('img/').'/'.$h->img_url}}" style="height:30px"  onclick="getimg('{{$h->img_url}}')">
                        
                        @endif
                      </td>
          
                        <td>
                          @if($h->is_enable == 1)
                          
                          <img src="{{asset('img/correct.jpg')}}" style="height:30px"  >
                        
                        @else
                          <img src="{{asset('img/wr.png')}}" style="height:30px" >
                        
                        @endif
                    
                    </td>
                    <td>{{$h->comment}}</td>
                      <td> <button type="button" class="btn btn-warning btn-sm updateherd" data-toggle="modal"  data-id="{{$h->herd_id}}" tag="{{$h->herd_id}}"  data-target="#exampleModal">
           
                        <i class="fa fa-pencil" style="color: rgb(255, 255, 255);"></i>
                    </button>
                    <a class="btn btn-danger deleteherd btn-sm" id="deleteherd"  tag="{{$h->herd_id}}" >  <i class="fa fa-trash" style="color: rgb(255, 255, 255);"></i></a></td>


                  </tr>
                  <?php $no++; ?>
                  @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Шинээр адуу нэмэх</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="addherd" method="post"  enctype="multipart/form-data" id="formherd">
        <div class="modal-body">
          
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Адууны төрөл</label>
                    <select name="type_id" id="type_id" class="form-control">
                      @foreach ($types as $i=>$item)
                      <option value="{{ $item->type_id }}">{{ $item->type_name }}</option>
                      @endforeach
                  </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputAddress2">Эзэн</label>
                    <select name="owner_id" id="owner_id" class="form-control">
                      @foreach ($owners as $i=>$item)
                      <option value="{{ $item->owner_id }}">{{ $item->owner_name }}</option>
                      @endforeach
                  </select>
                  </div>
                
               
                  <div class="form-group col-md-12">
                    <label for="inputPassword4">Адууны нэр</label> 
                    <input type="text" class="form-control" id="herd_name" name="herd_name" placeholder="">
                  </div>
                  
             
                  <div class="form-group col-md-6">
                    <label for="inputAddress2">Эцэг</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                      <option value="1">-</option>
                      @foreach ($herd as $i=>$item)
                      @if($item->p_type==1)
                      <option value="{{ $item->herd_id }}">{{ $item->herd_name }}</option>
                      @endif
                      @endforeach
                  </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputAddress2">Гүү</label>
                    <input type="hidden" class="form-control" id="herd_id" name="herd_id" placeholder="">
                    <select name="mother_id" id="mother_id" class="form-control">
                     <option value="1">-</option>
                      @foreach ($herd as $i=>$item)
                      @if($item->p_type==2)
                      <option value="{{ $item->herd_id }}">{{ $item->herd_name }}</option>
                      @endif
                      @endforeach
                  </select>
                  </div>
                </div>
                {{ csrf_field() }}
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">Зураг</label>
                    <input type="file" class="form-control-file" id="img_url" name="img_url">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Тоолох жил</label> 
                    <select class="form-control" id="herd_year" name="herd_year">
                         
                      @foreach ($years as $i=>$item)                     
                      <option value="{{ $item->year_id }}" @if($item->year_id==$year) selected @endif>{{ $item->year_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">хаах</button>
          <button type="submit" class="btn btn-primary">хадгалах</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="historymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Тооллогын түүх</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered vm" id="history"
          style="font-size:10px; color:black; word-wrap:break-word;">
          <thead style="background-color:#ceedf9; font-size: 10px;">
              <tr>
                 
                  <th>Тооллогот жил</th>
                  <th>Бүртгэлтэй эсэх </th>
                  <th>Тайлбар </th>
               
              </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
      
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Адууны зураг</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <img class="modal-content" id="img01" height="300px" class="center">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">хаах</button>
          <button type="button" class="btn btn-primary">хадгалах</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="deleteModal"  role="dialog" aria-labelledby="countModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Бүртгэл устгах</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="deleteherd" method="post"  enctype="multipart/form-data" id="formherd">
        <div class="modal-body">
            {{ csrf_field() }}
             
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputEmail4">Тайлбар</label>
            <input type="text" class="form-control" id="delete_reason" name="delete_reason" placeholder="">
          </div>
      
</div>
<div class="form-row">
  <div class="form-group col-md-12">
    <label for="inputEmail4">Хасах жил</label>
    <input type="text" class="form-control" id="delete_date" name="delete_date" placeholder="">
    <input type="hidden" class="form-control" id="herds_id" name="herds_id" placeholder="">
  </div>

</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">хаах</button>
          <button type="submit" class="btn btn-primary">хадгалах</button>
        </div>
      </form>
      </div>
    </div>
    <div>
  </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    
    var table = $('#example').DataTable( {
      "pageLength": 50
    } );
} );
function getimg($id){
  console.log($id);
  $('#myModal').modal('show'); 
  $('#img01').attr('src','/img/'+$id+'');
}
function gethistory($id){
  $.get('gethistory/'+$id,function(data){
                $("#history tbody").empty();
                $.each(data,function(i,qwe){
                  if(qwe.is_enable == 1){
                    $img= '{{asset('img/correct.jpg')}}';
                }
                else{
                    $img= '{{asset('img/wr.jpg')}}';
                }
                    var sHtml = " <tr class='table-row' >" +

                        "   <td class='m1'>"+ qwe.count_year +"</td>" +
                        "   <td class='m1'>   <img src="+$img+" style='height:30px')'></td>" +
                        "   <td class='m1'> "+ qwe.comment + "</td>" +
                        "</tr>";
                    $("#history tbody").append(sHtml);
                });

            });
  
}
$('.updateherd').on('click',function(){
  var title = document.getElementById("exampleModalLabel");
        title.innerHTML = "Адууны мэдээлэл засварлах";
                  document.getElementById('formherd').action = "updateherd";
  var itag=$(this).attr('tag');
      $.get('getherd/'+itag,function(data){
        console.log(data);
             $.each(data,function(i,qwe){
                $('#type_id').val(qwe.type_id).trigger('change');
                $('#mother_id').val(qwe.mother_id);
                $('#herd_id').val(qwe.herd_id);
                $('#herd_name').val(qwe.herd_name);
                $('#comment').val(qwe.comment);
                 $('#owner_id').val(qwe.owner_id).trigger('change');
                 $('#parent_id').val(qwe.parent_id).trigger('change');

         });
         
          });
    
        });
        $('.deleteherd').on('click',function(){
          $('#deleteModal').modal('show');
          var itag=$(this).attr('tag');
          $('#herds_id').val(itag);
});
</script>

@endsection