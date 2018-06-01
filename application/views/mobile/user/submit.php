<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">		

		<title>故障申报</title>
		<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.css"/>
		<script src="/static/js/jquery-2.1.4.min.js" type="application/javascript"></script>
		<script src="/static/js/bootstrap.js" type="application/javascript"></script>
        <link rel="stylesheet" type="text/css" href="/static/css/logo.css"/>
		<script type="text/javascript">
			function check(){
				var str1="请选择教学楼号";
				var str2="请填写正确的教室号,如“102”";
				
				var building = document.getElementById("building").value;
				if(building==0){
					open(str1);
					return false;
				}

				var classroom = document.getElementById("classroom").value;
				var get =/^\d{3}$/.test(classroom);
				if (get===false) {
					open(str2);
					return false;
				}
				if(parseInt(classroom)<=100|| parseInt(classroom)>=500){
				    open(str2);
				    return false;
                }
			}		
		</script>
		<script type="text/javascript">
			$('#myModal').modal('hide');
			function open(str){
				document.getElementById("alert").innerHTML=str;
				$('#myModal').modal('show');
			}			
		</script>
	</head>
	<body>
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		           <h3 id="alert"></h3>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">好的</button>
		      </div>
		    </div>
		  </div>
		</div>
		
		
		
		<div class="container">
		<div id="top-head">
            <div class="container">
                <div id="img" class="col-xs-2"><img src="/static/img/tianjin.jpg"/></div>
                <div id="title" class="col-xs-10">填写故障内容:</div>
            </div>
		</div>
		</div>
		
		<form action="/api/submit" onsubmit="return check()" method="post">
				<div class="form-group form-inline">
					<label class="col-xs-5"><span class="glyphicon glyphicon-home" aria-hidden="true"> 教学楼</label>
					<select id="building" name="build" class="form-control">
						<option value="0">请选择教学楼号</option>
						<option value="7">7教</option>
						<option value="8">8教</option>
						<option value="9">9教</option>
						<option value="10">10教</option>
					</select>
				</div>
				<div class="form-group">
					<label class="col-xs-5"><span class="glyphicon glyphicon-modal-window" aria-hidden="true"> 教室</label><input id="classroom" class="form-control" name="room" type="text" placeholder="请填写教室号" required/>
				</div>
				<div class="form-group">
					<label class="col-xs-5"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> 故障描述</label><textarea class="form-control" rows="2" name="description" placeholder="请描述故障" required></textarea>
				</div>
				
				<button class="btn btn-primary form-control" type="submit">
					<span class="glyphicon glyphicon-log-in" aria-hidden="true"> 故障提交
				</button>
		</form>
		
		
	</body>
</html>