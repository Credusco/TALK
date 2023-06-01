@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
				@foreach($messages as $message)
					<h5>{{$message->name}}</h5>
					<p>{{$message->email}} - {{$message->date}}</p>
					<p class="fs-5 col-md-8">{{$message->contenu}}</p>
					<hr>
				@endforeach
				<div class="mb-3">
					<form method="POST" action="{{ route('messages') }}">
                        @csrf
						<label for="message-text" class="col-form-label">Message:</label>
						<textarea class="form-control" name="messages" id="message-text" required></textarea><br>
						<button type="submit" class="btn btn-primary btn-sm px-4">Send</button>
					</form>
				  </div>
			  </main>
        </div>
    </div>
</div>
@endsection
