<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Contest : {{$contest->name}}</h5>
          <form action="{{route('contest.update',['contest' => $contest->id])}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <input type="hidden" name="id_committee" value="{{Auth::user()->id}}">
            <div class="row">
              <div class="col-md-6">
                <fieldset class="form-group">
                  <label>Contest Name</label>
                  <input type="text" name="name" class="form-control" value="{{$contest->name}}" required>
                </fieldset>
                <fieldset class="form-group">
                  <label>Category</label>
                  <input type="text" name="category" class="form-control" value="{{$contest->category}}" required>
                </fieldset>
                <fieldset class="form-group">
                  <label>Check in Time</label>
                  <select class="form-control" name="checkinTime" required>
                    <option selected disabled>Select Check in Time</option>
                    @if ($contest->checkinTime == 15)
                      <option value="15" selected>15 Minute</option>
                      <option value="30">30 Minute</option>
                      @else
                        <option value="15">15 Minute</option>
                        <option value="30" selected>30 Minute</option>
                    @endif
                  </select>
                </fieldset>
                <fieldset class="form-group">
                  <label>Place</label>
                  <input type="text" name="place" class="form-control" value="{{$contest->place}}" required>
                </fieldset>
                <fieldset class="form-group">
                  <label for="exampleInputEmail1">Type</label>
                  <select class="form-control" name="type" required>
                    <option selected disabled>Select Type</option>
                    @if ($contest->type == "Team")
                      <option value="Team" selected>Team</option>
                      <option value="Individual">Individual</option>
                      @else
                        <option value="Team">Team</option>
                        <option value="Individual" selected>Individual</option>
                    @endif
                  </select>
                </fieldset>
              </div>
              <div class="col-md-6">
                <fieldset class="form-group">
                  <label>Format</label>
                  <select class="form-control" name="format" required>
                    <option selected disabled>Select Format</option>
                    @if ($contest->format == "Single Elimination")
                      <option value="Single Elimination" selected>Single Elimination</option>
                      <option value="Double Elimination">Double Elimination</option>
                      @else
                        <option value="Single Elimination">Single Elimination</option>
                        <option value="Double Elimination" selected>Double Elimination</option>
                    @endif
                  </select>
                </fieldset>
                <fieldset class="form-group">
                  <label>Cost</label>
                  <input type="number" name="cost" class="form-control" value="{{$contest->cost}}" required>
                </fieldset>
                <fieldset class="form-group">
                  <label>Deadline</label>
                  <input type="datetime" name="deadline" value="{{$contest->deadline}}" class="form-control" required>
                </fieldset>
                <fieldset class="form-group">
                  <label>Poster</label>
                  <input type="file" name="poster" class="form-control" placeholder="Upload Poster">
                </fieldset>
              </div>
              <div class="col-md-12">
                <fieldset class="form-group">
                  <label>Description</label>
                  <textarea name="desc" id="editeditor" required>
                    {{$contest->desc}}
                  </textarea>
                </fieldset>
                <button type="submit" class="btn btn-warning">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
