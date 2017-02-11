@extends('layouts.app')

@section('content')

  <script type="text/javascript">
    function insertText(elemID, text)
    {
      var elem = document.getElementById(elemID);
      elem.innerHTML = text;
    }

    var sampleInput = "2 \n" +
                      "4 5 \n" +
                      "UPDATE 2 2 2 4 \n" +
                      "QUERY 1 1 1 3 3 3 \n" +
                      "UPDATE 1 1 1 23 \n" +
                      "QUERY 2 2 2 4 4 4 \n" +
                      "QUERY 1 1 1 3 3 3 \n" +
                      "2 4 \n" +
                      "UPDATE 2 2 2 1 \n" +
                      "QUERY 1 1 1 1 1 1 \n" +
                      "QUERY 1 1 1 2 2 2 \n" +
                      "QUERY 2 2 2 2 2 2 \n";
  </script>

  <div class="panel-body">
    <form class="form-horizontal" action="{{ url('cube') }}" method="post">
      {{ csrf_field() }}

      <div class="form-group">
        <label for="cube" class="col-sm-3 control-label">Input</label>

        <div class="col-sm-6">
          <textarea name="input" id="input" rows="20" cols="40" class="form-control">
            @if( !empty($results) )
              @foreach( $results as $result )
              {{ $result }}
              @endforeach
            @endif
          </textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="button" id="sampleInputBtn"
            class="btn btn-primary" onclick="insertText('input', sampleInput);">
            Sample Input
          </button>
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Submit Input
          </button>
        </div>
      </div>
    </form>
  </div>

@endsection
