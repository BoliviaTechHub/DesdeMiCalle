<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
    <div class="title">
        <a href="/fbo" class="logo"><img src="{{asset('images/logo2.png')}}" width="300px"></a>
    </div>

    <div class="claims-container">
        @foreach ($claims as $claim)
            <h1><a href="/fbo/claim/{{$claim->id}}">{{$claim->title}}</a></h1>
        @endforeach
    </div>

    {{$claims->links()}}

</body>

<style>
    body {
        font-family: sans-serif;
        background: #181818;
        height: 400px;
        padding-top: 40px;
        text-align: center;
    }

    .title {
        max-width: 1000px;
        margin: 0 auto;
        padding: 0px 20px;
        position: relative;
    }

    h1 {
        text-align: center;
        width: 100%;
        /*margin-top: 120px;*/
        margin-top: 50px;
        margin-bottom: 50px;
        color: #eee;
        font-weight: 800;
        font-size: 40px;
    }

    a {
        text-decoration: none;
    }
</style>

</html>