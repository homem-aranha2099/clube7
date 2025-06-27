<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> n</title>
    <style>
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
            overflow: hidden;
        }
        nav{
            display: flex;
            position: absolute;
            flex-direction: row;
            width: 100vw;
            height: 74.6px;
            min-height: 74.6px;
            background-color: #445174;
            align-items: center;
        }
        .nav-links{
            display: flex;
            flex-direction:row;
            padding-left:20px ;
            padding-right:100px ;
            text-decoration: none;
            color: red;
        }

        li{
            display: flex;
            flex-direction:row;
            padding-left:20px ;
            padding-right:20px ;
            text-decoration: none;
        }

        a{
            text-decoration: none;
            /*bolinha*/
            min-height: 43.4px;
            min-width: 43.4px;
            height: 43.4px;
            width: 43.4px;
            background-color: #e6e6e6;
            border-radius: 10px;
        }

        .logo{
            height: 64px;
            width: 64px;
            min-width: 64px;
            min-height: 64px;
            background-color: #e6e6e6;
            border-radius: 100%;
        }
        /*barra de pesquisa*/

        .search-bar {
        display: flex;
        align-items: center;
        background-color: #3e4a70;
        border-radius: 50px;
        padding: 8px 16px;
        width: 100%;
        max-width: 500px;
        height: 100%;
        max-height:57px ;
        border: none;
        margin-left:auto;
        }

        .search-bar input {
        flex: 1;
        background: transparent;
        border: none;
        outline: none;
        color: white;
        font-size: 16px;
        padding-left: 10px;
        }

        .search-bar button {
        background: none;
        border: none;
        cursor: pointer;
        }

        .search-bar button img {
        width: 24px;
        height: 24px;
        filter: brightness(0) invert(1); /* deixa a lupa branca */
        }

        
    </style>
</head>
<body>
<header>
  <nav class="navbar" >
        <a class="logo" href="?inicio"></a>
    <ul class="nav-links">
      <li><a href="?home"></a></li>
      <br><br>
      <li><a href="?livros-didaticos"></a></li>
      <br><br>
      <li><a href="?livros-literários"></a></li>
      <br><br>
      <li><a href="?livros"></a></li>
      <br><br>
      <li><a href="?chats"></a></li>
    </ul>
    <form class="search-bar">
    <button type="submit">
        <img src="lupa-branca.png" />
    </button>
    <input type="text" placeholder="Buscar..." />
    </form>
  </nav>
</header>

</body>
</html>