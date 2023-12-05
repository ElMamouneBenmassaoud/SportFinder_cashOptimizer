<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Calculator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/change.css') }}">
</head>
<header class="header">
    <nav class="header-content">
        <div class="header-brand"><i><b>SPORT</b>FINDER</i></div>
    </nav>
</header>
<body>
    <div class="container">
        <h2>Change Calculator</h2>
        <form action="{{ route('calculate-change') }}" method="post" class="mt-4">
            @csrf
            <div class="form-group">
                <label>
                    <input type="number" name="amount" class="form-control" placeholder="Enter Amount">
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Calculate Change</button>
        </form>
        @if(isset($error))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @else
            @if(isset($bills))
                <div class="result mt-4">
                    <strong>Result: {{ $amount }} €</strong>
                    <div class="bills">
                        @foreach($bills as $bill => $quantity)
                            @if($quantity > 0)
                                <div class="bill">
                                    <span>{{ $quantity }} x </span>
                                    <img src="{{ asset('images/bill-' . $bill . '.png') }}" alt="Bill Image">
                                </div>
                            @endif
                        @endforeach
                        <br>
                        <br>
                        {{$result}}
                    </div>
                </div>
            @endif
        @endif
    </div>
</body>
</html>
