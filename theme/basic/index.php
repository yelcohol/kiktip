<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>

<div class="top_banner">
<?php echo display_banner('메인', 'mainbanner.skin.php'); ?>    
</div>


<style>
    .bx-viewport{border-radius:15px;}
    .bx-prev, .bx-next{visibility:hidden;}
</style>
<script>
                    var slide_bn = new Swiper('.slide_bn', {
                        slidesPerView: 1, // 영역내 보여질 배너 갯수
                        loop: true, // 반복옵션 true, false
                        autoplay: 5000, // 자동롤링 1000:1초
                        spaceBetween: 0, // 배너간격
                        
                        // 반응형 세팅
                        // 필요시 설정하시면 됩니다.
                        breakpoints: {
                            1024: { // 가로 1024px 이상
                                slidesPerView: 1, // 보여질 배너 갯수
                                spaceBetween: 0 // 배너간격
                            },
                            768: { // 가로 768px 이하
                                slidesPerView: 1, // 보여질 배너 갯수
                                spaceBetween: 0 // 배너간격
                            },
                            640: { // 가로 640px 이하
                                slidesPerView: 1, // 보여질 배너 갯수
                                spaceBetween: 0 // 배너간격
                            },
                            450: { // 가로 450px 이하
                                slidesPerView: 1, // 보여질 배너 갯수
                                spaceBetween: 0 // 배너간격
                            }
                        }
                    });
</script>

<h2 class="sound_only">공지사항</h2>
<div class="top_news">
<?php echo latest('theme/notice2','notice',5, 30);?>
</div>



<h2 class="sound_only">최신글</h2>


<div class="latest_top_wr">
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    // echo latest('theme/pic_list', 'free', 4, 23);		// 최소설치시 자동생성되는 자유게시판
	// echo latest('theme/pic_list', 'qa', 4, 23);			// 최소설치시 자동생성되는 질문답변게시판
	// echo latest('theme/pic_list', 'notice', 4, 23);		// 최소설치시 자동생성되는 공지사항게시판
    echo latest('theme/pic_grid','news',4,23,"wr_num");
    ?>
</div>

<div class="lt_wr">
    <!-- 핫딜게시판 { -->
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    // echo latest('theme/pic_block', 'gallery', 4, 23);		// 최소설치시 자동생성되는 갤러리게시판
    echo latest('theme/hotdeal','hotdeal',3,23,"wr_num");
    ?>
    <!-- } 핫딜게시판 끝 -->
</div>

<div class="lt_title">주요 게시판 인기글</div>
<div class="latest_wr">
<!-- 주요 게시판 인기글 시작 { -->
    <?php
    //  최신글
    $sql = " select bo_table
                from `{$g5['board_table']}` a left join `{$g5['group_table']}` b on (a.gr_id=b.gr_id)
                where a.bo_device <> 'mobile' ";
    if(!$is_admin)
	$sql .= " and a.bo_use_cert = '' ";
    $sql .= " and a.bo_table not in ('notice', 'gallery') ";     //공지사항과 갤러리 게시판은 제외
    $sql .= " order by b.gr_order, a.bo_order ";
    $result = sql_query($sql);
    for ($i=0; $row=sql_fetch_array($result); $i++) {
		$lt_style = '';
    	if ($i%2 !== 0 ) $lt_style = "margin-left:2%";
    ?>
    <div style="float:left;<?php echo $lt_style ?>" class="lt_wr">
        <?php
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
        echo latest('theme/basic3', $row['bo_table'], 6, 24, "wr_hit desc");
        ?>
    </div>
    <?php
    }
    ?>
    <!-- } 최신글 끝 -->
</div>
</div>
<?php
include_once(G5_THEME_PATH.'/tail.php');