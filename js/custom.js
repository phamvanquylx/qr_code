jQuery(document).ready(function($) {

    
    const _DOMAIN = 'http://localhost/qr/qr_js/';
    // const _DOMAIN = 'http://iwantoutsource.com/qr_user/';

    // Create session js
    // sessionStorage.setItem('loading_page', true);
    // if(sessionStorage.loading_page != true)
    // {
    // 	if($('.spinner-wrappers').length)
    // 	{
    //         setTimeout(function(){ $('.spinner-wrappers').addClass('off'); }, 3000);
    // 	}
    // }

    function qr_code($content)
    {
        $encoding   = $('.qr-encoding[name="encoding"]:checked').val();
        $size       = $('.qr-size[name="size"]:checked').val();
        $correction = $('.qr-correction option:checked').val();
        $path_qr    = "http://chart.googleapis.com/chart?cht=qr&chs="+ $size +"&chl="+ $content +"&choe="+ $encoding +"&chld="+ $correction +"";
        
        setTimeout(function(){
            $(".wrapper-qr__img img").attr("src", $path_qr);
            $('.wrapper-qr__img img').removeAttr('disabled');
            $('.wrapper-qr__img .qr-btn a').removeAttr('disabled');
            $('.wrapper-qr__img .qr-chose').removeAttr('disabled');
            $('.wrapper-qr__img .qr-btn a').attr('download', '');
        }, 2000);
    }

    function qr_loading()
    {
        if($('.spinner-wrapper').length)
        {
            setTimeout(function(){ $('.spinner-wrapper').removeClass('off'); }, 0);
            setTimeout(function(){ $('.spinner-wrapper').addClass('off'); }, 2000);
        }
    }

    // Qr Code Url 
    if($('.qr-submit-form--url').length)
    {
        $('.qr-submit-form--url').on('click', function(){

            qr_loading();
            $content = $('.qr-content').val();
            qr_code($content);

            $.ajax({
                url: _DOMAIN + 'upload_qr.php',
                type: 'POST',
                data : {
                    path_url : $path_qr
                },
                success : function($data)
                {
                    $('.wrapper-qr__img .qr-btn a').attr("href", $data);
                },
                error : function()
                {
                    alert('Error');
                }
            });             

        });
    }

    // Qr Code Vcard
    if($('.qr-submit-form--vcard').length)
    {
        var vcard = {
            str_vcard:'BEGIN:VCARD\nVERSION:3.0\n',
            str_end:'\nEND:VCARD',
            goog_chart:'https://chart.googleapis.com/chart?cht=qr&chs=320x320&chl=',
            build_name: function(){
                var your_name = $('.qr-vcard-form input[name="your_name"]').val();
                
                vcard.str_vcard += 'N:'+your_name+'\n';
            },
            build_address: function(){

                // VCARD code URL
                $phone_number   = $('.qr-vcard-form input[name="phone_number"]').val();
                $email          = $('.qr-vcard-form input[name="email"]').val();
                $company        = $('.qr-vcard-form input[name="company"]').val();
                $street         = $('.qr-vcard-form input[name="street"]').val();
                $city           = $('.qr-vcard-form input[name="city"]').val();
                $state          = $('.qr-vcard-form input[name="state"]').val();
                $country        = $('.qr-vcard-form input[name="country"]').val();
                $website        = $('.qr-vcard-form input[name="website"]').val();
                
                vcard.str_vcard += 'ORG:'+ $company +'\n';
                //vcard.str_vcard += 'TEL;TYPE=work,voice:'+ $phone_number +'\n';
                vcard.str_vcard += 'TEL;TYPE=home:'+ $phone_number +'\n';
                vcard.str_vcard += 'URL;TYPE=work:'+ $website +'\n';
                vcard.str_vcard += 'EMAIL;TYPE=internet,pref:'+ $email +'\n';
                vcard.str_vcard += 'ADR;WORK:;;'+ $street + ';' + $city + ';;' + $state + ';'+ $country +'\n';

              },      
            save: function(){

                vcard.build_name();
                vcard.build_address();
                vcard.str_vcard += vcard.str_end;

                $('.wrapper-qr__img img').attr('src',vcard.goog_chart+vcard.str_vcard.replace(/\n/g,'%0A') + '&choe=UTF-8&chld=L');
                $('.wrapper-qr__img img').removeAttr('disabled');
                $('.wrapper-qr__img .qr-btn a').removeAttr('disabled');
                $('.wrapper-qr__img .qr-btn a').attr('download', '');

                return vcard.str_vcard;
            }
        }

        $('.qr-submit-form--vcard').on('click', function(){

            $your_name = $('.qr-vcard-form input[name="your_name"]').val();
            $phone_number   = $('.qr-vcard-form input[name="phone_number"]').val();

            if($phone_number != '' && $your_name != '')
            {

                qr_loading();
                $(this).attr('type', 'button');
                $path_qr = vcard.save();
                $.ajax({
                    url: _DOMAIN + 'upload_qr.php',
                    type: 'POST',
                    data : {
                        path_vcard : $path_qr
                    },
                    success : function($data)
                    {
                        $('.wrapper-qr__img .qr-btn a').attr("href", $data);
                    },
                    error : function()
                    {
                        alert('Error');
                    }
                });                       
            }
            else if($phone_number == '')
            {
                $(this).attr('type', 'submit');
            }
            else if($your_name == '')
            {
                $(this).attr('type', 'submit');
            }

        }); 
	}

    // Qr Code Text 
    if($('.qr-submit-form--text').length)
    {
        $('.qr-submit-form--text').on('click', function(){

            qr_loading();
            $content = $('.qr-content').val();
            qr_code($content);

            $.ajax({
                url: _DOMAIN + 'upload_qr.php',
                type: 'POST',
                data : {
                    path_text : $path_qr
                },
                success : function($data)
                {
                    $('.wrapper-qr__img .qr-btn a').attr("href", $data);
                },
                error : function()
                {
                    alert('Error');
                }
            });             

        });
    }

    // Qr Code Email 
    if($('.qr-submit-form--email').length)
    {
        $('.qr-submit-form--email').on('click', function(){

            qr_loading();
            $email   = $('.qr-input--email input').val();
            $subject = $('.qr-input--subject input').val();
            $message = $('.qr-input--message textarea').val();
            $content = "MATMSG:TO:" + $email + ";SUB:" + $subject + ";BODY:" + $message + ";;";
            qr_code($content);

            $.ajax({
                url: _DOMAIN + 'upload_qr.php',
                type: 'POST',
                data : {
                    path_email : $path_qr
                },
                success : function($data)
                {
                    $('.wrapper-qr__img .qr-btn a').attr("href", $data);
                },
                error : function()
                {
                    alert('Error');
                }
            });             

        });
    }

    // Qr Code SMS 
    if($('.qr-submit-form--sms').length)
    {
        $('.qr-submit-form--sms').on('click', function(){

            qr_loading();
            $number   = $('.qr-input-sms--number input').val();
            $message = $('.qr-input-sms--message textarea').val();
            $content = "SMSTO:" + $number + ":" + $message ;
            qr_code($content);

            $.ajax({
                url: _DOMAIN + 'upload_qr.php',
                type: 'POST',
                data : {
                    path_sms : $path_qr
                },
                success : function($data)
                {
                    $('.wrapper-qr__img .qr-btn a').attr("href", $data);
                },
                error : function()
                {
                    alert('Error');
                }
            });
        });
    }

    // Qr Code Facebook 
    if($('.qr-submit-form--facebook').length)
    {
        $('.qr-submit-form--facebook').on('click', function(){

            qr_loading();
            $content   = $('.qr-input--content input').val();
            qr_code($content);

            $.ajax({
                url: _DOMAIN + 'upload_qr.php',
                type: 'POST',
                data : {
                    path_facebook : $path_qr
                },
                success : function($data)
                {
                    $('.wrapper-qr__img .qr-btn a').attr("href", $data);
                },
                error : function()
                {
                    alert('Error');
                }
            });
        });
    }    

    if($('.qr-chose .qr-chose__toggle').length)
    {
        $('.qr-chose .qr-chose__toggle.open').click(function(){
            $data_img = $(this).attr('data-img');
            $qr_btn   = $('.wrapper-qr__img .qr-btn a').attr('href');
            if($qr_btn != '#')
            {
                $('.qr-chose .qr-chose__toggle.open').removeClass('active');
                $(this).addClass('active');
                if($data_img == 'png')
                {
                    $data = $qr_btn.replace(".jpg", ".png");
                    $('.wrapper-qr__img .qr-btn a').attr("href", $data);
                }
                else if($data_img == 'jpg')
                {
                    $data = $qr_btn.replace(".png", ".jpg");
                    $('.wrapper-qr__img .qr-btn a').attr("href", $data);
                }
            }
        });
    }

});