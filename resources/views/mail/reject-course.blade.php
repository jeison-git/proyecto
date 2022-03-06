<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title>Curso Descartado</title>
    <!--[if mso]>
  <style>
    table {border-collapse:collapse;border-spacing:0;border:none;margin:0;}
    div, td {padding:0;}
    div {margin:0 !important;}
  </style>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: Arial, sans-serif;
        }

        @media screen and (max-width: 530px) {
            .unsub {
                display: block;
                padding: 8px;
                margin-top: 14px;
                border-radius: 6px;
                background-color: #555555;
                text-decoration: none !important;
                font-weight: bold;
            }

            .col-lge {
                max-width: 100% !important;
            }
        }

        @media screen and (min-width: 531px) {
            .col-sml {
                max-width: 27% !important;
            }

            .col-lge {
                max-width: 73% !important;
            }
        }

    </style>
</head>

<body style="margin:0;padding:0;word-spacing:normal;background-color:#939297;">
    <div role="article" aria-roledescription="email" lang="en"
        style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#939297;">
        <table role="presentation" style="width:100%;border:none;border-spacing:0;">
            <tr>
                <td align="center" style="padding:0;">
                    <!--[if mso]>
                    <table role="presentation" align="center" style="width:600px;">
                    <tr>
                    <td>
                    <![endif]-->
                    <table role="presentation"
                        style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                        <tr>
                            <td style="padding:40px 30px 30px 30px;text-align:center;font-size:24px;font-weight:bold;">
                                <a href="https://cyberunesr.com/" style="text-decoration:none;"><img
                                        src="{{ asset('img/logos/logologin.gif') }}" width="165" alt="Logo"
                                        style="width:165px;max-width:80%;height:auto;border:none;text-decoration:none;color:#ffffff;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px;background-color:#ffffff;">
                                <h1
                                    style="margin-top:0;margin-bottom:12px;text-align:center;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">
                                    ¡Gracias por ser parte de nuestra comunidad!</h1>
                                <br>
                                <h3
                                    style="margin-top:0;margin-bottom:8px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">
                                    Estimado {{ $course->teacher->name }} </h3>

                                <p style="margin:0;margin-bottom:8px;text-align:justify;">Queremos hacerle saber que su curso <a style="color:#e50d0d;text-decoration:underline;">{{ $course->title }}</a>, ha sido revisado minuciosamente y este no ha cumplido con los estandares de cálidad mínimos, acontinuacion le indicaremos los motivos por los cuales fue rechazado esta edición, estamos muy agradecidos con su participacion en esta iniciativa y sabemos que realizara las correciones pertinentes, para lugo poder publicar su valioso conocimiento.</p>
                                <p style="margin-top:0;margin-bottom:12px;text-align:justify;">{!! $course->observation->body !!}</p>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:0;font-size:24px;line-height:28px;font-weight:bold;">
                                <a {{-- href="http://www.example.com/" --}} style="text-decoration:none;"><img
                                        src="{{asset('img/logos/logosimon1.gif')}}" width="600" alt=""
                                        style="width:100%;height:auto;display:block;border:none;text-decoration:none;color:#363636;"></a>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:30px;background-color:#ffffff;">
                                <p style="margin:0;text-align:center;">Con mucho cariño el equipo de trabajo de CyberUNESR.</p>
                            </td>
                        </tr>

                        <tr>
                            <td
                                style="padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#cccccc;">
                               {{--  <p style="margin:0 0 8px 0;"><a
                                        href="https://www.facebook.com/Meganegocios-Vip-ca-1004343212943696/"
                                        style="text-decoration:none;"><img
                                            src="https://assets.codepen.io/210284/facebook_1.png" width="40" height="40"
                                            alt="f" style="display:inline-block;color:#cccccc;"></a> <a
                                        href="https://twitter.com/meganegociosvip" style="text-decoration:none;"><img
                                            src="https://assets.codepen.io/210284/twitter_1.png" width="40" height="40"
                                            alt="t" style="display:inline-block;color:#cccccc;"></a> <a
                                        href="https://www.instagram.com/explore/tags/meganegociosvip/"
                                        style="text-decoration:none;"><img
                                            src="https://www.mailjet.com/images/theme/v1/icons/ico-social/instagram.png"
                                            width="40" height="40" alt="f"
                                            style="display:inline-block;color:#cccccc;"></a></p> --}}
                                <p style="margin:0;font-size:14px;line-height:20px;"> Copyright &reg; 2022 CyberUNESR. All
                                    rights reserved<br><a class="unsub" href="https://cyberunesr.com/"
                                        style="color:#cccccc;text-decoration:underline;">Visitanos</a></p>
                            </td>
                        </tr>
                    </table>
                    <!--[if mso]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
