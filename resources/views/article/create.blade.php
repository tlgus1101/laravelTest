

<html>
<title>create </title>
<body>


{!! Form::open([
'route' => 'article.store',
'class' => 'form',
'method' =>'post',
'enctype'=>'multipart/form-data',
]) !!}


{{--    {!! Form::open([--}}
{{--  'route' => 'article.edit',--}}
{{--  'class' => 'form',--}}
{{-- 'enctype'=>'multipart/form-data'--}}
{{--]) !!}--}}

@include('article.form')
@if($articles != null)
    <input type="hidden" name="edit" id="edit" value="ok">
    <button type="submit">수정</button>
@else
    <input type="hidden" name="edit" id="edit" value="no">
    <button type="submit">저장</button>
@endif

{!! Form::close() !!}

<script>
    function edit() {

    }

</script>
</body>
</html>
