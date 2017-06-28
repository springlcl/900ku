$('#iform').validate({
        // errorPlacement: function (error, element) {
        // 	// alert(error);

        //     //错误信息提示
        //     // $('#error').html(error);
        // },
        rules: {
            nick_name: {//字段名
                required:true,
                minlength: 2,
                maxlength: 20
            },
            real_name: {//字段名
                required:true,
                isChinese: true,
                minlength: 2,
                maxlength: 4
            },
            file : {
                required : true
            },

            tel:{
            	required:true,
                digits : true,
            	minlength:11,
            	maxlength:11
            },
            mobile : {
                required:true,
                digits : true,
                minlength:11,
                maxlength:11
            },
            username : {
                required:true,
                minlength:2,
                maxlength:20
            },
            user_num:{
                digits : true,
                required:true,
                minlength:3,
                maxlength:5
            },
            bank : {
                required : true,
                digits : true,
                rangelength : [18,21]

            },
            id_number : {
                required : true,
                minlength : 18,
                maxlength : 18
            }
            
        },
        messages: {
            nick_name: {
                required:'未输入',
                minlength: '最少为2个字符的英文名',
                maxlength: '不超过20个字符的英文名'
            },
            real_name: {
                required:'未输入',
                isChinese: '请输入真实姓名',
                minlength: '请输入真实姓名',
                maxlength: '请输入真实姓名'
            },
            file : {
                required : '请上传二维码图片'
            },
            tel: {
            	required:'请输入手机号',
                digits : '请输入正确的手机号',
            	minlength:'请输入正确的手机号',
            	maxlength:'请输入正确的手机号'
            },
            mobile : {
                required:'请输入手机号',
                digits : '请输入正确的手机号',
                minlength:'请输入正确的手机号',
                maxlength:'请输入正确的手机号'
            },
            username : {
                required:'请输入名称',
                minlength:'请输入2-20位的名称',
                maxlength:'请输入2-20位的名称'
            },
            user_num:{
                digits : '请输入整数',
                required:'请输入编码',
                minlength:'请输入3-5位编码',
                maxlength:'请输入3-5位编码'
            },
            bank : {
                required : '请输入银行卡号',
                digits : '请输入整数',
                rangelength : '请输入18-21位之间的银行卡号'
            },
            id_number : {
                required : '请输入身份证号',
                minlength : '请输入合法的身份证号',
                maxlength : '请输入合法的身份证号'
            }
           
            
        },
        // submitHandler: function (form) {
        //     form.submit();//提交表单
        // }
    });

// $('#form_yz').validate({
//     rules:{
//          occupation:{
//             isChinese:true,
//             required:true,
//             rangelength:[2,10]
//          },
//         education:{
//             isChinese:true,
//             required:true,
//             rangelength:[2,5]
//         },
//         age:{
//             digits:true,
//             required:true,
//             range:[1,100]
//         },
//         income:{
//             digits:true,
//             required:true,
//             rangelength:[1,9]
//         }
//     },
//     messages:{
//         occupation:{
//             isChinese:'请输入中文',
//             required:'未输入',
//             rangelength:'请输入正确的职业名称'
//         },
//         education:{
//             isChinese:'请输入中文',
//             required:'未输入',
//             rangelength:'请输入正确的学历'
//         },
//         age:{
//             digits:'请输入整数',
//             required:'未输入',
//             range:'请输入实际的年龄'
//         },
//         income:{
//             digits:'请输入整数',
//             required:'未输入',
//             rangelength:'请输入实际收入'
//         }
//     }
    
// });
