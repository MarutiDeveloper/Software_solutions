<h2>Thank You, {{ $contact['name'] }}!</h2>
 <!-- Add current date -->
 <h4>Date: {{ now()->format('l, F j, Y') }}</h4> <!-- Example format: "Friday, November 30, 2024" -->
<p>We received your message. Here are the details:</p>
<p><strong>Name:</strong> {{ $contact['name'] }}</p>
<p><strong>Email:</strong> {{ $contact['email'] }}</p>
<p><strong>Subject:</strong> {{ $contact['subject'] }}</p>
<p><strong>Message:</strong></p>
<p>{{ $contact['message'] }}</p>
<p>We will get back to you soon!</p>
