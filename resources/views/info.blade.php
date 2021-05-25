@extends('masterPage')

@section('title', 'Info')

@section('sidebar')
    @parent

@endsection

@section('content')
<style> 
.check-list {
  margin: 0;
  margin-top:30%;
  padding-left: 1.2rem;
}

.check-list li {
  position: relative;
  list-style-type: none;
  padding-left: 2.5rem;
  margin-bottom: 0.5rem;
}

.check-list li:before {
    content: '';
    display: block;
    position: absolute;
    left: 0;
    top: -2px;
    width: 5px;
    height: 11px;
    border-width: 0 2px 2px 0;
    border-style: solid;
    border-color: #00a8a8;
    transform-origin: bottom left;
    transform: rotate(45deg);
}
body{
    text-align:center;
    color: white;
}

/* Boilerplate stuff */
*,
*:before,
*:after {
  box-sizing: border-box;
}

section {
  max-width: 400px;
  margin-left: auto;
  margin-right: auto;
  display: flex;
  align-items: center;
}
.column {
  float: left;
  width: 50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>


<h3 style="margin-top:2%"> Welcome to Toxichess <h3>
    <h5> Your number one site for playing chess. We are dedicated to providing you with the best services, among which stands out <h5>
<section>
  <div>

  <div class="row">
  <div class="column">
  <ul class="check-list">
            <li>Originality</li>
            <li>Velocity</li>
            <li>Interaction</li>
            <li>Customer Support</li>
            <li>Privacy</li>
        </ul>
  </div>
  <div class="column">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3127.4326395786684!2d-0.5165047846646607!3d38.38524457965286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6236bb72bf619b%3A0x506e11c403138428!2sUniversidad%20de%20Alicante!5e0!3m2!1ses!2ses!4v1621973327447!5m2!1ses!2ses" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
</div> 
    
  </div>
</section>

<h5>Founded in 2021 by, Toxichess has come a long way since its inception at the University of Alicante.</h5>

    <h5>We hope you enjoy our services as much as we enjoy offering them. If you have any questions or comments, feel free to contact us.</h5>

    <h5>Sincerely,</h5>

    <h5>Toxichess</h5>

@endsection