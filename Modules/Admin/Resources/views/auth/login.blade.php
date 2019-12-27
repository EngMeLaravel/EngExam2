<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="margin-top: 250px;">

    <div id="loginbox" class="mainbox col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">Laravel</div>
            </div>

            <div class="panel-body" >

                <form action="" class="form-horizontal" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="user" required type="email" class="form-control" name="email" value="" placeholder="Email ...">
                    </div>

                    <div class="input-group" style="margin: 15px 0;">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" required type="password" class="form-control" name="password" placeholder="Password ...">
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Đăng nhập</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<div id="particles"></div>
