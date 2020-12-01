@extends('layouts.parent')

@section('style')
<style>
   .modal-backdrop.in { z-index: auto;}
  </style>
@endsection

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Тооллого</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Бүртгэл</a></li>
                <li class="breadcrumb-item active">Адуу Тооллого</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="#" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" data-toggle="modal"
                data-target="#exampleModal"> <i class="fa fa-plus" aria-hidden="true"></i> Тооллого эхлүүлэх</a>
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
                    <div class='col-md-12'>
                    <div class="table-responsive m-t-20 no-wrap ">
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
                                    <th>Бүртгэх эсэх </th>
                                    <th>Тайлбар </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($herds as $h)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$h->type_name}}</td>
                                    <td>{{$h->herd_name}}</td>
                                    <td>{{$h->parent_name}}</td>
                                    <td>{{$h->mother_name}}</td>
                                    <td>{{$h->owner_name}}</td>
                                    <td> @if($h->img_url !=NULL)
                                      <img src="{{asset('img/'.'/'.$h->img_url)}}" style="height:30px"  onclick="getimg('{{$h->img_url}}')">
                                      
                                      @endif
                                    </td>
                                  
                                  <td>@if($h->is_enable == 1)
                                    <img src="{{asset('img/correct.jpg')}}" style="height:30px"   onclick="getcount({{$h->count_id}})">
                                  
                                  @else
                                    <img src="{{asset('img/wr.png')}}" style="height:30px"  onclick="getcount({{$h->count_id}})">
                                  
                                  @endif
                                </td>
                                <td>{{$h->comment}}</td>
                                </tr>
                                <?php $no++; ?>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive m-t-20 no-wrap">
                      <table class="table table-bordered vm"
                          style="font-size:10px; color:black; word-wrap:break-word;">
                          <thead style="background-color:#ceedf9; font-size: 10px;">
                              <tr>
                                <?php $sum_type1 = 0 ?>
                                <?php $sum_type2 = 0 ?>
                                <?php $sum_type3 = 0 ?>
                                <?php $sum_type4 = 0 ?>
                                  <th>№</th>
                                  <th>Хэрэглэгчийн нэр</th>
                                  <th>Хүрэн</th>
                                  <th>Хонгор</th>
                                  <th>Буурал</th>
                                  <th>Нийт</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; ?>
                @foreach($rep as $h)
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$h->owner_name}}</td>
                    <td>{{$h->type_id1}}</td>
                    <?php $sum_type1 += ($h->type_id1) ?>
                    <td>{{$h->type_id2}}</td>
                    <?php $sum_type2 += ($h->type_id2) ?>
                    <td>{{$h->type_id3}}</td>
                    <?php $sum_type3 += ($h->type_id3) ?>
                    <td>{{$h->type_id3+$h->type_id2+$h->type_id1}}</td>
                    <?php $sum_type4 += ($h->type_id3+$h->type_id2+$h->type_id1) ?>
                </tr>
                <?php $no++; ?>
                @endforeach
                <tr>
                  <td colspan="2"><b>Нийт</b> </td>
                  <td><b><?php
                      echo number_format($sum_type1)."<br>";
                      ?></b></td>
                  <td><b><?php
                      echo number_format($sum_type2)."<br>";
                      ?></b></td>
                  <td><b><?php
                    echo number_format($sum_type3)."<br>";
                    ?></b></td>
                  <td><b><?php
                    echo number_format($sum_type4)."<br>";
                    ?></b></td>
              </tr>
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
        <form action="createcount" method="post">
        <div class="modal-body">
            {{ csrf_field() }}
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="inputEmail4">Он</label>
                    <select name="herd_year" id="herd_year" class="form-control">
                      @foreach ($years as $i=>$item)                    
                      <option value="{{ $item->year_id }}">{{ $item->year_name }}</option>
                      @endforeach
                      
                  </select>
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
</div>

  <div class="modal fade" id="countModal"  role="dialog" aria-labelledby="countModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Тооллого</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="updatecount" method="post"  enctype="multipart/form-data" id="formherd">
        <div class="modal-body">
            {{ csrf_field() }}
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="inputEmail4">Бүртгэх эсэх</label>
                    <select name="is_enable" id="is_enable" class="form-control">
                                         
                      <option value="1">Тийм</option>
                      <option value="2">Үгүй</option>
                      
                  </select>
                  </div>
                
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputEmail4">Тайлбар</label>
            <input type="hidden" class="form-control" id="count_id" name="count_id" placeholder="">
            <input type="text" class="form-control" id="comment" name="comment" placeholder="">
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

function getcount($id){
  console.log($id);
  $('#countModal').modal('show'); 
  $.get('getcountherd/'+$id,function(data){
        console.log(data);
             $.each(data,function(i,qwe){
                $('#count_id').val(qwe.count_id);
                $('#is_enable').val(qwe.is_enable).trigger('change');
                $('#comment').val(qwe.comment);
            
         });
         
          });
}



</script>

@endsection