@extends('emails.messages.post')

@section('body')
    <p>Please find below a summary of the feedback that has been submitted
        since {{ $feedbackSince->toDateTimeString() }}</p>

    <ul>
        @foreach ($feedback as $item)
            <li><strong>{{ $item->account->name }}</strong> - {{ $item->form->name }}
                (Submitted: {{ $item->created_at->toDateTimeString() }})
            </li>
        @endforeach
    </ul>

    <p>You may view the feedback in Core on <a href="{{route('adm.mship.feedback.all')}}">this page</a>.</p>
@stop
