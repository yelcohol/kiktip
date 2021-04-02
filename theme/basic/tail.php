<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
add_stylesheet('<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">',1);

?>

    </div>
    <div id="aside">
        <?php echo outlogin('theme/basic'); // 외부 로그인, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
        <?php echo latest('theme/basic2','notice',3, 23,"wr_num");?>
        <!-- 최신댓글 추가해야 합니다. -->
        <?php echo poll('theme/basic'); // 설문조사, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
    </div>
</div>

</div>
<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<div id="ft">

    <div id="ft_wr">
        <div id="ft_link" class="ft_cnt">
            <h2>이용 안내</h2>
            <a href="<?php echo get_pretty_url('notice'); ?>">공지사항</a>
            <a href="<?php echo get_pretty_url('content', 'company'); ?>">킥팁소개</a>
            <a href="<?php echo get_pretty_url('content', 'with'); ?>">제휴안내</a>
            <a href="<?php echo get_pretty_url('content', 'privacy'); ?>">개인정보처리방침</a>
            <a href="<?php echo get_pretty_url('content', 'provision'); ?>">서비스이용약관</a>
            <a href="<?php echo get_device_change_url(); ?>">모바일버전</a>
        </div>
        <div id="ft_company" class="ft_cnt">
        	<h2>사이트 정보</h2>
	        <p class="ft_info">
            킥팁 KIKTIP<br>
            개인형 이동수단 커뮤니티<br>
            웹관리자 | 나르즈
			</p>
	    </div id="ft_latest">

        <div class="notice ft_cnt2">

        <?php
        //공지사항
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
        echo latest('theme/notice', 'notice', 2, 30,"wr_num");
        ?>
        </div>
		
        <div class="ft_cnt_last">
            <a href="<?php echo G5_URL ?>"><img src="<?php echo G5_IMG_URL ?>/logo_n.svg" alt="킥팁 - 전동킥보드, 전동휠 커뮤니티" class="f_logo" title=""></a>
                        
            <div class="sns_icons">

                <span class="s_icon">
                <a href="https://blog.naver.com/es2ninebot" target="_blank">
                <i class="fa fa-bold" aria-hidden="true"></i></a>
                </span>

                <span class="s_icon">
                <a href="https://www.youtube.com/channel/UCvw3ezEgWbaq8s-RSfjs5Zg" target="_blank">
                <!-- <i class="fa fa-youtube-play" aria-hidden="true"></i> -->
                <i class="fab fa-youtube"></i>
                    </a>
                </span>

                <span class="s_icon">
                <a href="https://instagram.com/kiktip_pet" target="_blank">
                <i class="fab fa-instagram"></i></a>
                </span>

            </div>
        </div>
	</div>      
        <!-- <div id="ft_catch"><img src="<?php echo G5_IMG_URL; ?>/ft_logo.png" alt="<?php echo G5_VERSION ?>"></div> -->
        <div id="ft_copy">Copyright &copy; <b>소유하신 도메인.</b> All rights reserved.</div>
    
    
    <button type="button" id="top_btn">
    	<i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span>
    </button>
    <script>
    $(function() {
        $("#top_btn").on("click", function() {
            $("html, body").animate({scrollTop:0}, '500');
            return false;
        });
    });
    </script>
</div>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");