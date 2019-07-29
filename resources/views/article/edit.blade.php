<html>
<title>edit </title>
{!! Form::open([
    'method' => 'PUT',
    'id' => 'Form1',
    'name' => 'Form1',
    'class' => 'form',
    'method' =>'post',
    'enctype'=>'multipart/form-data'
 ]) !!}

@include('article.form')

<input type="hidden" name="edit" id="edit" value="ok">
<button type="button"  onclick="updateU()"> 수정</button>
{!! Form::close() !!}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    function updateU() {
        document.getElementById('Form1').setAttribute('action',"/article/{{$articles}}}/update");
        document.getElementById("Form1").setAttribute('method',"PUT|PATCH");
        document.getElementById("Form1").submit();
    }
</script>

</html>