<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
    <header>
        <div class="inner">
            <nav>
                <a href="#" class="logo">Desde Mi Calle</a>
                <input type="checkbox" id="nav" /><label for="nav"></label>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li>
                        <a href="#">Reclamos</a>
                        <ul>
                            <li><a href="#">Ver Reclamos</a></li>
                            <li><a href="#">Hacer un Reclamo</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Acerca de nosotros</a></li>
                </ul>
            </nav>
            <h1>Hola!.. :3</h1>
        </div>
    </header>
</body>

<style>
    body {
        font-family: sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    header {
        background: #181818;
        height: 400px;
        padding-top: 40px;
    }

    .inner {
        max-width: 1000px;
        margin: 0 auto;
        padding: 0px 20px;
        position: relative;
    }

    .logo {
        text-decoration: none;
        color: #777;
        font-weight: 800;
        font-size: 30px;
        line-height: 40px;
    }

    h1 {
        text-align: center;
        width: 100%;
        margin-top: 120px;
        color: #eee;
        font-weight: 800;
        font-size: 40px;
    }

    nav > ul {
        float: right;
    }

    nav > ul > li {
        text-align: center;
        line-height: 40px;
        margin-left: 70px;
    }

    nav > ul li ul li {
        width: 100%;
        text-align: left;
    }

    nav ul li:hover {
        cursor: pointer;
        position: relative;
    }
    nav ul li:hover > ul {
        display: block;
    }
    nav ul li:hover > a {
        color: #777;
    }
    nav > ul > li > a {
        cursor: pointer;
        display: block;
        outline: none;
        width: 100%;
        text-decoration: none;
    }

    nav > ul > li {
        float: left;
    }
    nav a {
        color: white;
    }
    nav > ul li ul {
        display: none;
        position: absolute;
        left: 0;
        top: 100%;
        width: 100%;
        z-index: 2000;
    }
    nav > ul li ul li > a {
        text-decoration: none;
    }

    [type="checkbox"], label {
        display: none;
    }

    @media screen and (max-width: 768px) {
        nav ul {
            display: none;
        }

        label {
            display: block;
            background: #222;
            width: 40px;
            height: 40px;
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 0px;
        }

        label:after{
            content:'';
            display: block;
            width: 30px;
            height: 5px;
            background: #777;
            margin: 7px 5px;
            box-shadow: 0px 10px 0px #777, 0px 20px 0px #777
        }

        [type="checkbox"]:checked ~ ul {
            display: block;
            z-index: 9999;
            position: absolute;
            right: 20px;
            left: 20px;
        }

        nav a {
            color: #777;
        }

        nav ul li {
            display: block;
            float: none;
            width: 100%;
            text-align: left;
            background: #222;
            text-indent: 20px;
        }

        nav > ul > li {
            margin-left: 0px;
        }

        nav > ul li ul li {
            display: block;
            float: none;
        }

        nav > ul li ul {
            display: block;
            position: relative;
            width: 100%;
            z-index: 9999;
            float: none;
        }
        h1 {
            font-size: 26px;
        }
    }

</style>

</html>