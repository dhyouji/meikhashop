<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Laravel</title>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            margin: 0;
        }

        .content {
            height: 100%;
            width: 100%;
            padding: 0;
            margin: 0;
            flex-wrap: wrap;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <div class="content">
        <div id="item1">
            <p style="margin: 0px">Global Independent Adventure</p>
            <h1 style="font-size: 400%;margin: 0px">Meikhashop</h1>
            <h2 style="font-size: 200%;margin: 0px;text-align:center;">Preorder Tracking</h2>
        </div>
        <form method="GET" action="{{ route('track') }}">
            <div class="input-group">
                <input type="text" class="form-control" name="tracknum" placeholder="preorder_number...">
                <span class="input-group-append">
                    <button class="btn btn-secondary" type="submit">Submit
                    </button>
                </span>
            </div>
        </form>
    </div>
</body>

</html>