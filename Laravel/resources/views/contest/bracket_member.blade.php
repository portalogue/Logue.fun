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
  var minimalData = {
    teams: {!!$contest->bracket_teams!!},
    results: {!!$contest->bracket_results!!}
    };
    $(function() {
      $('.demo').bracket({
        init: minimalData /* data to initialize the bracket with */ })
    })
  </script>
@endpush
