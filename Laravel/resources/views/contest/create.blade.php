@extends('layouts.app')
@push('styles')
  <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-beta.3/classic/ckeditor.js"></script>
@endpush
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Create Contest</h5>
          <form action="{{route('contest.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id_committee" value="{{Auth::user()->id}}">
            <div class="row">
              <div class="col-md-6">
                <fieldset class="form-group">
                  <label>Contest Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Contest Name" required>
                </fieldset>
                <fieldset class="form-group">
                  <label>Category</label>
                  <input type="text" name="category" class="form-control" placeholder="Category" required>
                </fieldset>
                <fieldset class="form-group">
                  <label>Check in Time</label>
                  <select class="form-control" name="checkinTime" required>
                    <option selected disabled>Select Check in Time</option>
                    <option value="15">15 Minute</option>
                    <option value="30">30 Minute</option>
                  </select>
                </fieldset>
                <fieldset class="form-group">
                  <label>Place</label>
                  <input type="text" name="place" class="form-control" placeholder="Place" required>
                </fieldset>
                <fieldset class="form-group">
                  <label for="exampleInputEmail1">Type</label>
                  <select class="form-control" name="type" required>
                    <option selected disabled>Select Type</option>
                    <option value="Team">Team</option>
                    <option value="Individual">Individual</option>
                  </select>
                </fieldset>
              </div>
              <div class="col-md-6">
                <fieldset class="form-group">
                  <label>Format</label>
                  <select class="form-control" name="format" required>
                    <option selected disabled>Select Format</option>
                    <option value="Single Elimination">Single Elimination</option>
                    <option value="Double Elimination">Double Elimination</option>
                  </select>
                </fieldset>
                <fieldset class="form-group">
                  <label>Cost</label>
                  <input type="number" name="cost" class="form-control" placeholder="Enter Cost" required>
                </fieldset>
                <fieldset class="form-group">
                  <label>Deadline</label>
                  <input type="datetime-local" name="deadline" class="form-control" required>
                </fieldset>
                <fieldset class="form-group">
                  <label>Poster</label>
                  <input type="file" name="poster" class="form-control" placeholder="Upload Poster" required>
                </fieldset>
              </div>
              <div class="col-md-12">
                <fieldset class="form-group">
                  <label>Description</label>
                  <textarea name="desc" id="editor" required>
                    <p></p>
                  </textarea>
                </fieldset>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
          console.error( error );
  } );
</script>
@endpush
