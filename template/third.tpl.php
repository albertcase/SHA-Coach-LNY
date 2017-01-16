<!DOCTYPE HTML>
<html>
<head>
    <title>2017“酉”鸿运！</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="format-detection" content="telephone=no">
    <!-- uc强制竖屏 -->
    <meta name="screen-orientation" content="landscape">
    <!-- QQ强制竖屏 -->
    <meta name="x5-orientation" content="landscape">

    <!--禁用手机号码链接(for iPhone)-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimum-scale=1.0,maximum-scale=1.0,minimal-ui" />
    <!--自适应设备宽度-->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!--控制全屏时顶部状态栏的外，默认白色-->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="Keywords" content="">
    <meta name="Description" content="...">
    <link rel="stylesheet" type="text/css" href="/dist/asset/css/all.min.css">
    <script type="text/javascript" src="/dist/asset/js/all.min.js"></script>
    <script type="text/javascript" src="http://coach.samesamechina.com/api/v1/js/9a6edd5b-c1bc-4d6a-9dd4-b03defc4ff46/wechat"></script>

    <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?6cd44258dd7a23d93973055d942129ed";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
    </script>

</head>
<body>


<!-- 横屏代码 -->
<div id="orientLayer" class="mod-orient-layer">
    <div class="mod-orient-layer__content">
        <i class="icon mod-orient-layer__icon-orient"></i>
        <div class="mod-orient-layer__desc">请在解锁模式下，横屏体验游戏</div>
    </div>
</div>


<div id="dreambox">

    <!-- 成功(已关注) -->
    <div class="section" id="success_attention">
        <div class="footer">
            <a href="javascript:_lny.getCard();" onclick="_hmt.push(['_trackEvent', 'click', 'btn', '领取店铺红包']);" class="btn apply_btn">领取店铺红包</a>
            <!-- <a href="javascript:_lny.sectionChange('storelist')" class="btn storelist_btn">门店列表</a> -->
        </div>
    </div>

    <!-- 成功(未关注) -->
    <div class="section" id="success_not_attention">
        <img src="/dist/asset/img/p3.jpg" height="100%" style="opacity: 0;">
        <div class="footer">
            <a href="javascript:_lny.sectionChange('success_attention')" onclick="_hmt.push(['_trackEvent', 'click', 'btn', '下一步']);" class="btn next_btn">下一步</a>
        </div>
    </div>

    <!-- 失败 -->
    <div class="section" id="failure">
    </div>

    <!-- 店铺列表 -->
    <div class="section" id="storelist">

        <div class="storelist">
            <div class="chosecity">
                <select name="city">
                    <!-- <option value="">城市 / CITY</option> -->
                </select>
            </div>
            <ul id="storelistScroll">
                <!-- <li>
                    <em>上海香港广场</em>
                    <p>淮海中路282号香港广场商场北座1楼及2楼</p>
                </li> -->
            </ul>
        </div>

    </div>



</div>


<script type="text/javascript" src="/dist/asset/js/public.min.js"></script>

<script type="text/javascript">
    pfun.init();
    
    var pType = (!pfun.getQueryString("type") ? "yattention" : pfun.getQueryString("type"));

    function lnyFun(){
        var self = this;
        self.init = function(){
            if(pType == "failure"){
                self.sectionChange(pType);
            }else if(pType == "nattention"){
                self.sectionChange("success_not_attention");
            }else{
                self.sectionChange("success_attention");
            }  

            $("#dreambox").css({"visibility": "visible"}); 
        }
        // 页面切换
        self.sectionChange = function(n){        // section 页面切换
            $(".section").removeClass("show transition");
            $("#" + n).addClass('show transition');
        }


        // 微信卡券
        self.getCard = function(){

            pfun.ajaxFun("POST", "/api/card", "", "json", function(data){
                if(data.status == 1){
                    wx.addCard({
                        cardList: [{
                            cardId: data.msg[0].cardId,
                            cardExt: '{"timestamp":"'+data.msg[0].cardExt.timestamp+'","signature":"'+data.msg[0].cardExt.signature+'","openid":"'+data.msg[0].cardExt.openid+'","code":"'+data.msg[0].cardExt.code+'"}'
                        }],
                        success: function(res) {
                            console.log(cardList);
                            var cardList = res.cardList;
                            //alert(JSON.stringfiy(res));
                        },
                        fail: function(res) {
                            //alert(JSON.stringfiy(res));
                        },
                        complete: function(res) {
                            //alert(JSON.stringfiy(res));
                        },
                        cancel: function(res) {
                            //alert(JSON.stringfiy(res));
                        },
                        trigger: function(res) {
                            //alert(JSON.stringfiy(res));
                        }
                    });
                }

                // console.log(data.status);
            });

        }

    }


    var _lny = new lnyFun();

    _lny.init();



var storelistData ={
        "Shanghai": {
            "name": "上海",
            "list": ["上海香港广场", "上海国金中心", "上海港汇广场"],
            "address": ["淮海中路282号香港广场商场北座1楼及2楼", "上海市浦东新区陆家嘴金融贸易区世纪大道8号上海国金中心D座地下一层LG1-53,55,56&57室", "徐汇区虹桥路1号港汇广场1楼"]
        },
        "Kunming": {
            "name": "昆明",
            "list": ["昆明顺城购物中心", "昆明金格时光精品店"],
            "address": ["昆明市东风西路11号1层T-126及T-127店", "昆明市北京路985号金格百货时光店商场一层指定场地F1006号店铺"]
        },
        "Beijing": {
            "name": "北京",
            "list": ["北京新光天地4F鞋区", "北京东方广场"],
            "address": ["北京市朝阳区建国路87号新光天地四层", "北京市东城区东长安街1号北京东方广场东方新天地商场1层AA16A&AA18"]
        },
        "Chengdu": {
            "name": "成都",
            "list": ["成都国际金融中心"],
            "address": ["成都市锦江区红星路三段1号一层L122店"]
        },
        "Qiongqing": {
            "name": "重庆",
            "list": ["重庆星光68广场"],
            "address": ["重庆市江北区洋河一路68号星光68广场一层L113 B-C店"]
        },
        "Hefei": {
            "name": "合肥",
            "list": ["合肥银泰中心"],
            "address": ["合肥市长江中路98号合肥银泰中心1楼112店"]
        },
        "Qingdao": {
            "name": "青岛",
            "list": ["青岛万象城商城", "青岛海信广场"],
            "address": ["青岛市市南区山东路6号甲华润中心万象城G-102和L-102号商铺", "青岛市市南区澳门路117号购物中心一层2127号商铺"]
        },
        "Shenyang": {
            "name": "沈阳",
            "list": ["沈阳卓展购物中心"],
            "address": ["沈阳市沈河区北京街7-1号沈阳卓展购物中心"]
        },
        "Shenzhen": {
            "name": "深圳",
            "list": ["深圳华润万象城"],
            "address": ["深圳市罗湖区宝安南路1881号深圳华润万象城L167店"]
        },
        "Shijiazhuang": {
            "name": "石家庄",
            "list": ["石家庄先天下"],
            "address": ["长安区中山东路326号先天下广场"]
        },
        "Tianjin": {
            "name": "天津",
            "list": ["天津乐天百货文化中心店", "天津海信精品店"],
            "address": ["天津市乐园路9号乐天百货文化中心店1-L-014店", "天津市和平区解放路188号海信广场二层"]
        },
        "Wuhan": {
            "name": "武汉",
            "list": ["武汉国际广场购物中心"],
            "address": ["武汉市江汉区解放大道690号武汉国际广场购物中心C座4号柜"]
        },
        "Xian": {
            "name": "西安",
            "list": ["西安世纪金花时代广场"],
            "address": ["西安市碑林区环城南路东段336号1层"]
        },
        "Nanjing": {
            "name": "南京",
            "list": ["南京德基广场"],
            "address": ["南京市玄武区中山路18号南京德基广场二楼L213店"]
        },
        "Dalian": {
            "name": "大连",
            "list": ["大连百年商场"],
            "address": ["大连市中山区解放路19号大连百年商城内第G层G30号店铺"]
        },
        "Xiaamen": {
            "name": "厦门",
            "list": ["厦门磐基名品中心"],
            "address": ["思明区嘉禾路197号磐基名品中心一层111-112A号商铺"]
        },
        "Nanning": {
            "name": "南宁",
            "list": ["南宁华润万象城"],
            "address": ["广西南宁市青秀区民族大道136号华润|万象城一楼173店铺"]
        },
        "Changsha": {
            "name": "长沙",
            "list": ["长沙开福万达百货"],
            "address": ["长沙市开福区中山路589号1F-21店"]
        },
        "Jinan": {
            "name": "济南",
            "list": ["济南恒隆广场"],
            "address": ["济南市泉城路188号一层102号店"]
        },
        "Ningbo": {
            "name": "宁波",
            "list": ["宁波和义"],
            "address": ["海曙区和义路66号一层B区1027号商铺"]
        },
        "Hangzohu": {
            "name": "杭州",
            "list": ["杭州大厦精品店"],
            "address": ["杭州市武林广场1号杭州大厦A座2楼前厅L206号店铺"]
        },
        "Taiyuan": {
            "name": "太原",
            "list": ["太原天美新天地"],
            "address": ["长风街113号太原天美新天地107店"]
        },
        "Harbin": {
            "name": "哈尔滨",
            "list": ["哈尔滨卓展"],
            "address": ["哈尔滨市道里区安隆街106号卓展购物中心一楼1109店"]
        },
        "Zhengzhou": {
            "name": "郑州",
            "list": ["郑州大卫城商场"],
            "address": ["郑州市二七路丹尼斯大卫城商场内第一层1021号店铺"]
        },
        "Guangzhou": {
            "name": "广州",
            "list": ["广州太古汇"],
            "address": ["广州市天河区天河路383号L218号及L219号店"]
        },
        "Yantai": {
            "name": "烟台",
            "list": ["烟台世界广场振华精品商厦"],
            "address": ["烟台市芝罘区西大街39号振华精品商厦1F-B06店"]
        },
        "Urumqi": {
            "name": "乌鲁木齐",
            "list": ["乌鲁木齐美美友好购物中心店"],
            "address": ["乌鲁木齐市沙依巴克区友好北路689号美美友好购物中心N-109店铺"]
        },
        "Lanzhou": {
            "name": "兰州",
            "list": ["兰州国芳百货"],
            "address": ["兰州市城关区广场南路4~6号东方红广场东侧国芳百货一 层111号店铺"]
        },
        "Changchun": {
            "name": "长春",
            "list": ["卓展购物中心长春店"],
            "address": ["长春市重庆路1255号卓展购物中心一层C-1118号"]
        },
        "Suzhou": {
            "name": "苏州",
            "list": ["苏州美罗商场"],
            "address": ["观前街245号美罗商城北一楼"]
        },
        "Hohhot": {
            "name": "呼和浩特",
            "list": ["维多利亚国际广场"],
            "address": ["内蒙古呼和浩特市新华东街8号1层L004店"]
        },
        "Yangzhou": {
            "name": "扬州",
            "list": ["扬州金鹰国际购物中心"],
            "address": ["扬州市汶河南路120号"]
        }
    };

var selectCityHtml = $.map(storelistData, function(v, k){
    return '<option value="'+k+'">'+v.name + " / " + k +'</option>'
}).join("");
$("select[name=city]").html('<option value="">城市 / CITY</option>' + selectCityHtml);


function storelistFun(nVal){
    var cityListHtml = "";
    $.map(storelistData, function(v, k){
        if(k == nVal){
            cityListHtml = $.map(v.list, function(a, b){
                    return '<li><em>'+ a +'</em><p>'+ v.address[b] +'</p></li>'
            }).join("");
            
        }
    })

    $("#storelistScroll").html(cityListHtml);
    pfun.overscroll(document.querySelector("#storelistScroll"));  // 活动规则滚动条
}

$("select[name=city]").change(function(){
    var selectVal = $(this).find("option:selected").val();
    storelistFun(selectVal);
})

// storelistFun("Shanghai");







</script>

</body>
</html>