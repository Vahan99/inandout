<html>
   <head>
      <style>
         .banner-color {
         background-color: #eb681f;
         }
         .blue-color {
         color: #0066cc;
         }
         .button-color {
         background-color: #dc8115;
         }
         @media screen and (min-width: 500px) {
         .banner-color {
         background-color: #dc8115;
         }
         .orange-color {
         color: #eb681f;
         }
         .button-color {
         background-color: #eb681f;
         }
         }
         .content-info h2, h3, p{
            text-align: center;
         }
      </style>
   </head>
   <body>
      <div style="background-color:#ececec;padding:0;margin:0 auto;font-weight:200;width:100%!important">
         <table align="center" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
            <tbody>
               <tr>
                  <td align="center">
                     <center style="width:100%">
                        <table bgcolor="#FFFFF" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:512px;font-weight:200;width:inherit;font-family:Helvetica,Arial,sans-serif" width="512">
                           <tbody>
                              <tr>
                                 <td align="left">
                                    <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                       <img src="http://inandout.am/assets/img/In&Out-logo.png" alt="" class="text-center" style="display: block; margin: auto;">
                                       <tbody>
                                          <tr>
                                             <td width="100%">
                                                <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                   <tbody>
                                                      <tr>
                                                         <td align="center" bgcolor="#8BC34A" style="padding:20px 48px;color:#ffffff" class="banner-color">
                                                            <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                               <tbody>
                                                                  <tr>
                                                                     <td align="center" width="100%">
                                                                        <h1 style="padding:0;margin:0;color:#ffffff;font-weight:500;font-size:12px;line-height:24px">@lang('message.dear') {{$data['lastname']}} {{$data['name']}} @lang('message.your-order-accepted')</h1>
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td align="center" style="padding:20px 0 10px 0">
                                                            <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                               <tbody>
                                                                  <tr>
                                                                     <td align="center" width="100%" style="padding: 0 15px;text-align: justify;color: rgb(76, 76, 76);font-size: 12px;line-height: 18px;" class="content-info">
                                                                        <h3>@lang('message.your-order')</h3>
                                                                        <p style="margin: 10px 0 15px 0;font-size: 15px;"><span class="orange-color">@lang('message.tour-name')</span> {{$data['tourname']}}</p>
                                                                        <p style="margin: 10px 0 15px 0;font-size: 15px;"><span class="orange-color">@lang('message.special-tour-table-number-of-individuals-in-the')</span> {{$data['personnumber']}}</p>
                                                                        @if(isset($data['starting_time']))
                                                                        <p style="margin: 10px 0 15px 0;font-size: 15px;"><span class="orange-color">@lang('message.starting-time')</span> {{$data['starting_time']}}</p>
                                                                        @endif
                                                                        <p style="margin: 10px 0 15px 0;font-size: 15px;"><span style="color: #eb681f;">{{ $data['type'] == 'price' ? 'Գինը մեկ անձի համար' : 'Գինը մեկ անձի համար գիդով' }}</span> {{ $data['price'] }} AMD</p>
                                                                        <p style="margin: 10px 0 15px 0;font-size: 15px;"><span class="orange-color">@lang('message.starting-place')</span> {{ $data['starting_place'] }}</p>
                                                                        <p style="margin: 10px 0 15px 0;font-size: 15px;"><span class="orange-color">@lang('message.other-notes')</span> {{ $data['other_notes'] }}</p>


                                                                        <h3>@lang('message.your-contact')</h3>
                                                                        <p style="margin: 10px 0 15px 0;font-size: 15px;"><span class="orange-color">@lang('message.phone')</span> {{$data['phone']}}</p>
{{--                                                                        <p style="margin: 10px 0 15px 0;font-size: 15px;"><span class="orange-color">@lang('message.address')</span> {{$data['address']}}</p>--}}
                                                                        <p style="margin: 10px 0 15px 0;font-size: 15px;"><span class="orange-color">@lang('message.city')</span> {{$data['city']}}</p>
                                                                        <p style="margin: 10px 0 15px 0;font-size: 15px;"><span class="orange-color">@lang('message.email')</span> {{$data['email']}}</p>
                                                                        
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                      </tr>
                                                      <tr>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                              <tr>
                                 <td align="left">
                                    <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="padding:0 24px;color:#999999;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                       <tbody>
                                          <tr>
                                             <td align="center" width="100%">
                                                <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                   <tbody>
                                                      <tr>
                                                         <td align="center" valign="middle" width="100%" style="border-top:1px solid #d9d9d9;padding:12px 0px 20px 0px;text-align:center;color:#4c4c4c;font-weight:200;font-size:12px;line-height:18px">@lang('message.respectfully') Inandout
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td align="center" width="100%">
                                                <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                   <tbody>
                                                      <tr>
                                                         <td align="center" style="padding:0 0 8px 0" width="100%"></td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </center>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </body>
</html>