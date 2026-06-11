<h2>
Booking Confirmed
</h2>

<p>
Hello
{{$booking->user->name}}
</p>

<p>
Event:
{{$booking->event->title}}
</p>

<p>
Tickets:
{{$booking->quantity}}
</p>

<p>
Amount:
${{$booking->amount}}
</p>