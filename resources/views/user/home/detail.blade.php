
@extends('user.main')
@section('head')
    <link rel="stylesheet" href="/user/css/slick.css">
    <link rel="stylesheet" href="/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="/user/css/index.css">
    <link rel="stylesheet" href="/user/css/category.css">
    <link rel="stylesheet" href="/user/css/product_detail.css">
    <link rel="stylesheet" href="/user/stars/stars-rating.css">
    <script src="/user/js/jquery.min.js"></script>
    <script src="/user/js/bootstrap.min.js"></script>
    {{--    pagination--}}
    <script src="/user/js/jquery.min.js"></script>
    <script src="/user/js/bootstrap.min.js"></script>
    <script src="/paging/jquery.twbsPagination.js" type="text/javascript"></script>
@endsection
@section('content')
    <style>
        body {
            position: relative;
        }
        .m-stars{
            margin-left: 1.5rem ;
            line-height: 2.2rem;
        }
        .m-stars span{

            color: #c20340;
        }
        .m-stars .rating-xs {

            font-size: 1rem;
        }
        .number  span{
            color: #c20340;
        }
        .form-group span{
            color: #c20340;
        }

    </style>
    <section>
        <div class="container-cus">
            <div class="title">
                <ul>
                    <li><a href="./index.html">Trang chủ</a></li>/

                    <li><a>{{$product->productname}}</a></li>
                </ul>
            </div>
            <div class="product-detail">
                <div class="imgs-prod">
                    <div class="gallery_01">
                        @foreach($img as $e)
                            <a class="img-item" id="img_{{$e->id}}" data-image="/storage/product-detail/{{$e->img}}">
                                <img src="/storage/product-detail/{{$e->img}}" />
                            </a>
                        @endforeach
                        <a class="more-img" data-toggle="modal" data-target="#imgs-prod-detail">
                            <img src="/storage/{{$product->images}}">
                        </a>
                    </div>
                    <div class="show-img">
                        <img id="zoom_04" class="zoomMain" data-toggle="modal" data-target="#imgs-prod-detail"
                             src="/storage/{{$product->images}}" />
                    </div>
                </div>

            {{--resposive--}}
                <div class="hidden-info-min">
                    <div class="product-t">
                        <span>0</span>
                        <div class="wishlist">
                            <button type="button" class="wishlistBtn"></button>
                        </div>
                    </div>
                    <h4>{{$product->productname}}</h4>
                    <div class="star-prod">
                        <a href="#">
                            @if($star != null)
                                <div class="m-stars">
                                    <input id="input-1" name="input-1" class="rating rating-loading"
                                           data-min="0" data-max="5" data-step="0.1"
                                           value="{{$star->star}}" disabled>
                                </div>
                                <div class="star-num">({{$star->cmt}})</div>
                            @endif
                            @if($star == null)
                                <div class="m-stars">
                                    <input id="input-1" name="input-1" class="rating rating-loading"
                                           data-min="0" data-max="5" data-step="0.1"
                                           value="0" disabled>
                                </div>
                                <div class="star-num">(0)</div>
                            @endif
                        </a>
                    </div>
                </div>
                <div class="imgs-prod-resp">
                    <div class="imgs-prod-resp-item">
                        @foreach($img as $e)
                            <img id="img_{{$e->id}}" src="/storage/product-detail/{{$e->img}}"/>
                        @endforeach

                    </div>
                    <div class="dotClass"></div>
                </div>
            {{--resposive--}}
                <!-- modal -->
                <div class="modal fade" id="imgs-prod-detail" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="list-imgs-modal">

                                    @foreach($img as $e)

                                        <a class="img-item" id="img_{{$e->id}}" data-image="/storage/product-detail/{{$e->img}}">
                                            <img src="/storage/product-detail/{{$e->img}}" />
                                        </a>
                                    @endforeach

                                </div>
                                <div class="show-img-modal">
                                    <img id="zoom_05" onmousemove="myFunction()" onmouseout="clearZoom()"
                                         src="/storage/{{$product->images}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="info-prod-detail">
                    <div class="hidden-info">
                        <div class="product-t">

                            <span>0</span>
                            <div class="wishlist">
                                <button type="button" class="wishlistBtn"></button>
                            </div>
                        </div>
                        <h5>{{$product->productname}}
                            @if($product->discount > 0)
                                <span style="color: red; font-size: 1.2rem">(<span>-{{$product->discount}}</span>%)</span>
                            @endif
                        </h5>
                        <div class="star-prod">
                            <a href="#">
                                @if($star != null)
                                <div class="m-stars">
                                    <input id="input-1" name="input-1" class="rating rating-loading"
                                           data-min="0" data-max="5" data-step="0.1"
                                           value="{{$star->star}}" disabled>
                                </div>
                                <div class="star-num">({{$star->cmt}})</div>
                                @endif
                                    @if($star == null)
                                        <div class="m-stars">
                                            <input id="input-1" name="input-1" class="rating rating-loading"
                                                   data-min="0" data-max="5" data-step="0.1"
                                                   value="0" disabled>
                                        </div>
                                        <div class="star-num">(0)</div>
                                    @endif
                            </a>
                        </div>
                    </div>
                    <ul class="hidden-info">
                        {!! $product->content !!}
                    </ul>
                    <div class="price-prod-detail">
                        {!! \App\Helpers\HelperMenu::pricesale($product->pricesell,$product->discount) !!}

                    </div>
                    <div class="label-prod-detail">
                        <div class="label-prod-item">
                            <i class="fal fa-shipping-timed"></i><span>Thời gian giao hàng dự kiến 2~5 ngày</span>
                        </div>
                        <div class="label-prod-item">
                            <i class="fal fa-shipping-fast"></i><span>Vận chuyển miễn phí</span>
                        </div>
                        <div class="label-prod-item"><i class="fal fa-shield-check"></i><span>An tâm giao dịch và
                                tận hưởng ưu đãi độc
                                quyền</span>
                        </div>
                        {!! \App\Helpers\HelperMenu::bill($bill) !!}
                        {!! \App\Helpers\HelperMenu::repo($bill,$receipt) !!}
                    </div>
                    <div class="add-cart">
                        <a href="" class="btn btn-danger">Mua</a>
                    </div>
                    <ul class="hidden-info-min">
                        {!! $product->content !!}
                    </ul>
                    <div class="noti-detail">
                        <span>* </span>
                        <p>Đơn hàng có thể giao đến trễ hơn thời gian dự kiến do các yếu tố ngoại cảnh trong quá
                            trình vận chuyển</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-top">
            <div class="collapse-options">
                <div class="name-prod-options">
                    <p>
                        {{$product->productname}}
                        @if($product->discount > 0)
                            <span style="color: red; font-size: 1rem">(<span>-{{$product->discount}}</span>%)</span>
                        @endif
                    </p>
                    {!! \App\Helpers\HelperMenu::pricesale($product->pricesell,$product->discount) !!}
                </div>
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent2">
                    <i class="far fa-chevron-down"></i>
                </button>
            </div>
            <nav class="nav-options">
                <div class="collapse navbar-expand-md" id="navbarSupportedContent2">
                    <ul>
                        <li>
                            <a class="nav-link" href-link="#section1">Tổng quan</a>
                        </li>
                        <li>
                            <a class="nav-link" href-link="#section2">Thông số kỹ thuật</a>
                        </li>
                        <li>
                            <a class="nav-link" href-link="#section3">Nhận xét</a>
                        </li>
                        <li>
                            <a class="nav-link" href-link="#section4">Trợ giúp</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div id="section1">
            <div class="content-intro">
                <p>{!! $categoryParent->description !!}</p>
                <div style="padding: 2rem"></div>

            </div>
            <img src="/storage/{{$categoryParent->thumb}}" alt="" width="100%">

            <div class="content-intro">
                <span>Độ trung thực màu 100%</span>
                <p>{!! $categoryChild->description !!}</p>
            </div>
            <img src="/storage/{{$categoryChild->thumb}}" alt="" width="100%">
        </div>
        <div id="section2">
            <h1>Thông số kỹ thuật</h1>
            {!! $product->content !!}
        </div>
        <div id="section3" class="container-cus comment-cus">
            <div class="ratings-prod">
                <h2>Khách hàng đang nghĩ gì ?</h2>
                <div class="m-star">
                    @if($star != null)
                        <div class="number">
                            <input id="input-1" name="input-1"
                                   class="rating rating-loading" data-min="0"
                                   data-max="5" data-step="0.1" value="{{$star->star}}" disabled>
                        </div>
                        <div>
                            <strong>{{$star->star}}</strong>
                            <span>/5</span>
                            <p>Đánh giá  <span>({{$star->cmt}})</span></p>
                        </div>
                    @endif
                    @if($star == null)
                            <div class="number">
                                <input id="input-1" name="input-1" class="rating rating-loading"
                                       data-min="0" data-max="5" data-step="0.1" value="0" disabled>
                            </div>
                            <div>
                                <strong>0</strong>
                                <span>/5</span>
                                <p>Đánh giá  <span>(0)</span></p>
                            </div>
                    @endif

                    <div class="ratings-area">

                    </div>
                </div>
                <button class="btn btn-danger" id="btn-comment" data-toggle="collapse" data-target="#formComment">Nhận xét</button>
            </div>
            <div class="form-rate collapse" id="formComment">
                <p><span>*</span> Mục bắt buộc</p>
                <div class="form-rate-content">
                    <form action="product_detail.html" method="GET">
                        <div class="form-group">
                            <label for="">Đánh giá <span>*</span></label>
                            <input id="input-1" name="input-1" class="rating rating-loading"
                                   data-min="0" data-max="5" data-step="0.1" value="">
                        </div>
                        <div class="form-group">
                            <label for="title">Tiêu đề <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Tiêu đề ví dụ: Tính năng tuyệt vời!" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Nội dung <span>*</span></label>
                            <textarea name="content" id="content" rows="10" class="form-control" placeholder="Ví dụ: Tôi mua sản phẩm này một tháng trước và tôi cảm thấy rất hạnh phúc với quyết định này" required></textarea>
                        </div>
                        <h6>Hướng dẫn viết</h6>
                        <p>Hãy gửi chúng tôi nhận xét về sản phẩm. Vui lòng không đề cập tới đối thủ, giá sản phẩm và các sản phẩm khác, trang web, thư rác hoặc quảng cáo tại đây. Không bình luận thông tin cá nhân và các nhận xét mang tính chất tục tĩu. Nếu bạn cần thông tin về lắp đặt và dịch vụ khách hàng: liên hệ trực tiếp với chúng tôi qua tổng đài hotline.</p>
                        <div class="form-group ip-policy">
                            <input type="checkbox" id="policy" required>
                            <label for="policy">Tôi đồng ý với chính sách bảo vệ dữ liệu.<span>*</span></label><a href="#">Đọc chính sách <i class="far fa-chevron-right"></i></a>
                        </div>
                        <div class="form-group-btn">
                            <a class="btn btn-secondary" id="btn-comment2" data-toggle="collapse" data-target="#formComment">Hủy</a>
                            <button class="btn btn-danger" type="submit">Nhận xét</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="comments">
                <h3>Nhận xét</h3>
                <hr>
                {{--  phan trang--}}
                <div id="product_id" style="display: none">{{$product->id}}</div>

                <div id="count_pageing"style="display: none">{{$comments}}</div>
                {{--  phan trang--}}
                <div id="m-list-comment">

                </div>
                <div class = 'd-flex w-100 justify-content-center pagination'>
                    <nav aria-label="Page navigation">
                        <ul class="pagination" id="pagination"></ul>
                    </nav>
                </div>

            </div>
        </div>

        <div id="section4">
            <div class="help-1">
                <div class="container-cus">
                    <h2>Bạn có câu hỏi ?</h2>
                    <h2>Hãy để chúng tôi giúp đỡ</h2>
                    <div class="help-1-items">
                        <div class="help-1-item">
                            <a href="#">
                                <img src="/user/img/help/regist-product.svg" alt="">
                                <strong>Đăng ký sản phẩm</strong>
                                <p>Tìm kiếm những thông tin mới nhất, những thủ thuật hữu ích bằng cách đăng ký sản phẩm</p>
                                <span>Tìm hiểu thêm <i class="far fa-angle-right"></i></span>
                            </a>
                        </div>
                        <div class="help-1-item">
                            <a href="#">
                                <img src="/user/img/help/regist-product.svg" alt="">
                                <strong>Hướng Dẫn Sử Dụng</strong>
                                <p>Xem và tải xuống thông tin cho các sản phẩm LG</p>
                                <span>Tìm hiểu thêm <i class="far fa-angle-right"></i></span>
                            </a>
                        </div>
                        <div class="help-1-item">
                            <a href="#">
                                <img src="/user/img/help/regist-product.svg" alt="">
                                <strong>Software & Firmware</strong>
                                <p>Cập nhật các sản phẩm LG lên phiên bản phần mềm và hệ điều hành mới nhất</p>
                                <span>Tìm hiểu thêm <i class="far fa-angle-right"></i></span>
                            </a>
                        </div>
                        <div class="help-1-item">
                            <a href="#">
                                <img src="/user/img/help/regist-product.svg" alt="">
                                <strong>Kiểm Tra Tình Trạng</strong>
                                <p>Kiểm tra tình trạng email hoặc cuộc hẹn điện thoại</p>
                                <span>Tìm hiểu thêm <i class="far fa-angle-right"></i></span>
                            </a>
                        </div>
                        <div class="help-1-item">
                            <a href="#">
                                <img src="/user/img/help/regist-product.svg" alt="">
                                <strong>Yêu Cầu Sửa Chữa</strong>
                                <p>Sản phẩm LG của bạn cần được sửa chữa?</p>
                                <span>Tìm hiểu thêm <i class="far fa-angle-right"></i></span>
                            </a>
                        </div>
                        <div class="help-1-item">
                            <a href="#">
                                <img src="/user/img/help/regist-product.svg" alt="">
                                <strong>Theo Dõi <br>Quá Trình Sửa Chữa</strong>
                                <p>Kiểm tra tiến trình và tình trạng của sản phẩm đang được sửa chữa.</p>
                                <span>Tìm hiểu thêm <i class="far fa-angle-right"></i></span>
                            </a>
                        </div>
                        <div class="help-1-item">
                            <a href="#">
                                <img src="/user/img/help/regist-product.svg" alt="">
                                <strong>Tìm kiếm <br> Trung Tâm Bảo Hành</strong>
                                <p>Tìm một Trung Tâm Bảo Hành gần nhất</p>
                                <span>Tìm hiểu thêm <i class="far fa-angle-right"></i></span>
                            </a>
                        </div>
                        <div class="help-1-item">
                            <a href="#">
                                <img src="/user/img/help/regist-product.svg" alt="">
                                <strong>Chính Sách Bảo Hành</strong>
                                <p>Xem chính sách bảo hành cụ thể cho sản phẩm của bạn</p>
                                <span>Tìm hiểu thêm <i class="far fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="help-2 container-cus">
                <h2>Đơn giản chỉ cần chọn một tùy chọn hỗ trợ từ những icon bên dưới:</h2>
                <div class="help-2-items">
                    <div class="help-2-item">
                        <a href="#">
                            <img src="/user/img/help/email_desktop.svg" alt="">
                            <div>
                                <strong>Email</strong>
                                <p>Đại diện của LG sẽ liên hệ với bạn trong vòng 24 giờ của ngày làm việc tiếp theo. </p>
                                <span>Gửi tin nhắn tới trung tâm dịch vụ khách hàng LG</span>
                            </div>

                        </a>
                    </div>
                    <div class="help-2-item mid">
                        <a href="#">
                            <img src="/user/img/help/telephone_desktop.svg" alt="">
                            <div>
                                <strong>ĐIỆN THOẠI</strong>
                                <p>Điện thoại hỗ trợ khách hàng:<span>18001503</span> <br>
                                    Thứ 2-6: 8h-21h <br>
                                    Thứ 7, CN & Ngày lễ: 8h-17h30 <br>
                                    Điện thoại Hỗ trợ khách hàng nước ngoài: 0901351351 hoặc 0374000555 <br>
                                    (Nhánh 1: Tổng đài tiếng Hàn Quốc & Nhánh 2: Tổng đài tiếng Anh) <br>
                                    Thứ 2-6: 8h-17h15</p>
                            </div>

                        </a>
                    </div>
                    <div class="help-2-item">
                        <a href="#">
                            <img src="/user/img/help/live-chat_desktop.svg" alt="">
                            <div>
                                <strong>CHAT TRỰC TUYẾN</strong>
                                <p>Thời gian hỗ trợ trực tuyến: Từ 8h-17h tất cả các ngày trong tuần (Ngày lễ nghỉ). </p>
                                <span>Trò chuyện trực tuyến với nhân viên hỗ trợ</span>
                            </div>

                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>


@endsection

@section('footer')
    <script src="/user/js/slick.min.js"></script>
    <script src="/user/stars/starts-rating.js"></script>
    <script>
        $(document).ready(function () {
            $('.imgs-prod-resp-item').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: false,
                draggable: true,
                arrows: true,
                Swipe: true,
                prevArrow: '<a class="prev-slick btn-slick"><img src="./img/carousel-left-over.svg" alt=""></a>',
                nextArrow: '<a class="next-slick btn-slick"><img src="./img/carousel-right-over.svg" alt=""></a>',
                responsive: [{
                    breakpoint: 991,
                    settings: "slick"
                },
                    {
                        breakpoint: 767,
                        settings: {
                            arrows: false,
                            dots: true,
                            appendDots: '.dotClass'
                        }
                    }
                ]
            })
        })
    </script>
    <!-- search -->
    <script>
        $(document).ready(function () {
            $("#h-btn-search").click(function () {
                $("#h-search").show();
                $("body").addClass("scroll-hand");
            });
            $(".h-btn-close-search").click(function () {
                $("#h-search").hide();
                $("body").removeClass("scroll-hand");
            });
        })
    </script>
    <!-- scrollTop -->
    <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                var e = $(window).scrollTop();
                if (e > 1000) {
                    $('#myBtnTop').show();
                } else {
                    $('#myBtnTop').hide();
                }
                // $('nav.nav-options div').hide();
            });
            $('#myBtnTop').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                });
            });
        })
    </script>
    <!-- load image product -->
    <script>
        $(document).ready(function () {
            var id = '';
            $('.gallery_01 a.img-item').click(function () {
                loadImg(this, '.gallery_01 a.img-item', '#zoom_04', 'data-image');
                $(this).addClass('active-imgs');
                id = $(this).attr('id');
            });
            $('.list-imgs-modal a').click(function () {
                loadImg(this, '.list-imgs-modal a', '#zoom_05', 'data-image');
                $(this).addClass('active-imgs');
            });
            $('#zoom_04').click(function () {
                loadImg(this, '.list-imgs-modal a', '#zoom_05', 'src');
                if (id == '') {
                    $('.list-imgs-modal a#img_01').addClass('active-imgs');
                } else {
                    $('.list-imgs-modal a#' + id).addClass('active-imgs');
                }
            })
        });

        function loadImg(obj, focus, imgMain, attr) {
            var url = $(obj).attr(attr);
            $(imgMain).attr('src', url);
            $(focus).removeClass("active-imgs");
        }
    </script>
    <script>
        var flag = false;

        function myFunction() {
            flag = true;
            $('#imgs-prod-detail').scroll(function () {
                var scrolls = $('#imgs-prod-detail').scrollTop();
                if (flag) {
                    $('#zoom_05').css({
                        transform: 'scale(' + (100 + scrolls) / 100 + ')'
                    });
                }
            });
        };

        function clearZoom() {
            flag = false;
        };
    </script>
    <!-- nav-options -->
    <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                $('.nav-options div ul li a').removeClass("active");
                var scrolls=$(window).scrollTop();
                for (let index = 1; index <=4; index++) {
                    var url='#section'+index;
                    var scroll_sec=$(url).offset().top-100;
                    if(index!=4){
                        var i=index+1;
                        var urln='#section'+i;
                        var scroll_sec_n=$(urln).offset().top-100;
                        if(scroll_sec>scrolls && index==1){
                            $('.nav-options div ul li:eq(0) a').addClass("active");
                        }else if(scroll_sec<=scrolls && scrolls<scroll_sec_n){
                            $('.nav-options div ul li:eq('+(index-1)+') a').addClass("active");
                        }
                    }else{
                        if(scroll_sec<=scrolls){
                            $('.nav-options div ul li:eq('+(index-1)+') a').addClass("active");
                        }
                    }

                }
            })
            $('.nav-options a').click(function(){
                var href=$(this).attr("href-link");
                $('body,html').animate({
                    scrollTop:$(href).offset().top-60
                });
            })
            $('#btn-comment').click(function(){
                $(this).hide();
            });
            $('#btn-comment2').click(function(){
                $('#btn-comment').show();
                $('body,html').animate({
                    scrollTop:$('#section3').offset().top-60
                })
            });
            $('.rating-cus').click(function(){
                var rate=$(this).attr("rate-index");
                $('.rates-star-cus ul li').removeClass("on");
                $('.rates-star-cus strong').html(rate);
                $('.rates-star-cus ul li:eq('+(rate-1)+') input').attr("checked","true");
                for (let index = 0; index < rate; index++) {
                    $('.rates-star-cus ul li').eq(index).addClass("on");

                }
            })
        })
    </script>
    <script src="/user/js/product-detail-comment.js"></script>

@endsection

