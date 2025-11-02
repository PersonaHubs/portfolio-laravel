@extends('portfolio.layout')

@section('content')
<div class="contact-section">
  <video autoplay muted loop class="contact-video">
    <source src="{{ asset('videos/jjk2Dbg.mp4') }}" type="video/mp4">
  </video>

  <div class="contact-overlay">
    <h1>Contacts</h1>
    <p>Feel free to reach out. I'm open to create the ideas you wish to come alive.</p>
    <ul class="contact-details">
      <li>Email: dariguezedrian@email.com</li>
      <li>Phone: 969 028 1237</li>
      <li>Location: Manila, Philippines</li>
    </ul>
  </div>
</div>
@endsection
