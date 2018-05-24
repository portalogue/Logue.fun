<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <h2>Timeline</h2>
      {!! $contest->timeline !!}
    </div>
  </div>
  @if (Auth::user()->id == $contest->id_committee)
    <div class="col-md-12">
      <hr>
      <form action="{{route('contest.timeline', ['contest' => $contest->id])}}" method="post">
        @csrf
        @method('PUT')

        <fieldset class="form-group">
          <label>Edit Timeline</label>
          <textarea name="timeline" id="timelineeditor" required>
            {{$contest->timeline}}
          </textarea>
        </fieldset>
        <button type="submit" class="btn btn-warning">Save</button>
      </form>
    </div>
  @endif
</div>
