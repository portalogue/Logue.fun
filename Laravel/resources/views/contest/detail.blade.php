<div class="row mt-5">
  <div class="col-md-6">
    <h2>Contest Name</h2>
    <p>{{$contest->name}}</p>
  </div>
  <div class="col-md-6">
    <h2>Category</h2>
    <p>{{$contest->category}}</p>
  </div>
  <div class="col-md-6">
    <h2>Checkin Time</h2>
    <p>{{$contest->checkinTime}} minutes</p>
  </div>
  <div class="col-md-6">
    <h2>Place</h2>
    <p>{{$contest->place}}</p>
  </div>
  <div class="col-md-6">
    <h2>Type</h2>
    <p>{{$contest->type}}</p>
  </div>
  <div class="col-md-6">
    <h2>Format</h2>
    <p>{{$contest->format}}</p>
  </div>
  <div class="col-md-6">
    <h2>Cost</h2>
    <p>Rp. {{number_format($contest->cost)}}</p>
  </div>
  <div class="col-md-6">
    <h2>Deadline</h2>
    <p>{{$contest->deadline}}</p>
  </div>
  <div class="col-md-12">
    <h2>Description</h2>
    {!!$contest->desc!!}
  </div>
</div>
