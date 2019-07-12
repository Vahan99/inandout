{{--</div>--}}
@php
    $settings = \App\Setting::first();
@endphp
<div class="bot2_wrapper">
    <div class="container">
        <div class="left_side">
            <i class="fa fa-envelope footer_env"><span class="foot_mail">{{ $settings->mail }}</span></i><span>|</span><i class="fa fa-phone footer_phone"><span class="foot_phone">{{ $settings->phone }}</span></i>
            {{--Copyright © {{ date('Y') }} <strong>Land of Noah</strong>--}}
        </div>
        <div class="right_side footer_right">Visit us on Social Networks
            <a href="{{ $settings->tripadvisor }}" class="tripadvisor" style="background-image: url({{ ('../../uploads/tripadvisor_w.png') }})" target="_blank">
                {{--<img src="../uploads/tripadvisor_w.png" />--}}
            </a>
            <a href="{{ $settings->facebook }}" class="facebook" style="background-image: url({{ ('../../uploads/face_w.png') }})" target="_blank">
                {{--<img src="../uploads/face_w.png" />--}}
            </a>
            <a href="{{ $settings->vk }}" class="vk" style="background-image: url({{ ('../../uploads/vk_w.png') }})"  target="_blank">
                {{--<img src="../uploads/vk_w.png" />--}}
            </a>
            <a href="{{ $settings->instagram }}" class="instagram" style="background-image: url({{ ('../../uploads/insta_w.png') }})" target="_blank">
                {{--<img src="../uploads/insta_w.png" />--}}
            </a>
        </div>
        <div class="footer_space"></div>
        <div class="foot_divider"></div>
        <div class="foot_copyright{{-- text-center--}}">
            {{--<img src='../assets/images/copy.png' />--}}
            <div class="foot_main_content">
                <span class="foot_copy">© All Rights Reserved - {{ date('Y') }}</span>
                <span class="foot_owner" style="float:right"><a href="https://mgplab.com/" >Powered By<span class="owner_comp">Megapolis [ Lab ]</span></a></span>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
<div id="fb-root"></div>
<script>
    $(document).on('scroll',function () {
        if($(document).scrollTop() > 200) {
            $('.top2_wrapper').addClass('fixed-nav');
        } else if($(document).scrollTop() < 60) {
            $('.top2_wrapper').removeClass('fixed-nav');
        }
    });
    window.fbAsyncInit = function () {
        FB.init({
            appId: 222071861697884,
            xfbml: true,
            version: 'v2.4'
        });
    };
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.12&appId=222071861697884&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    (function($){

        /**
         * jQuery function to prevent default anchor event and take the href * and the title to make a share popup
         *
         * @param  {[object]} e           [Mouse event]
         * @param  {[integer]} intWidth   [Popup width defalut 500]
         * @param  {[integer]} intHeight  [Popup height defalut 400]
         * @param  {[boolean]} blnResize  [Is popup resizeabel default true]
         */
        $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {

            // Prevent default anchor event
            e.preventDefault();

            // Set values for window
            intWidth = intWidth || '500';
            intHeight = intHeight || '400';
            strResize = (blnResize ? 'yes' : 'no');

            // Set title and open popup with focus on it
            var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
                strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,
                objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
        };

        /* ================================================== */

        $(document).ready(function ($) {
            $('.customer.share').on("click", function(e) {
                $(this).customerPopup(e);
            });

//            $(document).on('change', 'form select', function () {
//                $(this).parents('form').submit();
//            })
        });

    }(jQuery));
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116288458-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-116288458-1');
</script>

{{--Range slider--}}
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.min.js"></script>
<script src="{{ asset('js/rangeslider.js') }}" ></script>
<script src="{{asset('js/range.js')}}"></script>
@stack('post-scripts')
</body>
</html>