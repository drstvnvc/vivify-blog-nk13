<html>
  <head>
    <title>{{$post->title}}</title>
    <style>
      body {
          font-family: 'Nunito', sans-serif;
      }
  </style>
  </head>
  <body>
    <a href="/posts">Home</a>
    
    <h2>{{$post->title}}</h2>
    <p>{{$post->body}}</p>
  </body>
</html>
