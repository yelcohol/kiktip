<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<!-- 주요 게시판 인기글 -->
<div class="lat">
    <h2 class="lat_title"><a href="<?php echo get_pretty_url($bo_table); ?>"><?php echo $bo_subject ?></a></h2>
    <ul>
    <?php for ($i=0; $i<$list_count; $i++) {  ?>
        <li class="basic_li">
            <div class="basic_tit">
            <?php
            echo "<a href=\"".get_pretty_url($bo_table, $list[$i]['wr_id'])."\"> ";

            if ($list[$i]['ca_name']) {?>
                <span class="lt_category"><?php echo $list[$i]['ca_name'] ?></span>
            <?php }

            if ($list[$i]['icon_secret'])
                continue;
            if ($list[$i]['is_notice'])
                echo '<strong>'.$list[$i]['subject'].'</strong>';
            else
                echo $list[$i]['subject'];
            echo "</a>";
                
            ?>

            <!-- 댓글이 있다면 -->
            <?php
                    if ($list[$i]['comment_cnt']){?>
            <span class="lt_cmt">
                <span class="sound_only">댓글</span>
                <span class="cnt_cmt"><?=$list[$i]['comment_cnt']?></span>
            </span>
            <?php } ?>
            
            </div>

            <span class="lt_info">
				<span class="lt_hit"><span class="sound_only">조회</span><i class="far fa-eye"></i> <?=number_format($list[$i]['wr_hit']) ?></span>
            </span>
            
        </li>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
    <a href="<?php echo get_pretty_url($bo_table); ?>" class="lt_more"><span class="sound_only"><?php echo $bo_subject ?></span>더보기</a>

</div>
