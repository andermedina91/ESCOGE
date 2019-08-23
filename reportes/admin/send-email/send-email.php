<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function enviar_correo ($email, $token)
{
    $mail = new PHPMailer(true);

    $template = '
        <html>
            <head>
            <title></title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <style type="text/css">
                /* FONTS */
                @media screen
                {
                    @font-face {
                      font-family: "Lato";
                      font-style: normal;
                      font-weight: 400;
                      src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
                    }
                    
                    @font-face {
                      font-family: "Lato";
                      font-style: normal;
                      font-weight: 700;
                      src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
                    }
                    
                    @font-face {
                      font-family: "Lato";
                      font-style: italic;
                      font-weight: 400;
                      src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
                    }
                    
                    @font-face {
                      font-family: "Lato";
                      font-style: italic;
                      font-weight: 700;
                      src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
                    }
                }
                
                /* CLIENT-SPECIFIC STYLES */
                body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
                table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
                img { -ms-interpolation-mode: bicubic; }

                /* RESET STYLES */
                img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
                table { border-collapse: collapse !important; }
                body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

                /* iOS BLUE LINKS */
                a[x-apple-data-detectors] {
                    color: inherit !important;
                    text-decoration: none !important;
                    font-size: inherit !important;
                    font-family: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                }

                /* ANDROID CENTER FIX */
                div[style*="margin: 16px 0;"] { margin: 0 !important; }
            </style>
            </head>
            <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

            <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Lato", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
                Looks like you tried signing in a few too many times. Lets see if we can get you back into your account.
            </div>

            <table border="0" cellpadding="0" cellspacing="0" width="100%">

                <tr>
                    <td bgcolor="#7c72dc" align="center">
                        <table border="0" cellpadding="0" cellspacing="0" width="480" >
                            <tr>
                                <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
                                    <a href="http://litmus.com" target="_blank">
                                        <img alt="Logo" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/665940/helloglogo.png" width="100" height="100" style="display: block;  font-family: "Lato", Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;" border="0">
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td bgcolor="#7c72dc" align="center" style="padding: 0px 10px 0px 10px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="480" >
                            <tr>
                                <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                                  <h1 style="font-size: 32px; font-weight: 400; margin: 0; text-align: center;">&#191;Problemas al iniciar sesi&#243;n?</h1>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="480" >

                          <tr>
                            <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                              <p style="margin: 0; text-align: center;">Para cambiar tu contrase&#241;a, solo debes presionar el bot&#243;n debajo y seguir las instrucciones.</p>
                            </td>
                          </tr>

                          <tr>
                            <td bgcolor="#ffffff" align="left">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                          <td align="center" style="border-radius: 3px;" bgcolor="#7c72dc"><a href="http://localhost/ESCOGE/recover_pass.php?token='.$token.'" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #7c72dc; display: inline-block;">Cambiar Contrase&#241;a</a></td>
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

                <tr>
                    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="480" >

                            <tr>
                              <td bgcolor="#111111" align="left" style="padding: 40px 30px 20px 30px; color: #ffffff; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                                <h2 style="font-size: 24px; font-weight: 400; margin: 0; color: #fff; text-align: center;">&#191;Problemas al hacer click al bot&#243;n de arriba?</h2>
                              </td>
                            </tr>

                            <tr>
                              <td bgcolor="#111111" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                                <p style="margin: 0; color: #fff; text-align: center;">Haz click en el link debajo o copia/pega en la barra de direcciones de tu navegador preferido.</p>
                              </td>
                            </tr>

                            <tr>
                              <td bgcolor="#111111" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                                <p style="margin: 0;"><a href="http://localhost/ESCOGE/recover_pass.php?token='.$token.'" target="_blank" style="display: block; margin: 0 auto; color: #fff; padding: 10px; text-align: center;">&#161;Click aqu&#237;!</a></p>
                              </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="480" >

                            <tr>
                              <td bgcolor="#C6C2ED" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                                <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">&#161;Visita nuestro sitio!</h2>
                                <p style="margin: 0;"><a href="http://localhost/ESCOGE/" target="_blank" style="color: #7c72dc;">ESCOGE RD</a></p>
                              </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="480" >
                          

                          <tr>
                            <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
                              <p style="margin: 0;">Recibiste este correo para restablecer tu contrase&#241;a en ESCOGE RD. Si no fue as&#237;, por favor, ignore este correo.</p>
                            </td>
                          </tr>
                          

                          <tr>
                            <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
                              <p style="margin: 0;">ESCOGE RD Copyright &copy; 2019 All rights reserved.</p>
                            </td>
                          </tr>
                        </table>
                    </td>
                </tr>
            </table>
            </body>
        </html>
    ';

    try
    {
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'escogerd1@gmail.com';
        $mail->Password = 'EscogeRD2019';
        $mail->Port = 587;
        $mail->SMTPSecure = 'TLS';
        $mail->setFrom('escogerd1@gmail.com', 'ESCOGE RD');
        $mail->AddAddress($email);
        $mail->IsHTML(true);
        $mail->Subject = 'Restablecer contrasena';
        $mail->Body = $template;
        $mail->send();
    }

    catch(Exception $e)
    {
        echo "<br>Hubo un error mientras se enviaba el correo: {$mail->ErrorInfo}";
    }
}