<html>
<head><title>shwo</title></head>
<body>
{!! Form::open([
    'method' => 'get'
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
                    @endforeach
                    </tbody>

                </table>
            </td>
        </tr>
    </table>
    <td>
        <a id='list' name='list'>목록</a>
    </td>
    <td>
        <a id='reset' name='reset'>수정</a>
    </td>
    <td>
        <a id='delete' name='delete'>삭제</a>
    </td>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        $("a[name='delete']").on("click",function (e) {
            e.preventDefault();
            location.href="/article/edit?idx=" + <?php  echo $_GET['idx']; ?>;
            //window.open("/article/create", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=700,height=700");
        });
        $("a[name='reset']").on("click",function (e) {
            e.preventDefault();
            location.href="/article/create?ck=2&idx="+<?php  echo $_GET['idx']; ?>;
            //window.open("/article/create", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=700,height=700");
        });
        $("a[name='list']").on("click",function (e) {
            e.preventDefault();
            location.href="/article";
        });

    });

</script>


{!! Form::close() !!}


</body>
</html>