@extends('dashboard')
@section('content')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <style>
        #back {
            background-size: cover;
            background-position: center;
            animation: changeBackground 20s infinite; /* Change background every 10 seconds */
        }
     
        @keyframes changeBackground {
            0% {
                background-image: url('https://tecdn.b-cdn.net/img/new/slides/041.jpg');
            }
            33.33% {
                background-image: url('https://tecdn.b-cdn.net/img/new/slides/042.jpg');
            }
            66.66% {
                background-image: url('https://tecdn.b-cdn.net/img/new/slides/043.jpg');
            }
            100% {
                background-image: url('https://tecdn.b-cdn.net/img/new/slides/044.jpg');
            }
        }
     </style>
    <div class="p-4 sm:ml-64 h-screen" id="back" >
        @yield('content1')
    </div>            
@endsection