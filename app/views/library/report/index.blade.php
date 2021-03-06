@extends('library.layout')

@section('head')
<title>Leafbox :: Report Gen</title>
@stop

@section('body')

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Report Filter (Book,Part)</h3>
  </div>
  <form action="{{ url('/report/book/detail') }}" method="post" onsubmit="return checkForCheckboxes();" name="form">
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <h4>ข้อมูลหนังสือ</h4>
        </div>
        <div class="row">
          <div class="col-md-12 checkbox">
            <div class="col-md-4">
              <label>
                <input type="checkbox" name="book-filter[]" value="title" class="book-checkbox" data-th="ชื่อเรื่อง"> ชื่อเรื่อง
              </label>
            </div>
            <div class="col-md-4">
              <label>
                <input type="checkbox" name="book-filter[]" value="author" class="book-checkbox" data-th="ผู้แต่ง"> ผู้แต่ง
              </label>
            </div>
            <div class="col-md-4">
              <label>
                <input type="checkbox" name="book-filter[]" value="translate" class="book-checkbox" data-th="ผู้แปล"> ผู้แปล
              </label>
            </div>
            <div class="col-md-4">
              <label>
                <input type="checkbox" name="book-filter[]" value="pub_year" class="book-checkbox" data-th="ปีที่พิมพ์"> ปีที่พิมพ์
              </label>
            </div> 

            <div class="col-md-4">
              <label>
                <input type="checkbox" name="book-filter[]" value="bm_status" class="book-checkbox prod-status" data-th="สถานะการผลิตเบรลล์"> สถานะการผลิตเบรลล์
              </label>
            </div>

            <div class="col-md-4">
              <label>
                <input type="checkbox" name="book-filter[]" value="setcs_status" class="book-checkbox prod-status" data-th="สถานะการผลิตคาสเซ็ท"> สถานะการผลิตคาสเซ็ท
              </label>
            </div>

            <div class="col-md-4">
              <label>
                <input type="checkbox" name="book-filter[]" value="setds_status" class="book-checkbox prod-status" data-th="สถานะการผลิตเดซี่"> สถานะการผลิตเดซี่
              </label>
            </div>

            <div class="col-md-4">
              <label>
                <input type="checkbox" name="book-filter[]" value="setcd_status" class="book-checkbox prod-status" data-th="สถานะการผลิต CD"> สถานะการผลิต CD
              </label>
            </div>

            <div class="col-md-4">
              <label>
                <input type="checkbox" name="book-filter[]" value="setdvd_status" class="book-checkbox prod-status" data-th="สถานะการผลิต DVD"> สถานะการผลิต DVD
              </label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="col-md-12 well operator-book">
              
            </div>
          </div>
        </div>
        
        <div class="col-md-12">
          <h4>ข้อมูลสื่อ</h4>
        </div>
        <div class="row">
          <div class="col-md-12 checkbox">
            <div class="col-md-6">
              <label>
                <input type="checkbox" name="media-filter[]" value="braille-prod" class="media-checkbox" data-th="เบรลล์"> เบรลล์
              </label>
            </div>
            <div class="col-md-6">
              <label>
                <input type="checkbox" name="media-filter[]" value="cassette-prod" class="media-checkbox" data-th="คาสเซ็ท"> คาสเซ็ท
              </label>
            </div>
            <div class="col-md-6">
              <label>
                <input type="checkbox" name="media-filter[]" value="daisy-prod" class="media-checkbox" data-th="เดซี่"> เดซี่
              </label>
            </div>
            <div class="col-md-6">
              <label>
                <input type="checkbox" name="media-filter[]" value="cd-prod" class="media-checkbox" data-th="CD"> CD
              </label>
            </div>
            <div class="col-md-6">
              <label>
                <input type="checkbox" name="media-filter[]" value="dvd-prod" class="media-checkbox" data-th="DVD"> DVD
              </label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="col-md-12 well operator-media">
              
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <h4>คอลัมน์ที่ต้องการแสดง</h4>
        </div>
        <div class="row">
          <div class="col-md-12 checkbox">
            <div class="col-md-4">
              <label>
                <input type="checkbox" name="result-column-filter[]" value="id" class="result-checkbox"> ทะเบียนหนังสือตาดี
              </label>
            </div>
            <div class="col-md-4">
              <label>
                <input type="checkbox" name="result-column-filter[]" value="title" class="result-checkbox"> เรื่อง
              </label>
            </div>

            <div class="col-md-4">
              <label>
                <input type="checkbox" name="result-column-filter[]" value="author" class="result-checkbox"> ผู้แต่ง
              </label>
            </div>
            <div class="col-md-4">
              <label>
                <input type="checkbox" name="result-column-filter[]" value="translate" class="result-checkbox"> ผู้แปล
              </label>
            </div>
            <div class="col-md-4">
              <label>
                <input type="checkbox" name="result-column-filter[]" value="pub_year" class="result-checkbox"> ปีที่พิมพ์
              </label>
            </div>
            <div class="col-md-4">
              <label>
                <input type="checkbox" name="result-column-filter[]" value="bm_status" class="result-checkbox"> สถานะการผลิตเบรลล์
              </label>
            </div>
            <div class="col-md-4">
              <label>
                <input type="checkbox" name="result-column-filter[]" value="setcs_status" class="result-checkbox"> สถานะการผลิตคาสเซ็ท
              </label>
            </div>
            <div class="col-md-4">
              <label>
                <input type="checkbox" name="result-column-filter[]" value="setds_status" class="result-checkbox"> สถานะการผลิตเดซี่
              </label>
            </div>
            <div class="col-md-4">
              <label>
                <input type="checkbox" name="result-column-filter[]" value="setcd_status" class="result-checkbox"> สถานะการผลิต CD
              </label>
            </div>
            <div class="col-md-4">
              <label>
                <input type="checkbox" name="result-column-filter[]" value="setdvd_status" class="result-checkbox"> สถานะการผลิต DVD
              </label>
            </div>
          </div>
          </div>
        </div>
        <div class="col-md-offset-10 col-md-2">
          <button type="submit" class="btn btn-success">สร้าง report</button>
        </div>
      </div>
      <div class="operator-answer">
      </div>
    </div>    
  </form>
</div>

<div class="modal fade" id="notify">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header modal-notification" id="noti-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title modal-notifiation-title">สร้าง report ไม่สำเร็จ</h4>
      </div>
      <div class="modal-body">
        <ul id="notify-error">
        </ul>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@stop
@section('script')
@parent
<script type="text/javascript">

  function book_filter (target_div,id_val,element,val) {
    if ($(element).hasClass("prod-status")){ // For Prod status filter
      options_array=['ยังไม่ผลิต','รอการผลิต','รอพิมพ์','กำลังพิมพ์','ผลิตเสร็จ'];
      operation_add(target_div,id_val,options_array,false,val);
    }else{ // Normal filter
      options_array=["contain","match(=)",">","<"];
      operation_add(target_div,id_val,options_array,true,val);
    }
  }

  function operation_add (target_div,id_val,options_array,have_input,val) {
    //var row_half = $("<div class=\"col-md-6\"></div>");
    var col_operator = $("<div class=\"col-md-4\"></div>");
    var col_input = $("<div class=\"col-md-4\"></div>");
    var col_name = $("<div class=\"col-md-4\"></div>");
    var row = $("<div class=\"col-md-6\" id = \""+id_val+"\"></div>"); //class=\"row\"
    var select = $("<select name=\""+id_val+"-option\"  class=\"form-control\"></select>");

    // TODO: Implement For loop create option
    var option = [];
    for (var i = 0; i < options_array.length; i++) {
      option[i] = $("<option value=\""+i+"\">"+options_array[i]+"</option>");
    };

    var input = $("<input name=\""+id_val+"-text\" class=\"form-control\" type=\"text\"></input>");
    col_name.html(val);
    col_operator.append(select.append(option));
    col_input.append(input);
    row.append(col_name);
    row.append(col_operator);
    if(have_input){
      row.append(col_input);
    }
    $(target_div).append(row);
  }

  function media_filter (target_div,id_val,filter_type,val) {
    options_array=["ปกติ","ชำรุด","ซ่อม","หาย"];
    operation_add(target_div,id_val,options_array,false,val);
  }

  $(document).ready(function(){
    $(".book-checkbox").change(function(){
      if($(this).is(":checked")) {
        var val = $(this).attr("data-th");
        var id_val = $(this).val();
        //var cb_class=$(this).attr("class") // TODO:Get $(this) class
        book_filter(".operator-book",id_val,this,val);
      }
      else{
        $("#"+$(this).val()).remove();
      }
    });

    $(".media-checkbox").change(function(){
      if($(this).is(":checked")) {
        var val = $(this).attr("data-th");
        var id_val = $(this).val();
        media_filter(".operator-media",id_val,this,val);
      }
      else{
        $("#"+$(this).val()).remove();
      }
    });
  });

function checkForCheckboxes() 
{
  for (var i = 0; i < document.form["result-column-filter[]"].length; i++) {
    if(document.form["result-column-filter[]"][i].checked){
      return true;
    }
  }
  $('#notify-error').append('<li>กรุณาเลือกคอลัมน์ที่ต้องการแสดง</li>');
  $('#notify').modal('show');
  return false;
}

 $('#notify').on('hidden.bs.modal', function() {
   $('#notify-error').html('');
 });
</script>
@stop
