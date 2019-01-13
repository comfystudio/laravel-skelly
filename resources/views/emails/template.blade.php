@include('partials.email-header')
    <tr>
        <td>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="white" style="border-collapse: collapse;">
                <tr>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0" width="400" bgcolor="white" align="center"  style="max-width:400px;">
                            <tr>
                                <td><h1 style = "color:#6a1b9a; font-family: Calibri,Arial,sans-serif; text-align: center;">{{$title}}</h1></td>
                            </tr>

                            <tr>
                                <td style="padding: 10px;">
                                    {!! $text !!}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <table border="0" cellpadding="0" cellspacing="0" width="200" bgcolor="#6a1b9a" align="center">
                                        <tr>
                                            <td style = "color:white; font-weight: bold; text-align: center; padding: 10px; border-radius: 5px;"><a href="{{env('APP_URL')}}/subscriptions" style="color:white; text-decoration: none;">Subscribe Now</a></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p style = "color:black; font-family: Calibri,Arial,sans-serif; font-style: italic; margin-top: 10px;">To unsubscribe from future newsletters. Please visit the following page. <a href="{{env('APP_URL')}}/cancel-newsletter">Unsubscribe</a></p>
                                </td>
                            </tr>

                        </table>
                    </td>

                </tr>
             </table>
        </td>
    </tr>
@include('partials.email-footer')