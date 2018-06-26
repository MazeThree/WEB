/**
 * Created by wupeng on 2017-04-09.
 */
$(window).load(function() {
    $("#loader").fadeOut("slow");
});
$(document).ready(function(){
        $('.theme-login').click(function(){

            $('.theme-popover-mask').fadeIn(100);

            $('.theme-popover').slideDown(200);

        })

        $('.theme-poptit .close').click(function(){

            $('.theme-popover-mask').fadeOut(100);

            $('.theme-popover').slideUp(200);

        })
});
$(function(){
    $("#btn").click(function(){
    alert("说了不能点你是不是傻!");})
});

$(function(){
    var main = $('#bigbox');
    var ITEM_WIDTH = 200;
    var ITEM_SPACE = 15;
    var itemArray = [];
    var itemHeight = [];

    //随机数
    function rand(min,max){
        return parseInt(Math.random()*(max-min+1)+min);
    }

    //创建图片
    function createItem(min,max){
        var max=25;
        for (var i = min ;i<max;i++) {
            main.append("<div><img src='images/示例图片/"+rand(1,7)+".jpg'/><p>"+"</p></div>");
            itemArray[i] = main.children();
        }
        layout();

    }
    createItem (0,39);

    //布局
    function layout(){
        var t = 0;
        var l = 0;
        var frist = true;
        var mainWidth = 0;
        var winWidth = $('body').innerWidth();
        //console.log(winWidth);

        main.children().map(function(i,item){
            if((l+ITEM_WIDTH) >= winWidth){
                frist = false;
                mainWidth = l;
                l=0;
            }
            if (frist) {
                main.children().eq(i).css({
                    'top':t + 'px',
                    'left':l + 'px'
                });
                itemHeight[i]=main.children().eq(i).height();

            }
            else{
                var min = getMin(itemHeight);
                for (var j = 0;j < itemHeight.length;j++) {
                    if(itemHeight[j] == min){
                        main.children().eq(i).css({
                            top:min + ITEM_SPACE,
                            left:j*(ITEM_WIDTH + ITEM_SPACE)
                        });
                        itemHeight[j] += (main.children().eq(i).height() + ITEM_SPACE);
                        break;
                    }
                }
            }
            l += ITEM_WIDTH+ITEM_SPACE;

            // oMain居中
            var w = mainWidth-ITEM_SPACE;
            main.css({
                'width':w+'px'
            });

        });

    }


    //求最小值
    function getMin (aArray) {
        var min = aArray[0];
        for (var i = 0;i < aArray.length;i++) {
            if (min > aArray[i]) {
                min = aArray[i];
            }
        }
        return min;
    }

    //屏幕大小变更
    $(window).resize(function(){
        itemHeight=[];
        layout();
    });


    // 滚动滚动条达到最长的一个hight时，加载出更多
    $(window).scroll(function(){
        var scrollHeight = $(window).scrollTop();
        var winHeight =  $(window).height();
        var max = Math.max.apply(null,itemHeight);
        var num = 0;
        if ((scrollHeight+winHeight)>= max-30) {
            num = itemArray.length;
            createItem(num,num+10);
        }
    });
});


//扫码弹窗功能
$(function(){
    $(".pay_item").click(function(){
        $(this).addClass('checked').siblings('.pay_item').removeClass('checked');
        var dataid=$(this).attr('data-id');
        $(".shang_payimg img").attr("src","https://static.runoob.com/images/dashang/"+dataid+"img.png");
        $("#shang_pay_txt").text(dataid=="alipay"?"支付宝":"微信");
    });
});
function dashangToggle(){
    $(".hide_box").fadeToggle();
    $(".shang_box").fadeToggle();
}