@include('partials.email-header')
    <tr>
        <td>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="white" style="border-collapse: collapse;">
                <tr>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0" width="400" bgcolor="white" align="center">
                            <tr>
                                <td><h1 style = "color:#6a1b9a; font-family: Calibri,Arial,sans-serif; text-align: center;">
                                        Hello!
                                    </h1>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding: 10px;">
                                    <p style = "color:black; font-family: Calibri,Arial,sans-serif;">
                                        Hi us!, Someone called {{$name}}, Email: {{$email}} Has joined mail list at {{env('APP_URL')}}
                                    </p>

                                    <p>
                                        {{$emailMessage}}
                                    </p>

                                    <table border="0" cellpadding="0" cellspacing="0" width="200" bgcolor="#6a1b9a" align="center">
                                        <tr>
                                            <td style = "color:white; font-weight: bold; text-align: center; padding: 10px; border-radius: 5px;"><a href="{{env('APP_URL')}}/admin" style="color:white; text-decoration: none;">Link To Site!</a></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
             </table>
        </td>
    </tr>
@include('partials.email-footer')