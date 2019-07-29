

<html>
<title>create </title>
<body>

{!! Form::open([
 'route' => 'article.store',
 'class' => 'form',
 'method' =>'post',
 'enctype'=>'multipart/form-data',
 ]) !!}



@include('article.form')
    <input type="hidden" name="edit" id="edit" value="no">
    <button type="submit">저장</button>


{!! Form::close() !!}

</body>
</html>
