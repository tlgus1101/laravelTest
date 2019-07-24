

<html>
<title>create </title>

{!! Form::open([
 'route' => 'article.store',
 'class' => 'form',
 'enctype'=>'multipart/form-data'

]) !!}

@include('article.form')
@if($articles!=null)
    <button type="button" onclick="edit()">수정</button>
@else
    <button type="submit">저장</button>
@endif
{!! Form::close() !!}

<script>
    function edit() {
        alert(<?php echo $_GET['idx']?>);
       // location.href = "/article/edit?idx="+<?php echo $_GET['idx']?>;
    }

</script>

</html>
