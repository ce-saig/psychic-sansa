@extends('library.layout')

@section('head')
<title>เพิ่มหนังสือใหม่</title>
@stop

@section('body')
<div class="panel panel-primary">
  <div class="panel-heading panel-title">
    <span style="color:white;font-size: 24px">เพิ่มหนังสือใหม่</span>
  </div>
  <div class="panel-body">
    <div class="container" style="width: auto; font-size:13px">
    <form role="form" action="{{ url('book/add') }}" method="post" style="font-size:16px">
          <div class="row col-xs-12 col-md-12" style="margin-top: 15px">
            <h4>เลขลำดับ</h4>
          </div>
          <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="col-md-12">
              <div class="row col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="col-sm-4 col-md-5  control-label" style="margin-top: 10px">เลขอันดับ</label>
                  <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                    <input type="text" class="form-control" name="number">
                  </div>
                </div>
              </div>

              <div class="row col-xs-6 col-sm-6 col-md-6 pull-right">
                <div class="form-group">
                  <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px">เลขอันดับ braille</label>
                  <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                    <input type="text" class="form-control" name="b_no">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="row col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px">เลขอันดับ cassette</label>
                  <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                    <input type="text" class="form-control" name="c_no">
                  </div>
                </div>
              </div>

              <div class="row col-xs-6 col-sm-6 col-md-6 pull-right">
                <div class="form-group">
                  <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px">เลขอันดับ cd</label>
                  <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                    <input type="text" class="form-control" name="cd_no">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="row col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px">เลขอันดับ daisy</label>
                  <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px">
                    <input type="text" class="form-control" name="d_no">
                  </div>
                  </div>
                </div>

                <div class="row col-xs-6 col-sm-6 col-md-6 pull-right">
                  <div class="form-group">
                    <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px">เลขอันดับ dvd</label>
                    <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                      <input type="text" class="form-control" name="dvd_no">
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="row col-md-12" style="margin-top: 30px">
            <h4>รายละเอียดหนังสือ</h4>
          </div>
          <div class="col-md-12">
          <div class="row col-xs-6 col-sm-6 col-md-6" >
            <div class="form-group">
              <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px">ชื่อเรื่อง</label>
              <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                <input type="text" class="form-control" tabindex="1" name="title" required>
              </div>
            </div>
          </div>  

          <div class="row col-xs-6 col-sm-6 col-md-6 pull-right">
            <div class="form-group">
              <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px">ชื่อเรื่อง (อังกฤษ)</label>
              <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                <input type="text" class="form-control" tabindex="2" name="title_eng">
              </div>
            </div>
          </div>

          <div class="row col-xs-6 col-sm-6 col-md-6 pull-right">
            <div class="form-group">
              <label class="col-sm-4  col-md-5 control-label" style="margin-top: 10px">เลขไอดีเดิม</label>
              <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                <input type="text" class="form-control" tabindex="3" name="original_id">
              </div>
            </div>
          </div>

          <div class="row col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px">ISBN</label>
              <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                <input type="text" class="form-control" tabindex="4" name="isbn" placeholder="เช่น 903-246-542-1">
              </div>
            </div>
          </div>

          <div class="row col-xs-6 col-sm-6 col-md-6 pull-right">
            <div class="form-group">
              <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px ">ผู้แต่ง</label>
              <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                <input type="text" class="form-control" tabindex="5" name="author">
              </div>
            </div>
          </div>
          
          <div class="row col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px">ผู้แปล</label>
              <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                <input type="text" class="form-control" tabindex="6" name="translate">
              </div>
            </div>
          </div>

          <div class="row col-xs-6 col-sm-6 col-md-6 pull-right">
            <div class="form-group">
              <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px">สำนักพิมพ์</label>
              <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                <input type="text" class="form-control" tabindex="7" name="publisher">
              </div>
            </div>
          </div>

          <div class="row col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px">พิมพ์ครั้งที่</label>
              <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                <input type="text" class="form-control" tabindex="8" placeholder="เช่น 1" name="pub_no">
              </div>
            </div>
          </div>

          <div class="row col-xs-6 col-sm-6 col-md-6 pull-right">
            <div class="form-group">
              <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px">พ.ศ.</label>
              <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                <input type="number" class="form-control" tabindex="9" placeholder="เช่น {{date('Y') + 543}}" name="pub_year">
              </div>
            </div>
          </div>

          <div class="row col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px">ทะเบียนการผลิต</label>
              <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                <input type="text" class="form-control" placeholder="เช่น รท.4531" tabindex="10" name="produce_no">
              </div>
            </div>
          </div>

          <div class="row col-xs-6 col-sm-6 col-md-6 pull-right">
            <div class="form-group">
              <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px">ประเภทหนังสือ</label>
              <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                <input type="text" class="form-control" placeholder="เช่น ประเภทAAA" tabindex="11" name="book_type">
              </div>
            </div>
          </div>

          <div class="row col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <label class="col-sm-4 col-md-5 control-label" style="margin-top: 10px">หนังสือระดับ</label>
              <div class="col-xs-12 col-sm-8 col-md-7" style="margin-top: 2px ">
                <input type="text" class="form-control" placeholder="เช่น ม.3" tabindex="12" name="grade">
              </div>
            </div>
          </div>

          <div class="row col-xs-12 col-md-12">
            <div class="form-group">
              <label class="col-sm-2 col-md-2 control-label" style="margin-top: 10px">เนื้อเรื่องย่อ</label>
              <div class="col-xs-10 col-sm-10 col-md-10" style="margin-top: 2px ">
                <textarea rows="4" class="form-control" name="abstract" tabindex="13"></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group col-md-12" style="padding-top: 30px">
          <a href = "{{ url('/') }}" class = "btn btn-lg btn-warning revous">กลับหน้าแรก</a>
          <input type="submit" class="btn btn-success btn-lg pull-right" style="width: 25%" value='เพิ่มหนังสือ'>
        </div>
        </form>
      </div>
  </div>
</div>
@stop
