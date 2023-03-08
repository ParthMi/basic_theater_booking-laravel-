@extends('layouts.app')

@section('content')
    <div class="container" id="container2">
        <br>
        <pre style="justify-content:center;display:grid;">
                           
                <div style="display: flex">
                @foreach ($seats as $seat)
@if ($seat->seatno < 11)
@if ($seat->status == 0)
<button type="button" id="{{ $seat->seatno }}" data-id="{{ $seat->seatno }}" class="btn btn-outline-dark">{{ $seat->seatno }}  </button>
@else
<button type="button" id="{{ $seat->seatno }}" data-id="{{ $seat->seatno }}" class="btn btn-danger" disabled>{{ $seat->seatno }}  </button>
@endif
@endif
@endforeach
                </div>
                
                <div style="display: flex">
                @foreach ($seats as $seat)
@if ($seat->seatno < 21 && $seat->seatno > 10)
@if ($seat->status == 0)
<button type="button" id="{{ $seat->seatno }}" data-id="{{ $seat->seatno }}" class="btn btn-outline-dark">{{ $seat->seatno }} </button>
@else
<button type="button" id="{{ $seat->seatno }}" data-id="{{ $seat->seatno }}" class="btn btn-danger" disabled>{{ $seat->seatno }} </button>
@endif
@endif
@endforeach
                </div>


                <div style="display: flex">
                    @foreach ($seats as $seat)
@if ($seat->seatno < 31 && $seat->seatno > 20)
@if ($seat->status == 0)
<button type="button" id="{{ $seat->seatno }}" data-id="{{ $seat->seatno }}" class="btn btn-outline-dark">{{ $seat->seatno }} </button>
@else
<button type="button" id="{{ $seat->seatno }}" data-id="{{ $seat->seatno }}" class="btn btn-danger" disabled>{{ $seat->seatno }} </button>
@endif
@endif
@endforeach
                    </div>

                    <div style="display: flex">
                        @foreach ($seats as $seat)
@if ($seat->seatno < 41 && $seat->seatno > 30)
@if ($seat->status == 0)
<button type="button" id="{{ $seat->seatno }}"  data-id="{{ $seat->seatno }}" class="btn btn-outline-dark">{{ $seat->seatno }} </button>
@else
<button type="button" id="{{ $seat->seatno }}"  data-id="{{ $seat->seatno }}" class="btn btn-danger" disabled>{{ $seat->seatno }} </button>
@endif
@endif
@endforeach
                        </div>
            </pre>

        <br>
        <hr style="width:200px; border: 2px solid rgb(0, 0, 0);">
    </div><br>
    

    @if (\Session::has('success'))
  <div class="section">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <center>{!! \Session::get('success') !!}</center>
      </div>
    </div>
@endif
    <center><form action="{{url('/selected')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="userid" value="{{Auth::user()->id}}" />
        <input type="hidden" id="elements" name="selectedseats" value="">
        <p id="demo"></p>
     <button>Book</button>
    </form></center>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var seats = [];

        $(document).ready(function() {


        $(document).on('click', 'button[data-id]', function(e) {

            var dataid = $(this).attr('data-id');
            if ($("#" + dataid).hasClass("btn btn-outline-dark")) {
                $("#" + dataid).removeClass('btn btn-outline-dark').addClass('btn btn-dark');
                add(dataid);
            } else {
                $("#" + dataid).removeClass('btn btn-dark').addClass('btn btn-outline-dark');
                remove(dataid);

            }
            document.getElementById("demo").innerHTML = seats.sort();
            document.getElementById("elements").value = seats;

        });


      


        })

        function add(dataid) {
            seats.push(dataid);
        }

        function remove(dataid) {
            seats = seats.filter(function(letter) {
                return letter !== dataid;
            });
        }
    </script>
@endsection
