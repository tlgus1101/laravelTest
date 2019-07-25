
<html>
<title>idex </title>
{!! Form::open([
    'route' => 'article.index',
    'method' => 'get'
]) !!}
<div>
    <table>
        <tr>
            <td>
                <table>
                    <tbody>
                    <tr>
                        <th><label for="title">제목</label></th>
                        <td>
                            <input type="text" id="title" name="title">
                        </td>
                    </tr>
                    <tr>
                        <th><label for="title">작성날짜</label></th>
                        <td>
                            <input type="text" id="created_at_from" name="created_at_from"> ~
                            <input type="text" id="created_at_to" name="created_at_to">
                        </td>
                    </tr>
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

        <table border="1">
            <tbody align="center">
            <tr>
                <th width="200"><label for='title'>제목</label></th>
                <th width="200"><label for='createDate'>작성날짜</label></th>
            </tr>
            @foreach($articles as $data)
                <tr>
                    <td><a name="detail"><input type="hidden" name="idx" id="idx" value="{{$data->idx}}">{{$data->title}}</a></td>
                    <td>{{$data->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

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
                    location.href="/article/show?idx="+idx;
                });

            });

        </script>


{!! Form::close() !!}
</html>