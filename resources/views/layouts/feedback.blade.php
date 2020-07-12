@if(session()->has('status'))
    <div class="alert alert-{{session('status')}} text-center" id="alert" role="alert">
        {{session('message')}}
    </div>
    <script>setTimeout(() => $('#alert').remove(), 7000)</script>
@endif

