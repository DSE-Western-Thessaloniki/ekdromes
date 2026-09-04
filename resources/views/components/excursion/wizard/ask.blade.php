@props(['question', 'prevstep', 'replyA', 'stepA', 'replyB', 'stepB'])

<div class='ml-auto mr-auto w-9/10'>
    <div class='border-2 border-solid rounded-md'>
        <div class='bg-gray-200 rounded-t-md p-2'>{{ $question }}</div>
        <div class='p-2 space-y-2'>
            <p><a class='btn btn-info' href='{{ route('excursion.wizard', ['step' => $stepA]) }}'>{{ $replyA }}
                    <i class='fas fa-angle-right'></i></a></p>
            <p><a class='btn btn-info' href='{{ route('excursion.wizard', ['step' => $stepB]) }}'>{{ $replyB }}
                    <i class='fas fa-angle-right'></i></a></p>
        </div>
    </div>
</div>
<br>
@unless ($prevstep === '0')
    <p><a href='{{ route('excursion.wizard', ['step' => $prevstep]) }}' class='btn btn-warning'> <i
                class='fas fa-angle-left'></i>
            Προηγούμενο βήμα</a></p>
@endunless
