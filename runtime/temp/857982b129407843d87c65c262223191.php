<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:49:"./template/mobile/mobile1/newjoin\basic_info.html";i:1517208521;s:44:"./template/mobile/mobile1/public\header.html";i:1517208521;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>商家入驻--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
    <link rel="stylesheet" href="__STATIC__/css/style.css">
<!--    <link rel='stylesheet' href="__STATIC__/css/base.css">
    <link rel='stylesheet' href="__STATIC__/css/mobile.css">-->
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/iconfont.css"/>
    <script src="__STATIC__/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="__STATIC__/js/mobile-util.js" type="text/javascript" charset="utf-8"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__STATIC__/js/layer/layer.js" type="text/javascript" charset="utf-8"></script>
   <script src="__STATIC__/js/swipeSlide.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script>
    <style>
        body footer {
            height: 2rem;
        }
        body footer ul li .b-icon {
            width: .84rem;
            height: .84rem;
            margin: .2rem auto 0;
        }
        body footer ul li .b-wen {
            margin-top: .2rem; 
            font-size: .48rem;
        }
    </style>
</head>
<body class="g4">

<script src="__ROOT__/public/static/js/layer/laydate/laydate.js"></script>
<body class="bg-ededed">
<div class="set-store-mes set-mes-on">
    <form action="<?php echo U('Mobile/Newjoin/basic_info'); ?>" id="queryForm" method="post" enctype="multipart/form-data">
        <div class="set-mes-tips1"><i class="ico-arrow-down3"></i>基本信息</div>
        <div class="store-mes-list1" style="display:block;">
            <div class="between-item">
                <label>店铺名称:</label>
                <input type="text" id="store_name" name="store_name" placeholder="请填写店铺名称(必填)"/>
            </div>
            <div class="between-item">
                <label>店铺登录主账号:</label>
                <input type="text" id="seller_name" name="seller_name" placeholder="请填写店铺主账号(必填)"/>
            </div>
            <a href="javascript:void(0)" onclick="locationaddress(this);">
                <div class="between-item">
                    <label>所在地区: </label>
                    <div class="fr" style="margin-top:.832rem;margin-left: .64rem;">
                        <i class="Mright"></i>
                    </div>
                    <div class="fr">
                        <input id="area" value="" type="text" placeholder="请选择所在地区">
                        <input type="hidden" value="0" name="company_province" id="company_province"
                               class="hiddle_area"/>
                        <input type="hidden" value="0" name="company_city" id="company_city" class="hiddle_area"/>
                        <input type="hidden" value="0" name="company_district" id="company_district"
                               class="hiddle_area"/>
                    </div>
                </div>
            </a>

            <div class="between-item">
                <label>详细地址:</label>
                <input type="text" id="company_address" name="company_address" placeholder="请填写店铺详细地址(必填)"/>
            </div>
            <div class="between-item">
                <label>店铺电话:</label>
                <input type="text" id="company_telephone" name="company_telephone" placeholder="可填写多个联系方式(必填)"/>
            </div>
            <div class="between-item">
                <label>电子邮箱:</label>
                <input type="text" id="company_email" name="company_email" placeholder="请填写邮箱地址(必填)"/>
            </div>
            <div class="between-item">
                <label>联系人姓名:</label>
                <input type="text" id="contacts_name" name="contacts_name" placeholder="请填写联系人姓名(必填)"/>
            </div>
            <div class="between-item">
                <label>联系人手机:</label>
                <input type="text" id="contacts_mobile" name="contacts_mobile" placeholder="(必填)"/>
            </div>
            <div class="between-item">
                <label>主营类目:</label>
                <!--<input type="sc_name" id="main_channel" name="main_channel"  placeholder="(必填)" />-->
                <select id="sc_id" class="input145 mr10" name="sc_id"
                        onblur="checkEmpty($('#sc_id').val(), 'sc_id', '店铺主营大类', '');"
                        onchange="javascript:$('#sc_name').val($('#sc_id option:selected').text())">
                    <option value="">请选择</option>
                    <?php if(is_array($store_class) || $store_class instanceof \think\Collection || $store_class instanceof \think\Paginator): if( count($store_class)==0 ) : echo "" ;else: foreach($store_class as $k=>$vo): ?>
                        <option value="<?php echo $k; ?>"
                        <?php if($k == $apply[sc_id]): ?>selected<?php endif; ?>
                        ><?php echo $vo; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
</div>
<div class="set-store-mes set-mes-on" style="display:block;">
    <div class="set-mes-tips1" style="display:block;"><i class="ico-arrow-down3"></i>证照信息</div>
    <div class="store-mes-list1" style="display:block;">
        <p class="set-license-tips">需上传在有效期内的营业执照，且为原件照片</p>
        <div class="license-pic">
            <label id="fileList0">
                <img src="__STATIC__/images/license-pic1.png">
                <input type="file" accept="image/*" name="comment_img_file" onchange="handleFiles(this,0)"
                       style="display:none">
            </label>
            <span>* 请必须上传(照片须清晰完整)</span>
        </div>

        <div class="business-license">
            <input type="hidden" id="business_permanent" name="business_permanent" value="">
            <div class="between-item">
                <label>长期有效</label>
                <span class="switch" id="switch"><i class="slider"><span></span></i></span>
                <script>
                    $('#switch').unbind('click').click(function () {
                        $(this).toggleClass('switch-on');
                        $("#toggle").toggle();
                    });
                </script>
            </div>

            <div id="toggle">
                <div class="between-item">
                    <label>有效期开始时间</label>
                    <!--<input type="text" placeholder="非长期有效请填写" id="business_date_start" name="business_date_start" />-->
                    <input type="text" id="business_date_start" name="supplier[business_date_start]" value=""
                           class="input-time145 fl">
                </div>

                <div class="between-item">
                    <label>有效期结束时间</label>
                    <input type="text" id="business_date_end" name="supplier[business_date_end]" value=""
                           class="input-time145 fl">
                </div>
            </div>
            <div class="between-item">
                <label>营业执照注册号</label>
                <input type="text" placeholder="请与营业执照保持上一致" id="business_licence_number"
                       name="business_licence_number"/>
            </div>
            <p class="set-input-tips">请按照营业执照上的信息填写，仅支持数字、字母和汉字。
                如：410998000018866（1-1），请输入：410998000018866</p>
            <!--                <div class="between-item">
                                <label>字号名称</label>
                                <input type="text" placeholder="请与营业执照保持上一致" id="legal_identity_cert" name="legal_identity_cert"  />
                            </div>
                            <p class="set-input-tips">如果个体户营业执照没有名称，名称中请填写经营者姓名。企业
                                执照请填写法人代表、个体户执照请填写经营者姓名。</p>
            -->
        </div>


    </div>
</div>
<div class="set-store-mes set-mes-on" style="display:block;">
    <div class="set-mes-tips1"><i class="ico-arrow-down3"></i>结算银行账号</div>
    <div class="store-mes-list1" style="display:block;">
        <div class="between-item">
            <label>银行开户名:</label>
            <input type="text" id="bank_account_name" name="bank_account_name" placeholder="请填写银行开户名(必填)"/>
        </div>
        <div class="between-item">
            <label>银行账号:</label>
            <input type="text" id="bank_account_number" name="bank_account_number" placeholder="请填写银行账号(必填)"/>
        </div>
        <div class="between-item">
            <label>开户人身份证:</label>
            <input type="text" id="store_person_identity" name="store_person_identity" placeholder="请填写身份证号(必填)"/>
        </div>
        <div class="between-item">
            <label>开户银行支行:</label>
            <input type="text" id="bank_branch_name" name="bank_branch_name" placeholder="请填写开户支行名称(必填)"/>
        </div>
    </div>
    </form>
</div>

<!--选择地区-s-->
<div class="container">
    <div class="city">
        <div class="screen_wi_loc">
            <div class="classreturn loginsignup">
                <div class="content">
                    <div class="ds-in-bl return seac_retu">
                        <a href="javascript:void(0);" onclick="closelocation();"><img src="__STATIC__/images/return.png"
                                                                                      alt="返回"></a>
                    </div>
                    <div class="ds-in-bl search center">
                        <span class="sx_jsxz">选择地区</span>
                    </div>
                    <div class="ds-in-bl suce_ok">
                        <a href="javascript:void(0);">&nbsp;</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="province-list"></div>
        <div class="city-list" style="display:none"></div>
        <div class="area-list" style="display:none"></div>
    </div>
</div>
<!--选择地区-e-->
<script src="__STATIC__/js/mobile-location.js"></script>
<script src="__STATIC__/js/style.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $('.set-mes-tips1').unbind('click').click(function () {
        $(this).parents('.set-store-mes').toggleClass('set-mes-on').find('.store-mes-list1').toggle();
    })
    function subimtdata() {
        var store_name = $("#store_name").val();           //店铺名称
        var seller_name = $("#seller_name").val();          //店铺登录主账号
        var province = $("#company_province").val();
        var city = $("#company_city").val();
        var district = $("#company_district").val();
        var company_address = $("#company_address").val();      //店铺地址
        var company_telephone = $("#company_telephone").val();    //店铺电话:
        var company_email = $("#company_email").val();              //电子邮箱
        var contacts_name = $("#contacts_name").val();       //负责人签名
        var contacts_mobile = $("#contacts_mobile").val();       //联系人手机
        var sc_id = $("#sc_id").val();                           //主营类目

        var business_date_start = $("#business_date_start").val();    //有效期
        var business_licence_number = $("#business_licence_number").val();//注册号
        var legal_identity_cert = $("#legal_identity_cert").val();   //字号名称
        var business_licence_cert = $("#business_licence_cert").val();//授权函:

        var bank_account_name = $("#bank_account_name").val();     //银行开户名:
        var bank_account_number = $("#bank_account_number").val();   //银行账号:
        var store_person_identity = $("#store_person_identity").val();//开户人身份证
        var bank_branch_name = $("#bank_branch_name").val();      //开户银行支行

        if (store_name.length == 0) {
            layer.open({content: "请填写店铺名称", time: 2});
            return false;
        }
        if (seller_name.length == 0) {
            layer.open({content: "店铺登录主账号未填写", time: 2});
            return false;
        }
        if (province <= 0 || city <= 0 || district <= 0) {
            layer.open({content: "省市区资料不完善", time: 2});
            return false;
        }
        if (checkEmpty($("#company_address").val(), 'company_address', '公司详细地址', '') != 1) {
            layer.open({content: "请填写详细地址", time: 2});
            return false;
        }
        if (checkEmpty($("#company_telephone").val(), 'company_telephone', '固定电话', 'phone') != 1) {
            layer.open({content: "店铺电话不正确", time: 2});
            return false;
        }
        if (checkEmpty($("#company_email").val(), 'company_email', '电子邮箱', 'email') != 1) {
            layer.open({content: "电子邮箱，填写有误", time: 2});
            return false;
        }
        if (contacts_name.length == 0) {
            layer.open({content: "联系人签名未填写", time: 2});
            return false;
        }
        if (!checkMobile(contacts_mobile)) {
            layer.open({content: "联系人手机不正确", time: 2});
            return false;
        }
        if (sc_id == undefined) {
            layer.open({content: "请选择主营类目", time: 2});
            return false;
        }
        var business_date_start = $("#business_date_start").val();
        var business_date_end = $("#business_date_end").val();
        if ($("#toggle").is(":hidden")) {
            $("#business_date_end").val("");
            $("#business_date_start").val("");
            $("#business_permanent").val(1);
        } else {
            if (business_date_start == undefined || business_date_start == "" || business_date_end == undefined || business_date_end == "") {
                layer.open({content: "请填写正确执照有效期", time: 2});
                return false;
            } else if (business_date_start >= business_date_end) {
                layer.open({content: "营业执照有效期开始日期不能晚于或等于结束日期，填写有误", time: 2});
                return false;
            }
        }
        if (business_licence_number.length == 0) {
            layer.open({content: "营业执照注册号未填写", time: 2});
            return false;
        }
        if (bank_account_name.length == 0) {
            layer.open({content: "银行开户名未填写", time: 2});
            return false;
        }
        if (bank_account_number.length == 0) {
            layer.open({content: "银行账号未填写", time: 2});
            return false;
        }
        if (store_person_identity.length == 0) {
            layer.open({content: "开户人身份证未填写", time: 2});
            return false;
        }
        if (bank_branch_name.length == 0) {
            layer.open({content: "开户银行支行未填写", time: 2});
            return false;
        }
        $("#queryForm").submit();
    }

    /**
     * 检测非空
     */
    var ret = 0;
    function checkEmpty(value, id, msg, type) {
        var _email = /^([a-zA-Z0-9]+[_|\_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        var _phone = /^((\+?[0-9]{2,4}\-[0-9]{3,4}\-)|([0-9]{3,4}\-))?([0-9]{7,8})(\-[0-9]+)?$/;
        var _zip = /^[0-9][0-9]{5}$/;

        var _positiveInteger = /^[0-9]*[1-9][0-9]*$/;
        var _money = /^[1-9]{1}\d*(\.\d{1,2})?$/;
        var _money1 = /^(?!0)\d{1,6}$|^(?!0)\d{1,6}[.]\d{1,6}$|^0[.]\d{1,6}$/;
        var _corpLicence = /^[0-9A-Za-z]{18}$/;
        if (value == "" || ($.trim(value)).length == 0) {

            ret = 0;
        } else {
            if ((type == "corpLicence" && !(_corpLicence.test(value))) || (type == "email" && !(_email.test(value))) || (type == "phone" && !(_phone.test(value))) || (type == "mobile" && !(_mobile.test(value))) || (type == "zip" && !(_zip.test(value))) || (type == "positiveInteger" && !(_positiveInteger.test(value))) || (type == "money" && !(_money.test(value))) || (type == "money1" && (!(value > 0) || !(_money1.test(value))))) {
                ret = 0;
            } else {
                ret = 1;
            }
        }
        return ret;
    }
</script>


<script type="text/javascript">
    function locationaddress(e) {
        $('.container').animate({width: '14.4rem', opacity: 'show'}, 'normal', function () {
            $('.container').show();
        });
        if (!$('.container').is(":hidden")) {
            $('body').css('overflow', 'hidden')
            cover();
            $('.mask-filter-div').css('z-index', '9999');
        }
    }
    function closelocation() {
        var province_div = $('.province-list');
        var city_div = $('.city-list');
        var area_div = $('.area-list');
        if (area_div.is(":hidden") == false) {
            area_div.hide();
            city_div.show();
            province_div.hide();
            return;
        }
        if (city_div.is(":hidden") == false) {
            area_div.hide();
            city_div.hide();
            province_div.show();
            return;
        }
        if (province_div.is(":hidden") == false) {
            area_div.hide();
            city_div.hide();
            $('.container').animate({width: '0', opacity: 'show'}, 'normal', function () {
                $('.container').hide();
            });
            undercover();
            $('.mask-filter-div').css('z-index', 'inherit');
            return;
        }
    }

    //选择地址回调
    function select_area_callback(province_name, city_name, district_name, province_id, city_id, district_id) {
        var area = province_name + ' ' + city_name + ' ' + district_name;
        $("#area").val(area);
        $("input[name=company_province]").val(province_id);
        $("input[name=company_city]").val(city_id);
        $("input[name=company_district]").val(district_id);
    }

    //显示上传照片
    window.URL = window.URL || window.webkitURL;
    function handleFiles(obj, id) {
        fileList = document.getElementById("fileList" + id);
        var files = obj.files;
        img = new Image();
        if (window.URL) {

            img.src = window.URL.createObjectURL(files[0]); //创建一个object URL，并不是你的本地路径
            img.width = 60;
            img.height = 60;
            img.onload = function (e) {
                window.URL.revokeObjectURL(this.src); //图片加载后，释放object URL
            }
            if (fileList.firstElementChild) {
                fileList.removeChild(fileList.firstElementChild);
            }
            fileList.appendChild(img);
        } else if (window.FileReader) {
            //opera不支持createObjectURL/revokeObjectURL方法。我们用FileReader对象来处理
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onload = function (e) {
                img.src = this.result;
                img.width = 60;
                img.height = 60;
                fileList.appendChild(img);
            }
        } else {
            //ie
            obj.select();
            obj.blur();
            var nfile = document.selection.createRange().text;
            document.selection.empty();
            img.src = nfile;
            img.width = 60;
            img.height = 60;
            img.onload = function () {

            }
            fileList.appendChild(img);
        }
    }

</script>
<div class="btns-fixed-wrap3">
    <div class="btns-fixed-bottom btns-3">
        <p class="agree-ment">同意<a href="javascript:;">《TPshop商家服务协议》</a></p>
        <!--<a class="btns-a" href="javascript:;" onClick="subimtdata()">确认提交</a>-->
        <input type="button" value="确认提交" class="btns-a" onclick="subimtdata()"/>
    </div>
</div>
</body>
</html>