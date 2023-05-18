<?php require_once('path.php');?>
<?php include_once(ROOT_PATH . '/app/config/dbConPDO.php'); ?>

<?php 
    $title = '404 - Page not Found!'; 
    $page = '404 - Page not Found!'; 
    $pagehas = array('');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- metadata -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- end of metadata -->

    <!-- favico -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo (BASE_URL . '/assets/images/favicon/apple-touch-icon.png') ?>" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo (BASE_URL . '/assets/images/favicon/favicon-32x32.png') ?>" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo (BASE_URL . '/assets/images/favicon/favicon-16x16.png') ?>" />
    <link rel="manifest" href="<?php echo (BASE_URL . '/assets/images/favicon/site.webmanifest') ?>" />
    <link rel="mask-icon" href="<?php echo (BASE_URL . '/assets/images/favicon/safari-pinned-tab.svg') ?>"
        color="#1266f1" />
    <link rel="shortcut icon" href="<?php echo (BASE_URL . '/assets/images/favicon/favicon.ico') ?>" />
    <meta name="msapplication-TileColor" content="#1266f1" />
    <meta name="msapplication-config" content="<?php echo (BASE_URL . '/assets/images/favicon/browserconfig.xml') ?>" />
    <meta name="theme-color" content="#1266f1" />
    <!-- end of favico -->


    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- ROBOTO -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- LORA -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Montserrat -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- end of FONTS -->

    <!-- STYLESHEETS / CSS -->
    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font-Awesome-Pro 6 -->
    <link rel="stylesheet" href="<?php echo (BASE_URL . '/assets/vendor/font_awesome-6pro/font-awesome.min.css') ?>" />

    <!-- Fonts used -->
    <link rel="stylesheet" href="<?php echo (BASE_URL . '/assets/styles/css/fonts.css') ?>" />


    <style>
    @import url("https://fonts.googleapis.com/css?family=Bevan");

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background: #282828;
        overflow: hidden;
    }

    button {
        font-family: 'Montserrat';
    }

    p {
        font-family: "Bevan", cursive;
        font-size: 130px;
        margin: 10vh 0 0;
        text-align: center;
        letter-spacing: 5px;
        background-color: black;
        color: transparent;
        text-shadow: 2px 2px 3px rgba(255, 255, 255, 0.1);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
    }

    p span {
        font-size: 1.2em;
    }

    code {
        color: #bdbdbd;
        text-align: center;
        display: block;
        font-size: 16px;
        margin: 0 30px 25px;
    }

    code span {
        color: #f0c674;
    }

    code i {
        color: #b5bd68;
    }

    code em {
        color: #b294bb;
        font-style: unset;
    }

    code b {
        color: #81a2be;
        font-weight: 500;
    }

    a {
        color: #8abeb7;
        font-family: monospace;
        font-size: 20px;
        text-decoration: underline;
        margin-top: 10px;
        display: inline-block;
    }

    @media screen and (max-width: 880px) {
        p {
            font-size: 14vw;
        }
    }

    </style>
    <title><?php echo $title ?></title>
</head>


<body class="body-404">
    <main class="h-body">

        <div class="text-center mt-5">
            <button onclick="window.history.back()" class="btn btn-danger">
                <i class="fa-solid fa-arrow-left-to-line"></i>
                <span class="ms-1 fw-bold">GO BACK</span>
            </button>
        </div>
        <p>HTTP: <span>404</span></p>

        <div>
            <code><span>this_page</span>.<em>not_found</em> = true;</code>
            <code><span>if</span> (<b>you_spell_it_wrong</b>) {<span>try_again()</span>;}</code>
            <code>
                <span>else if (<b>we_screwed_up</b>)</span> {<em>alert</em>(<i>"We're really sorry about that."</i>); 
                <span>window</span>.<em>location</em> = home;}
            </code>
        </div>
    </main>

    <script>
    function type(n, t) {
        var str = document.getElementsByTagName("code")[n].innerHTML.toString();
        var i = 0;
        document.getElementsByTagName("code")[n].innerHTML = "";

        setTimeout(function() {
            var se = setInterval(function() {
                i++;
                document.getElementsByTagName("code")[n].innerHTML =
                    str.slice(0, i) + "|";
                if (i == str.length) {
                    clearInterval(se);
                    document.getElementsByTagName("code")[n].innerHTML = str;
                }
            }, 10);
        }, t);
    }

    type(0, 0);
    type(1, 600);
    type(2, 1300);
    </script>

</body>


</html>
