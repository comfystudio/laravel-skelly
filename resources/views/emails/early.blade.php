@include('partials.email-header')
    <tr>
        <td>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="white" style="border-collapse: collapse;">
                <tr>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0" width="400" bgcolor="white" align="center">
                            <tr>
                                <td><h1 style = "color:#6a1b9a; font-family: Calibri,Arial,sans-serif; text-align: center;">Thank You for joining!</h1></td>
                            </tr>

                            <tr>
                                <td style="padding: 10px;">
                                    <p style = "color:black; font-family: Calibri,Arial,sans-serif;  font-size:20px">
                                        Welcome to {{SITE_NAME}}!
                                    </p>

                                    <p>
                                        So, what's inside Ketogram? Every month you'll discover:
                                    </p>

                                    <ul>
                                        <li>6-8 carefully curated Keto/Low Carb Friendly Snacks</li>
                                        <li>Treats with no more than 5g net carbs per serving</li>
                                        <li>Can't wait a month? Buy directly from our store</li>
                                    </ul>

                                    <p>
                                        By signing up you will receive all our great offers and our monthly newsletter.
                                    </p>

                                    <p>
                                        We are currently busy securing the best products for your
                                        Ketogram box! Too keep up to date with our news and some
                                        sneak peeks - follow us on <a href="{{FACEBOOK}}">Facebook</a>, <a href="{{INSTAGRAM}}">Instagram</a>, <a href = "{{TWITTER}}">Twitter</a> and <a href = "{{PINTEREST}}">Pinterest</a>
                                    </p>

                                    <p>
                                        <i><a href="{{env('APP_URL')}}/queries/unsub">Unsubscribe</a></i>
                                    </p>

                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
             </table>
        </td>
    </tr>
@include('partials.email-footer')