<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <meta name="token" id="token" value="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 25px;
            }
        </style>
    </head>
    <body>
        <div class="container" id="app">
            <div class="content">
                <div class="title">Arquitectura de software</div>
                <h2>Calcular Cadena mayor</h2>
                <h4>Ingresar los valores de las cadenas a continuacion:</h4>
                </br>

                    <input type="text"  v-on:keyup="obtenerRespuesta(hola)" v-model="parametros.cadena1"/>
                    <input type="text"  v-on:keyup="obtenerRespuesta(hola)" v-model="parametros.cadena2"/>
                    </br></br>
                    <pre v-if="resultado.length>0">

                    La cadena de texto con mayor cantidad de caracteres es: @{{resultado}}
                    </pre>

            </div>

            {{--<pre>@{{ $data|json }}</pre>--}}
        </div>

    <script src="js/vue.min.js"></script>
    <script src="js/vue-resource.min.js"></script>

    <script>
        var vm = new Vue({
            http: {
                root: '',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
                }
            },

            el: '#app',

            data: {
                resultado: '',
                parametros: {
                    cadena1: 'cadena1',
                    cadena2: 'cadena2'
                }

            },

            methods: {

                obtenerRespuesta: function (hola, event) {
                    var data=this.parametros;
                    this.$http.post('proyectos/doglove/public/cadenaMayor',data )
                            .then(
                            function (data) {
                               vm.$set('resultado', data.data.msg)
                            },
                            function (data) {
                                vm.$set('resultado', 'No hay conexion con el servidor.')
                            });
                    }
            }
        });

    </script>
    </body>
</html>
