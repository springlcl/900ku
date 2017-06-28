<html>
<style type="text/css">   
        *{   
            margin: 0;   
            padding: 0;   
            background-color: #EAEAEA;   
        }   
        div{   
           /* width: 200px;   
            height: 200px;   
            background-color: #1E90FF;   */
        }   
        .center-in-center{   
            position: absolute;   
            top: 40%;   
            left: 30%;   
        }   
  </style>  
<div class="center-in-center">
	<form action="{:U('Login/judge')}" method='post' enctype='multipart/form-data'>
		<!-- <input type='text' name='wx_openid' value='' required="required" /> -->
		输入用户ID:<input type="text" name="uid" required="required" /><br /><br />
	<!-- 	输入用户手机:<input type="text" name="mobile" required="required" /><br /><br /> -->
		<input type='submit' name='submit' value='提交' />
	</form>
<div />
</html>