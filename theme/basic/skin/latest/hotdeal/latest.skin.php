<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<!-- 핫딜게시판, 악세사리 추천 -->

    <h2 class="lt_title"><a href="<?php echo get_pretty_url($bo_table); ?>"><?php echo $bo_subject ?></a></h2>
    <div class="lt_v owl-carousel-wrap">
    <div class="latest-sel">

    <ul class="item">
    <?php for ($i=0; $i<$list_count; $i++) {  ?>
        
                <?php
                if ($list[$i]['icon_secret']) continue;
                else if ($list[$i]['is_notice']) continue;
                
                else{?>
                    
                    <li>
                        <div class="list_img_v">
                            <!-- 썸네일 -->
                            <?php $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'],185,185,false,true,'center', false,'80/0.5/3'); ?>
                            <a href="<?=get_pretty_url($bo_table, $list[$i]['wr_id'])?>" class="lt_thumb"><img src="<?=$thumb['src']?>" alt title></a>
                        </div>

                        <div class="list_le_v">
                            <!-- 제목 출력 -->
                            <a href="<?=get_pretty_url($bo_table, $list[$i]['wr_id'])?>" class="lt_tit"><?=$list[$i]['subject']?></a>

                            <!-- 가격 출력 -->
                            <div>
                                <div class="lt_sub_price">
                                <b><?=number_format($list[$i]['wr_1'])?></b>원</br>
                                </div>
                                <span class="lt_sub_price2">
                                <?php 
                                    if ($list[$i]['wr_2']==0) echo "무료배송";
                                    else echo $list[$i]['wr_2'];
                                ?>
                                </span>
                            </div>

                            <!-- 닉네임, 날짜, 조회수 -->
                            <div class="lt_info">
                                <span class="sv_wrap"><?php echo $list[$i]['name'] ?></span>
                                <span class="lt_date"><?php echo date("y-m-d", strtotime($list[$i]['wr_datetime'])) ?></span>
                                <span class="lt_hit"><span class="sound_only">조회</span><i class="far fa-eye"></i> <?=number_format($list[$i]['wr_hit']) ?></span>              
                            </div>
                        </div>
                    </li>

                <?php } ?>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>
    </ul>

    </div>
    </div>

