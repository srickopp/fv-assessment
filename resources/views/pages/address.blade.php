@extends('main')
@section('content')
    <div class="row">
        <div class="col-12">
            @if(Session::has('success'))
              <div class="alert alert-success">
                Success generate address
              </div>
            @endif
            <div class="card">
              <div class="card-header">
                Address for DHL API Formatter
              </div>
              <div class="card-body">
                <form action="{{ url('/address/store') }}" method="post">
                  {{ csrf_field() }}
                  <div class="mb-3 row">
                    <label for="address1" class="col-sm-2 col-form-label">Address 1</label>
                    <div class="col-sm-10">
                      <input type="text" name="address1" class="form-control" id="address1">
                      @if ($errors->has('address1'))
                        <span class="text-danger">{{ $errors->first('address1') }}</span>
                    @endif
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="address2" class="col-sm-2 col-form-label">Address 2</label>
                    <div class="col-sm-10">
                      <input type="text" name="address2" class="form-control" id="address2">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="address3" class="col-sm-2 col-form-label">Address 3</label>
                    <div class="col-sm-10">
                      <input type="text" name="address3" class="form-control" id="address3">
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>

            @if (Session::has('success'))
              <div class="card mt-3">
                <div class="card-header">
                  Result
                </div>
                <div class="card-body">
                  @if(is_array(session('success')))
                        @php
                            $index = 1;
                        @endphp
                        @foreach (session('success') as $message)
                          <div class="row">
                            <div class="col-12">
                              Address {{ $index }}: {{ $message }}
                              @php
                                  $index++;
                              @endphp
                            </div>
                          </div>
                        @endforeach
                    @endif
                </div>
              </div>      
            @endif
        </div>
    </div>
@endsection