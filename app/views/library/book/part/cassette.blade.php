<div role="tabpanel" class="tab-pane active" >
  <a class = "btn btn-danger pull-right del_media_btn_all" href="{{$bid}}/cassette/deleteAll">ลบสื่อนี้ทั้งหมด</a>
  <div class = "list-media">
    <table class="table table-hover">
      <thead>
        <tr>
          <th width="300">คาสเซ็ทไอดี</th>
          <th>จำนวนชิ้นย่อย (ตลับ)</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cassette as $item)
        <tr class = "hover table-body" href="{{$bid}}/cassette/{{$item->id}}">
          <td>{{$item->id}}</td>
          <td>{{$item->numpart}}</td>
          <td><a href = "{{ url('/book/'.$bid.'/cassette/delete/'.$item->id) }}"class="btn btn-danger del_media_btn">ลบ</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>