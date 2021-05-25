@extends('masterPage')

@section('title', 'Perfil')

@section('sidebar')
    @parent

@endsection

@section('content')


<div class="container">
<form method='POST' action = "{{url('/contactus')}}">
            @csrf
    <div class="row justify-content-center" style="margin-top: 10%">
        <div class="col-md-8">
            <div class="card" style=" border-color: black;">
                <div class="card-header" style="background-color: var(--mainColor); border-color: black;">{{ __('Contact Us') }}</div>

                <div class="card-body" style="background: #baadd9;">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" name="name" placeholder="Enter Name" autofocus required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" name="email" placeholder="Enter Email" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Asunto') }}</label>
                            <div class="col-md-6">
                            <input id="subject" type="text" name="subject" placeholder="Enter Subject" required> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Mensaje') }}</label>
                            <div class="col-md-6">
                                <textarea name="description" rows="5" placeholder="Type Message" required></textarea>
                            </div>
                            
                        </div>
                        <div style="text-align:right; ">
                        <button style="font-size:23px;" class="icon" type="submit"  value="Enviar Email">Enviar</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </form>


    @isset($ok)
           <script>
            alert("Thank you for contacting us!");
           </script>
    @endisset
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>





















@endsection