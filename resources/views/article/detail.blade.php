
<html>
<title>detail </title>

<body>

{!! Form::open([
    'route' => 'article.detail',
    'method' => 'get'
]) !!}

<div>
    <table>
        <tr>
            <td>
                <table>
                    <tbody>
                    {{$articles}}asdfasdf
                    @foreach($articles as $data)
                    <tr>
                        <th><label for="title">제목</label></th>
                        <td><a name="detail"><input type="hidden" name="idx" id="idx" value="{{$data->idx}}">{{$data->title}}</a></td>
                    </tr>
                    <tr>
                        <th><label for="title">작성날짜</label></th>
                        <td>{{$data->created_at}}</td>
                    </tr>
                    <tr>
                        <th><label for="title">내용</label></th>
                        <td>{{$data->content}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </td>
            <td>
                <button type="submit">검색</button>
            </td>
            <td>
                <a id='write' name='write'>글쓰기</a>
            </td>
        </tr>

    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        $("a[name='write']").on("click",function (e) {
            e.preventDefault();
            location.href="/article/create";
            //window.open("/article/create", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=700,height=700");
        });
        $("a[name='detail']").on("click",function (e) {
            e.preventDefault();
            var idx = $(this).parent().find('#idx').val();
            location.href="/article/detail";
        });

    });

</script>


{!! Form::close() !!}

</body>
</html>