<html>
<head><title>shwo</title></head>
<body>
{!! Form::open([
    'method' => 'DELETE',
    'id' => 'Form1',
    'name' => 'Form1'
]) !!}

<div>
    <table>
        <tr>
            <td>
                <table border="1">
                    <tbody>
                    @foreach($articles as $data)
                    <tr >
                        <th><label for="title">제목</label></th>
                        <td><a name="detail"><input type="hidden" name="idx" id="idx" value="{{$data->idx}}">{{$data->title}}</a></td>
                    </tr>
                    <tr>
                        <th><label for="title">작성날짜</label></th>
                        <td>{{$data->created_at}}</td>
                    </tr>
                    <tr>
                        <th width="200" ><label for="title">내용</label></th>
                        <td width="300">{{$data->content}}</td>
                    </tr>
                    <tr>
                        <th width="200" ><label for="title">이미지</label></th>
                        <td width="300">{{$data->img_old}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" width="300">
                            <img src="/../../../images/{{$data->img_new}}">
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
        </tr>
    </table>
    <td>
        <button type="button" onclick="list()"> 목록</button>
    </td>
    <td>
        <button type="button" onclick="resetR()">  수정 </button>
    </td>
    <td>
        <button type="button"  onclick="deleteF()"> 삭제</button>
    </td>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

    $(document).ready(function () {
       /* $("a[name='delete']").on("click",function (e) {
            e.preventDefault();
            location.href="/article/<?php  echo $_GET['idx']; ?>/destroy";
            //window.open("/article/create", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=700,height=700");
        });
        $("a[name='reset']").on("click",function (e) {
            e.preventDefault();
            location.href="/article/<?php  echo $_GET['idx']; ?>/edit";
            //window.open("/article/create", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=700,height=700");
        });
        $("a[name='list']").on("click",function (e) {
            e.preventDefault();
            location.href="/article";
        });*/

    });

    function deleteF() {
        document.getElementById('Form1').setAttribute('action',"/article/<?php  echo $_GET['idx']; ?>");
        document.getElementById("Form1").submit();
    }
    function resetR() {

        document.getElementById('Form1').setAttribute('action',"/article/<?php  echo $_GET['idx']; ?>/edit");
        document.getElementById("Form1").setAttribute('method',"GET");
        document.getElementById("Form1").submit();
    }
    function list() {
        document.getElementById('Form1').setAttribute('action',"/article");
        document.getElementById("Form1").setAttribute('method',"GET");
        document.getElementById("Form1").submit();
    }
</script>

{!! Form::close() !!}


</body>
</html>