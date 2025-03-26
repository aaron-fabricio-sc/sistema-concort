<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PDF LIST</title>


    <style>
        html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        canvas,
        details,
        embed,
        figure,
        figcaption,
        footer,
        header,
        hgroup,
        menu,
        nav,
        output,
        ruby,
        section,
        summary,
        time,
        mark,
        audio,
        video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }

        /* HTML5 display-role reset for older browsers */
        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        menu,
        nav,
        section {
            display: block;
        }

        body {
            line-height: 1;
        }

        ol,
        ul {
            list-style: none;
        }

        blockquote,
        q {
            quotes: none;
        }

        blockquote:before,
        blockquote:after,
        q:before,
        q:after {
            content: '';
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }


        body {
            padding: 100px 80px 40px 100px;
            font-family: sans-serif;
        }


        .header_description {
            display: inline-block;
            width: 100%;
            margin: 0 auto;
            text-align: center;
        }

        .title {



            margin: 0 auto;

            font-size: 30px;


            border-top: solid 2px black;
            border-bottom: solid 2px black;
            margin: 5px 0;

        }

        table {
            border-collapse: collapse;

            margin: auto
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px;
            font-size: 13px
        }

        .container {
            width: 100%;
            text-align: center
        }

        .container h1 {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .dates {

            font-size: 12px;


        }

        .page-break {
            page-break-after: always;
        }

        p {
            padding: 3px 0px;
        }

        table {
            box-sizing: border-box;
        }

        .diferencia {
            font-size: 20px;

            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="header">
        {{-- <img src="data:image/png;base64,.{{ $settings->company_logo }}" width="150px"> --}}


        <div class="header_description">
            {{--  <p class="title">{{ $settings->company_name }} </p>
            <p>"{{ $settings->company_message }}"</p>
            <p>DIRECCIÓN : {{ $settings->company_address }}</p>

            <p>CEL : {{ $settings->company_phone }}</p>
            <p>EMAIL : {{ $settings->company_email }}</p> --}}

            <p class="title">Cormoran </p>

            <p>Dirección: Zona los Andes, calle Arzabe, #100, oficina 10.</p>

            <p>CEL : 73552904</p>
            <p>EMAIL :beluzxleoo@gmail.com</p>
        </div>





    </div>

    <div class="container">

        <h1>Envios a la empresa: <b>{{ $project->nombre_empresa }}</b> </h1>

        <p>Presupuesto Inicial: <span class="diferencia"> {{ $project->presupuesto_inicial }}Bs</span></p>
        <p>Cantidad de dinero invertido en materiales: <span
                class="diferencia">{{ $project->cantidad_total_precio }}Bs</span></p>


        <p>Diferencia del Presupuesto:

            @if ($project->cantidad_total_precio > $project->presupuesto_inicial)
                <span class="diferencia"> {{ $project->presupuesto_inicial - $project->cantidad_total_precio }}Bs
                </span>
            @else
                <span class="diferencia">
                    {{ $project->presupuesto_inicial - $project->cantidad_total_precio }}Bs
                </span>
            @endif
        </p>
        <p>Estado del
            Presupuesto:
            @if ($project->presupuesto_inicial > $project->cantidad_total_precio)
                <span class="diferencia">
                    Presupuesto No Superado
                </span>
            @else
                <span class="diferencia">
                    Presupuesto Superado
                </span>
            @endif
        </p>
        <table>
            <thead>
                <tr>

                    <th>Nº</th>
                    <th>Nombre del material</th>


                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Fecha de envio</th>



                </tr>




            </thead>
            <tbody>
                @foreach ($envios as $envio)
                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $envio->article->nombre }}</td>

                        <td>{{ $envio->cantidad }}</td>
                        <td>{{ $envio->monto }}</td>



                        @php
                            $dateActive = $envio->created_at;

                            $newDateActive = date('d-m-Y', strtotime($dateActive));

                        @endphp

                        <td class="dates">{{ $newDateActive }}</td>



                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>





</body>

</html>
