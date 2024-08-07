<x-aim-admin::layout.main>
    <x-slot:title>
        QuizApp :: Create Questions
    </x-slot:title>
    <x-aim-admin::crud-form title="Create Questions"/>

    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Quiz</title>
        </head>
        <body>
            @if(session('success'))
                <div>{{ session('success') }}</div>
            @endif
            <form action="{{ route('quiz.submit') }}" method="POST">
                @csrf
                @foreach ($questions as $question)
                    <div class="question">
                        <p>{{ $loop->iteration }}. {{ $question->text }}</p>
                        @if ($question->type === 'radio')
                            @foreach ($question->options as $option)
                                <label>
                                    <input type="radio" name="question_{{ $question->id }}" value="{{ $option }}" required>
                                    {{ $option }}
                                </label><br>
                            @endforeach
                        @elseif ($question->type === 'checkbox')
                            @foreach ($question->options as $option)
                                <label>
                                    <input type="checkbox" name="question_{{ $question->id }}[]" value="{{ $option }}">
                                    {{ $option }}
                                </label><br>
                            @endforeach
                        @endif
                    </div>
                    <hr>
                @endforeach
                <button type="submit">Submit</button>
            </form>
        </body>
        </html>


</x-aim-admin::layout.main>