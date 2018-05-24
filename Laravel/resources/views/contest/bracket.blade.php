<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="demo"></div>
    </div>
  </div>
</div>

@push('styles')

@endpush
@push('scripts')
  <script src="{{asset('js/jquery.bracket.min.js')}}" charset="utf-8"></script>
  <link rel="stylesheet" href="{{asset('css/jquery.bracket.min.css')}}">
  <script type="text/javascript">
  var saveData = {
    teams: {!!$contest->bracket_teams!!},
    results: {!!$contest->bracket_results!!}
    };
    /* Called whenever bracket is modified
    *
    * data:     changed bracket object in format given to init
    * userData: optional data given when bracket is created.
    */
    function saveFn(dataBracket, userData) {
      // console.log(dataBracket);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "POST",
      url: "{{route('contest.changeBracket', ['contest' => $contest->id])}}",
      data: dataBracket,
      // dataType: 'json',
      success: function(response) {
        // alert(response);
        console.log(response);
      },
      error: function(error) {
        alert("Error");
      }
    });
    }

    $(function() {
      var container = $('.demo')
      container.bracket({
        init: saveData,
        save: saveFn,
        // userData: "http://localhost:8000/"
      })

      /* You can also inquiry the current data */
      var data = container.bracket('data')
      // $('#dataOutput').text(jQuery.toJSON(data))
    })
  </script>
@endpush
