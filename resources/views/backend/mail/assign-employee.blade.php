@extends("frontend.mail.template")

@section("content")

	<h1 style="font-size: 18px; font-weight: 300;">Hi {{ $user->first_name . ' ' . $user->last_name }}!</h1>
	<h3 style="font-size: 18px; font-weight: 300;">Welcome to Ortiz Skin Clinic </h3>

	<p style="font-size: 14px; font-weight: 300;">REFERENCE NUMBER : {{ $reservation->reference_number }}

	<p style="font-size: 14px; font-weight: 300;">We have already 
		@if($reservation->payment_status == 1)
		<strong style="color:#5cb85c">APPROVED</strong> your uploaded payment in our system. 
		@else
		<strong style="color:#c9302c">REJECTED</strong> your uploaded payment in our system. Please Reupload your payment to verify once again. 
		@endif

		 Thank you!
	 
	<a href="{{ route('frontend.auth.login') }}" style="font-size: 12px; background: #1e87f0; border: 1px solid transparent; margin: 0; border: none; overflow: visible;color: white; text-transform: none; display: inline-block; box-sizing: border-box; padding: 0 30px; vertical-align: middle; line-height: 38px; text-align: center; text-decoration: none; text-transform: uppercase; -webkit-transition: .1s ease-in-out; transition: .1s ease-in-out; -webkit-transition-property: color,background-color,border-color; transition-property: color,background-color,border-color; margin-top: 20px; border-radius: 3px;">Go To Ortiz Skin Clinic</a>
	
	<p style="font-size: 14px; font-weight: 300; margin-top: 20px;">Should you have any questions, please do not hesitate to contact us.</p>

	<p style="margin: 0; margin-top: 50px; font-size: 14px; font-weight: 300;">Warm regards,</p>
	<p style="margin: 0; font-size: 14px; font-weight: 300;">Ortiz Skin Clinic</p>
@endsection
