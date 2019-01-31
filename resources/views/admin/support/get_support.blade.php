<div class="post clearfix">
    <div class="user-block">
        @foreach($support as $value)
            <div>
                <span class="username">
                    <i class="fa fa-user"> {{$user}}</i>
                </span>
                <message style="margin-left:6%">Message: {{$value->message}}</message>
                <time style="float:right">Time: {{$value->created_at->format('H:m:s/m-d-Y')}}</time>
            </div>
        @endforeach
    </div>
</div>
