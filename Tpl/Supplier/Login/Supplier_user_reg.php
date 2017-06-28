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
            top: 20%;   
            left: 30%;   
        }   
  </style>  
<div class="center-in-center">
	<form action="{:U('Login/user_reg')}" method='post' enctype='multipart/form-data'>
		上传头像:<input type='file' name='thumb' value='' required="required" /><br /><br />
		昵&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称:<input type="text" name="username" required="required" /><br /><br />
		真实姓名:<input type="text" name="real_name" required="required" /><br /><br />
        手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机:<input type="text" name="mobile" required="required" /><br /><br />
        邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱:<input type="text" name="email" required="required" /><br /><br />
        签&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名:<input type="text" name="sign" required="required" /><br /><br />
		<input type='submit' name='submit' value='提交' />
	</form>
<div />
</html>