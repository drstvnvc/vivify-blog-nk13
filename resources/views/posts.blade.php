<html>
  <head>
    <title>Vivify Blog</title>

    <style>
      body {
          font-family: 'Nunito', sans-serif;
      }
  </style>
  </head>
  <body>
    <h2>Posts</h2>
    <ul>
      @foreach ($posts as $post)
        <li><a href="/posts/{{$post->id}}">{{$post->title}}</a></li>
      @endforeach
    </ul>
  </body>
</html>
