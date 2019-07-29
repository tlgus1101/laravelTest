
{!! Form::open([
    'route' => 'article.upload',
    'files'=>'true',
    'method' =>'POST',
    'enctype'=>'multipart/form-data'

 ]) !!}
{!! Form::file('uploadFile') !!}
<button>파일 업로드</button>

{!! Form::close() !!}



<?php
echo Form::open(array('route' => 'article.upload','files'=>'true'));
echo 'Select the file to upload.';
echo Form::file('uploadFile');
echo Form::submit();
echo Form::close();
?>