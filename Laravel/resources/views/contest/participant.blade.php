<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <h2>Participants</h2>
      @if (Auth::user()->role != "Admin" && $contest->type == "Team" && count($registered) != 0)
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add your team member
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Member Team</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{route('contest.addMember')}}" method="post">
                @csrf
                <input type="hidden" name="contest_id" value="{{$contest->id}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="modal-body">
                    <fieldset class="form-group">
                      <label for="exampleInputPassword1">Name</label>
                      <input name="name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Name">
                    </fieldset>
                    <fieldset class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                      <small class="text-muted">We'll never share your email with anyone else.</small>
                    </fieldset>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      @endif
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            @if ($contest->type == "Team")
              <th>Member</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach ($contest->participants as $key => $participant)
            <tr>
              <td>{{++$key}}</td>
              <td>{{$participant->user->name}}</td>
              <td>
                @if ($contest->type == "Team")
                  <table>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                    </tr>
                    @foreach ($participant->participantDetail as $key => $participantDetail)
                      <tr>
                        <td>{{$participantDetail->name}}</td>
                        <td>{{$participantDetail->email}}</td>
                      </tr>
                    @endforeach
                  </table>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
