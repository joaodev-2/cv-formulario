<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recebemos seu currículo</title>
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <!--<![endif]-->
    <!--[if mso]>
    <style>
      table {border-collapse: collapse;border-spacing: 0;border: none;margin: 0;}
    </style>
    <![endif]-->
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000f66;
            font-family: 'Poppins', sans-serif, Arial;
        }
        table {
            border-spacing: 0;
        }
        td {
            padding: 0;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-top: 0;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #000f66;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .main {
            background-color: #ffffff;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-spacing: 0;
            font-family: 'Poppins', sans-serif, Arial;
            color: #1f2937;
            border-radius: 24px;
            overflow: hidden;
        }
        .button {
            background-color: #111827;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bold;
            display: inline-block;
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #000f66; font-family: 'Poppins', sans-serif, Arial;">
    <!--[if gte mso 9]>
    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
        <v:fill type="gradient" color="#000d4d" color2="#000f66" angle="90"/>
    </v:background>
    <![endif]-->
    <div class="wrapper" style="width: 100%; table-layout: fixed; background-color: #000f66; background-image: linear-gradient(to right, #000d4d, #000f66); padding-top: 40px; padding-bottom: 40px;">
        <!--[if mso]>
        <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;border-radius:24px;">
          <v:fill type="tile" src="" color="#ffffff" />
          <v:textbox inset="0,0,0,0">
        <![endif]-->
        <table class="main" align="center" style="background-color: #ffffff; margin: 0 auto; width: 100%; max-width: 600px; border-spacing: 0; font-family: 'Poppins', sans-serif, Arial; color: #1f2937; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.1);">
            <tr>
                <td style="padding: 0; background-color: #000f66; background: linear-gradient(135deg, #000d4d, #000f66); color: #ffffff; padding: 48px; vertical-align: top; text-align: left; border-top-left-radius: 24px; border-top-right-radius: 24px;">
                    <h1 style="font-size: 36px; font-weight: bold; margin-top: 0; margin-bottom: 12px; line-height: 1.2;">Confirmação de envio</h1>
                </td>
            </tr>
            <tr>
                <td style="padding: 48px;">
                    <h1 style="font-size: 24px; font-weight: bold; margin-top: 0; color: #374151; margin-bottom: 32px;">Olá {{ $application->name }},</h1>
                    <p style="font-size: 16px; line-height: 1.5; color: #4b5563;">Recebemos seu currículo para a vaga de <strong>{{ $application->desired_role }}</strong>.</p>
                    <p style="font-size: 16px; line-height: 1.5; color: #4b5563;">Agradecemos o seu interesse em fazer parte da nossa equipe. Analisaremos suas informações e entraremos em contato caso seu perfil seja compatível com a vaga.</p>
                    <p style="font-size: 16px; line-height: 1.5; color: #4b5563;">Abaixo estão os detalhes que recebemos:</p>
                    <ul style="list-style: none; padding: 0; margin-top: 20px; margin-bottom: 20px; color: #4b5563;">
                        <li style="margin-bottom: 8px;"><strong>Escolaridade:</strong> {{ $application->education }}</li>
                        <li style="margin-bottom: 8px;"><strong>Telefone:</strong> {{ $application->phone }}</li>
                        <li style="margin-bottom: 8px;"><strong>Linkedin:</strong> {{ $application->linkedin_url }}</li>
                        <li><strong>Data/Hora da aplicação:</strong> {{ $application->created_at->format('d/m/Y H:i:s') }}</li>
                    </ul>                    
                    <p style="font-size: 16px; line-height: 1.5; color: #4b5563;">Atenciosamente,</p>
                    <p style="font-size: 16px; line-height: 1.5; color: #4b5563;">Equipe de Recrutamento</p>
                </td>
            </tr>
        </table>
        <!--[if mso]>
          </v:textbox>
        </v:rect>
        <![endif]-->
    </div>
</body>
</html>