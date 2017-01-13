<!DOCTYPE HTML>
<html>
<head>
    <title>COACH</title>
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

    <!-- games -->
    <div class="section show transition" id="games">
        <div class="gamesScenes">
            <img src="/dist/src/img/element.png" height="100%" style="opacity: 0">
        </div>
    </div>

    <div class="gamesInfo">
        <div class="integral">
            <img src="/dist/src/img/icon-chicken.png" height="100%">
            <span id="lny_count">0</span>
        </div>
        <div class="countdown">
            <img src="/dist/src/img/icon-clock.png" height="100%">
            <span><em>00 </em> : <em id="lny_second"> 16</em></span>
        </div>
    </div>

</div>


<script type="text/javascript" src="/dist/asset/js/public.min.js"></script>

<script type="text/javascript">

    var allimg = [
        "/dist/asset/img/p2.jpg",
    ], getScore, attention = "<?php echo $subscribe;?>";

    pfun.loadingFnDoing(allimg, function(){
        //$(".loading").css({"visibility": "hidden"});
        _lny.init();
        pfun.init();
    })


    function lnyFun(){
        var self = this;

        self.defaultSet = {
            ec: [1,6,12,2,8,4,5,10,6,3,7,9,8,1,5,4,6,2,11,9,7,3,7,9,11,8,5,8,10,1,13,10,2,10,6,7,5,11,11,2,8,4,3,9,10,7,2,6,5,11,8],
            ts: "",      // 元素默认旋转角度
            c: 0,        
            r: "",    
            s: 16        // 倒计时时间
        };

        /* 公共函数 即 默认执行 */
        self.init = function(){   // 初始化执行函数
            self.gamesHTML(".gamesScenes"); // 填充元素
            setTimeout(function(){
                self.countdown(); // 开始倒计时
            }, 300)
        };


        // 弹层
        self.lnyPrompt = function(node, status){
            if(status){
                $(".popup").removeClass("hidden");
                $("#" + node).removeClass("hidden").addClass("ycenter transition");
            }else{
                $(".popup").addClass("hidden");
                $(".popup .con").addClass("hidden").removeClass("ycenter transition");
            }
        }

        // 倒计时
        self.countdown = function(){
            if(self.defaultSet["s"] > 0){
                window.cancelAnimationFrame(self.defaultSet["r"]);
                self.defaultSet["c"] += 1;
                if(self.defaultSet["c"]%60 == 0){
                    self.defaultSet["s"]--;

                    $("#lny_second").html(self.defaultSet["s"] < 10 ? ("0" + self.defaultSet["s"]) : self.defaultSet["s"]);
                }
                self.defaultSet["r"] = requestAnimationFrame(self.countdown);
            }else{
                alert(6);
                // 倒计时结束
                if(getScore >= 5){
                    self.submitResult("1", function(){
                        self.delCookie("times");
                        setTimeout(function(){
                            if(attention){
                                location.href = "/third?type=yattention";
                            }else{
                                location.href = "/third?type=nattention";
                            }  
                        }, 200);  
                    });
                    
                }else{
                    pfun.setCookie("times", "0", "360");   
                    location.href = "/third?type=failure";
                }
                
            }
        }

        // 随机数组排序
        self.randomSort = function(){
            return Math.random()-0.5;
        }

        // transform: '+ self.defaultSet["ts"] +'; -webkit-transform: '+ self.defaultSet["ts"] +'; -moz-transform: '+ self.defaultSet["ts"] +';

        // 生成元素代码
        self.gamesHTML = function(n){

            var gamesCodeHTML =  $.map(animal, function(a, b){
                //console.log(a);
                //console.log(b);
                if(a.angle){
                    self.defaultSet["ts"] = a.angle
                }else{
                    self.defaultSet["ts"] = "0deg";
                }
                return '<div class="animal '+ a.size +'" data-num="'+ parseInt(b+1, 10) +'" data-type="'+ self.defaultSet["ec"][b] +'" style="left: '+a.pos[0]+'%; top: '+a.pos[1]+'%;"><img src="/dist/asset/img/0'+ (a.code < 10 ? ("0" + a.code) : a.code) +'.png" height="100%"></div>'
            })

            $(n).append(gamesCodeHTML);
        }

        self.submitResult = function(score, submitCallback){
            pfun.ajaxFun("POST", "/api/submit", {"status": score}, "json", submitCallback);
        }


    }


    var _lny = new lnyFun();

    


    // 元素点击事件
    $(".gamesScenes").delegate(".animal", "touchstart", function(e){
        var m = $(this);
        if(m.attr("data-type") == "10"){
            var lnyCount = parseInt($("#lny_count").html(), 10);
            lnyCount++;
            m.addClass("zoomOutDown animated").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
               m.removeClass("zoomOutDown animated");
               m.css({"visibility":"hidden"});
            });
            
            $("#lny_count").html(lnyCount);

            getScore = lnyCount;

            if(getScore >= 5){
                _lny.submitResult("1", function(){
                    self.delCookie("times");
                    setTimeout(function(){
                        if(attention){
                            location.href = "/third?type=yattention";
                        }else{
                            location.href = "/third?type=nattention";
                        }  
                    }, 200);
                    
                });
            }
        }else{
            m.addClass("pulse animated").addClass("active").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
               m.removeClass("pulse animated");
            });
        }
            
        // e.preventDefault();
        //return false;
    })











</script>


</body>
</html>